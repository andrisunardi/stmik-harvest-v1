<?php

namespace App\Models;

use App\Enums\CareerStatus;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Career
 *
 * @property int $id
 * @property string|null $code
 * @property CareerStatus|null $status
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $location
 * @property string|null $location_idn
 * @property string|null $department
 * @property string|null $department_idn
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
 * @property-read mixed $translate_department
 * @property-read mixed $translate_description
 * @property-read mixed $translate_location
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Career active()
 * @method static \Illuminate\Database\Eloquent\Builder|Career closed()
 * @method static \Illuminate\Database\Eloquent\Builder|Career newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Career newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Career inActive()
 * @method static \Illuminate\Database\Query\Builder|Career onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Career open()
 * @method static \Illuminate\Database\Eloquent\Builder|Career query()
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDepartmentIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereLocationIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Career withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Career withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\CareerFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Career extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'careers';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['careers'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'status' => CareerStatus::class,
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'location' => 'string',
        'location_idn' => 'string',
        'department' => 'string',
        'department_idn' => 'string',
        'datetime' => 'datetime',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'status',
        'name',
        'name_idn',
        'description',
        'description_idn',
        'location',
        'location_idn',
        'department',
        'department_idn',
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

    public function scopeOpen($query)
    {
        return $query->where('status', CareerStatus::Open);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', CareerStatus::Closed);
    }

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }

    public function getTranslateDepartmentAttribute()
    {
        return App::isLocale('en') ? $this->department : $this->department_idn;
    }

    public function getTranslateLocationAttribute()
    {
        return App::isLocale('en') ? $this->location : $this->location_idn;
    }
}
