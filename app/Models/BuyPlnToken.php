<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BuyPlnToken
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $no_meter
 * @property string|null $no_token
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken active()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken inActive()
 * @method static \Illuminate\Database\Query\Builder|BuyPlnToken onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereNoMeter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereNoToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPlnToken whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BuyPlnToken withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BuyPlnToken withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\BuyPlnTokenFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class BuyPlnToken extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'buy_pln_tokens';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['buy_pln_tokens'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'no_meter' => 'string',
        'no_token' => 'string',
        'amount' => 'integer',
        'image' => 'string',
        'datetime' => 'datetime',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'no_meter',
        'no_token',
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
}
