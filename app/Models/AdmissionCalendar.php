<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

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
        return Session::get('locale') == 'en' ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return Session::get('locale') == 'en' ? $this->description : $this->description_id;
    }
}
