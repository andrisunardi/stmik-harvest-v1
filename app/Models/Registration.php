<?php

namespace App\Models;

use App\Enums\RegistrationGender;
use App\Enums\RegistrationType;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Registration
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property RegistrationGender|null $gender
 * @property string|null $school
 * @property string|null $major
 * @property string|null $city
 * @property RegistrationType|null $type
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
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Registration active()
 * @method static \Database\Factories\RegistrationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newQuery()
 * @method static \Illuminate\Database\Query\Builder|Registration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Registration withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Registration withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Registration extends Model
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

    protected $table = 'registrations';

    protected $slug = 'registration';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'gender' => RegistrationGender::class,
        'school' => 'string',
        'major' => 'string',
        'city' => 'string',
        'type' => RegistrationType::class,
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'school',
        'major',
        'city',
        'type',
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
