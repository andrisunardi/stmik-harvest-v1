<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Registration
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $gender 1 = Man, 2 = Woman
 * @property string|null $school
 * @property string|null $major
 * @property string|null $city
 * @property int|null $type 1 = Morning - Afternoon Lecturer, 2 = Study & Work (Evening Lecture)
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $gender_text
 * @property-read mixed $type_text
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Registration active()
 * @method static \Database\Factories\RegistrationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration nonActive()
 * @method static \Illuminate\Database\Query\Builder|Registration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Registration withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Registration withoutTrashed()
 * @mixin \Eloquent
 */
class Registration extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'registration';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['registration'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'school',
        'major',
        'city',
        'type',
        'active',
    ];

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeNonActive($query)
    {
        return $query->where('active', false);
    }

    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_by_id', 'id');
    }

    public function updated_by()
    {
        return $this->belongsTo(Admin::class, 'updated_by_id', 'id');
    }

    public function deleted_by()
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id', 'id');
    }

    public function getGenderTextAttribute()
    {
        if ($this->gender == 1) {
            return 'Man';
        } elseif ($this->gender == 2) {
            return 'Woman';
        } else {
            return null;
        }
    }

    public function getTypeTextAttribute()
    {
        if ($this->type == 1) {
            return 'Morning - Afternoon Lecturer';
        } elseif ($this->type == 2) {
            return 'Study & Work (Evening Lecture)';
        } else {
            return null;
        }
    }
}
