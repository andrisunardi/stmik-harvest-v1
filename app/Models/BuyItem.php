<?php

namespace App\Models;

use App\Enums\BuyItemStatus;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BuyItem
 *
 * @property int $id
 * @property string|null $code
 * @property BuyItemStatus|null $status
 * @property string|null $name
 * @property int|null $bank_id
 * @property string|null $account_number
 * @property string|null $account_name
 * @property int|null $amount
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property string|null $notes
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem active()
 * @method static \Database\Factories\BuyItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem inActive()
 * @method static \Illuminate\Database\Query\Builder|BuyItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyItem whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BuyItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BuyItem withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class BuyItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'buy_items';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['buy_items'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'status' => BuyItemStatus::class,
        'name' => 'string',
        'bank_id' => 'integer',
        'account_number' => 'string',
        'account_name' => 'string',
        'amount' => 'integer',
        'image' => 'string',
        'datetime' => 'datetime',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'status',
        'name',
        'bank_id',
        'account_number',
        'account_name',
        'amount',
        'image',
        'datetime',
        'notes',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}");
    }

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInActive($query)
    {
        return $query->where('is_active', false);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
