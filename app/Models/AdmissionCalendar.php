<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * App\Models\AdmissionCalendar
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $date
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar active()
 * @method static \Database\Factories\AdmissionCalendarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar nonActive()
 * @method static \Illuminate\Database\Query\Builder|AdmissionCalendar onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|AdmissionCalendar withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdmissionCalendar withoutTrashed()
 * @mixin \Eloquent
 */
class AdmissionCalendar extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'admission_calendar';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['admission_calendar'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'name_id',
        'description',
        'description_id',
        'date',
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_id;
    }
}
