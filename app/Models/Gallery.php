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

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'gallery';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['gallery'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'category',
        'name',
        'name_id',
        'description',
        'description_id',
        'tag',
        'tag_id',
        'image',
        'video',
        'youtube',
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

    public function getCategoryTextAttribute()
    {
        if ($this->category == 1) {
            return 'Image';
        } elseif ($this->category == 2) {
            return 'Video';
        } elseif ($this->category == 3) {
            return 'Youtube';
        } else {
            return null;
        }
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

    public function altImage()
    {
        return trans('index.image').' - '.trans('index.'.Str::slug($this->table, '_')).' - '.env('APP_TITLE');
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

    public function checkVideo()
    {
        if ($this->video && File::exists(public_path('videos/'.Str::slug($this->table)."/{$this->video}"))) {
            return true;
        }
    }

    public function assetVideo()
    {
        if ($this->checkVideo()) {
            return asset('videos/'.Str::slug($this->table)."/{$this->video}");
        } else {
            return asset('videos/video-not-available.png');
        }
    }

    public function deleteVideo()
    {
        if ($this->checkVideo()) {
            File::delete(public_path('videos/'.Str::slug($this->table)."/{$this->video}"));
        }
    }

    public function getVideoUrlAttribute()
    {
        if ($this->checkVideo()) {
            return URL::to('/').'/videos/'.Str::slug($this->table)."/{$this->video}";
        }

        return null;
    }

    public function getYoutubeCodeAttribute()
    {
        if ($this->youtube) {
            return Str::replace('https://www.youtube.com/watch?v=', '', $this->youtube);
        }
    }

    protected $appends = ['image_url', 'video_url'];
}
