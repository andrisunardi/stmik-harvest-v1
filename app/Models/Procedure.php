<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Procedure
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure active()
 * @method static \Database\Factories\ProcedureFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure newQuery()
 * @method static \Illuminate\Database\Query\Builder|Procedure onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Procedure withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Procedure withoutTrashed()
 *
 * @property string|null $name_idn
 * @property string|null $description_idn
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereNameIdn($value)
 *
 * @mixin \Eloquent
 */
class Procedure extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    // protected $primaryKey = 'id';

    // public $incrementing = false;

    // public $timestamps = false;

    // protected $guarded = ['*'];

    // protected $hidden = ['id'];

    // protected $visible = ['id'];

    protected $table = 'procedures';

    protected $slug = 'procedure';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'name_idn',
        'description',
        'description_idn',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName} by :causer.name");
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }
}
