<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Advertisement
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $date
 * @property int|null $duration
 * @property string|null $image
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyAdvertisement[] $buyAdvertisements
 * @property-read int|null $buy_advertisements_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement active()
 * @method static \Database\Factories\AdvertisementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement inActive()
 * @method static \Illuminate\Database\Query\Builder|Advertisement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Advertisement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Advertisement withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Advertisement extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'advertisements';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['advertisements'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'user_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'link' => 'string',
        'date' => 'date',
        'duration' => 'integer',
        'image' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'user_id',
        'name',
        'description',
        'link',
        'date',
        'duration',
        'image',
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

    public function buyAdvertisements()
    {
        return $this->hasMany(BuyAdvertisement::class)->active()->orderBy('id');
    }
}
