<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'setting';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['setting'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'sms',
        'call',
        'fax',
        'whatsapp',
        'email',
        'address',
        'google_maps',
        'google_maps_iframe',
        'about_us',
        'about_us_id',
        'vision',
        'vision_id',
        'mission',
        'mission_id',
        'history',
        'history_id',
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

    public function created_by_admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function updated_by_admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function deleted_by_admin()
    {
        return $this->belongsTo(Admin::class, 'deleted_by', 'id');
    }

    public function getTranslateAboutUsAttribute()
    {
        return Session::get('locale') == 'en' ? $this->about_us : $this->about_us_id;
    }

    public function getTranslateVisionAttribute()
    {
        return Session::get('locale') == 'en' ? $this->vision : $this->vision_id;
    }

    public function getTranslateMissionAttribute()
    {
        return Session::get('locale') == 'en' ? $this->mission : $this->mission_id;
    }

    public function getTranslateHistoryAttribute()
    {
        return Session::get('locale') == 'en' ? $this->history : $this->history_id;
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? URL::to('/').'/images/'.Str::slug($this->table)."/{$this->image}" : null;
    }

    protected $appends = ['image_url'];
}
