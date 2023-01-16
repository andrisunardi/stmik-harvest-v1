<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Absent
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $work_at
 * @property int|null $duration
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
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Absent active()
 * @method static \Database\Factories\AbsentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Absent inActive()
 * @method static \Illuminate\Database\Query\Builder|Absent onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Absent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereWorkAt($value)
 * @method static \Illuminate\Database\Query\Builder|Absent withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Absent withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property \Illuminate\Support\Carbon|null $datetime
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Absent whereDatetime($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Absent extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'absents';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['absents'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'user_id' => 'integer',
        'name' => 'string',
        'datetime' => 'datetime',
        'duration' => 'integer',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'user_id',
        'name',
        'datetime',
        'duration',
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
}
