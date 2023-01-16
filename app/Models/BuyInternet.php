<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BuyInternet
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $internet_provider_id
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
 * @property-read \App\Models\InternetProvider|null $internetProvider
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet active()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet inActive()
 * @method static \Illuminate\Database\Query\Builder|BuyInternet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereInternetProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyInternet whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BuyInternet withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BuyInternet withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\BuyInternetFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class BuyInternet extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'buy_internets';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['buy_internets'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'internet_provider_id' => 'integer',
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
        'internet_provider_id',
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

    public function internetProvider()
    {
        return $this->belongsTo(InternetProvider::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
