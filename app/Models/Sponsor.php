<?php

namespace App\Models;

use App\Enums\SponsorStatus;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Sponsor
 *
 * @property int $id
 * @property string|null $code
 * @property SponsorStatus|null $status
 * @property string|null $name
 * @property string|null $image
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $datetime
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
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor active()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor inActive()
 * @method static \Illuminate\Database\Query\Builder|Sponsor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Sponsor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sponsor withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Sponsor extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'sponsors';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['sponsors'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'status' => SponsorStatus::class,
        'name' => 'string',
        'image' => 'string',
        'link' => 'string',
        'datetime' => 'datetime',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'status',
        'name',
        'image',
        'link',
        'datetime',
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
