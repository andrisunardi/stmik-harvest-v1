<?php

namespace App\Models;

use App\Enums\BuyEndorseStatus;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BuyEndorse
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $user_id
 * @property BuyEndorseStatus|null $status
 * @property string|null $social_media
 * @property string|null $link
 * @property string|null $screenshot
 * @property \Illuminate\Support\Carbon|null $post_at
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
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse active()
 * @method static \Database\Factories\BuyEndorseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse inActive()
 * @method static \Illuminate\Database\Query\Builder|BuyEndorse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse wherePostAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereScreenshot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereSocialMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyEndorse whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|BuyEndorse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BuyEndorse withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class BuyEndorse extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'buy_endorses';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['buy_endorses'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'user_id' => 'integer',
        'status' => BuyEndorseStatus::class,
        'social_media' => 'string',
        'link' => 'string',
        'screenshot' => 'string',
        'post_at' => 'datetime',
        'bank_id' => 'integer',
        'account_number' => 'string',
        'account_name' => 'string',
        'amount' => 'integer',
        'datetime' => 'datetime',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'user_id',
        'status',
        'social_media',
        'link',
        'screenshot',
        'post_at',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
