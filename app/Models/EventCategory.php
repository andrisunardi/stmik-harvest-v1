<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class EventCategory extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'event_category';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['event_category'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'name_id',
        'description',
        'description_id',
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

    public function data_event()
    {
        return $this->hasMany(Event::class)->active()->orderBy('id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            $table->data_event()->delete();
        });

        static::restored(function ($table) {
            $table->data_event()->restore();
        });
    }
}
