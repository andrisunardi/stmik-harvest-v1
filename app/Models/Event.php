<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'event';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['event'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'event_category_id',
        'name',
        'name_id',
        'description',
        'description_id',
        'start',
        'end',
        'tag',
        'tag_id',
        'image',
        'slug',
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
        return $this->belongsTo(Admin::class, 'created_by', 'id')->withTrashed()->withDefault(null);
    }

    public function updated_by_admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id')->withTrashed()->withDefault(null);
    }

    public function deleted_by_admin()
    {
        return $this->belongsTo(Admin::class, 'deleted_by', 'id')->withTrashed()->withDefault(null);
    }

    public function getTranslateNameAttribute()
    {
        return Session::get('locale') == 'en' ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return Session::get('locale') == 'en' ? $this->description : $this->description_id;
    }

    public function getTranslateTagAttribute()
    {
        return Session::get('locale') == 'en' ? $this->tag : $this->tag_id;
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path('images/'.Str::slug($this->table)."/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset('images/'.Str::slug($this->table)."/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path('images/'.Str::slug($this->table)."/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/').'/images/'.Str::slug($this->table)."/{$this->image}";
        }

        return null;
    }

    protected $appends = ['image_url'];

    public function data_tags()
    {
        return explode(',', $this->translate_tag);
    }

    public function data_tag()
    {
        return explode(',', $this->tag);
    }

    public function data_tag_id()
    {
        return explode(',', $this->tag_id);
    }

    public function event_category()
    {
        return $this->belongsTo(EventCategory::class)->withTrashed()->withDefault(null);
    }
}
