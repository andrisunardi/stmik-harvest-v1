<?php

namespace App\Models;

use App\Enums\GalleryCategory;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
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

    protected $table = 'galleries';

    protected $slug = 'gallery';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'category' => GalleryCategory::class,
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'tag' => 'string',
        'tag_idn' => 'string',
        'image' => 'string',
        'video' => 'string',
        'youtube' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'category',
        'name',
        'name_idn',
        'description',
        'description_idn',
        'tag',
        'tag_idn',
        'image',
        'video',
        'youtube',
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }

    public function altImage()
    {
        return trans('index.image').' - '.Str::translate($this->table)." - {$this->name} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path('images/'.Str::singular(Str::slug($this->table))."/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset('images/'.Str::singular(Str::slug($this->table))."/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path('images/'.Str::singular(Str::slug($this->table))."/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/').'/images/'.Str::singular(Str::slug($this->table))."/{$this->image}";
        }

        return null;
    }

    public function altVideo()
    {
        return trans('index.video').' - '.Str::translate($this->table)." - {$this->title} - ".env('APP_TITLE');
    }

    public function checkVideo()
    {
        if ($this->video && File::exists(public_path('videos/'.Str::singular(Str::slug($this->table))."/{$this->video}"))) {
            return true;
        }
    }

    public function assetVideo()
    {
        if ($this->checkVideo()) {
            return asset('videos/'.Str::singular(Str::slug($this->table))."/{$this->video}");
        }

        return asset('videos/video.mp4');
    }

    public function deleteVideo()
    {
        if ($this->checkVideo()) {
            File::delete(public_path('videos/'.Str::singular(Str::slug($this->table))."/{$this->video}"));
        }
    }

    public function getVideoUrlAttribute()
    {
        if ($this->checkVideo()) {
            return URL::to('/').'/videos/'.Str::singular(Str::slug($this->table))."/{$this->video}";
        }

        return null;
    }

    protected $appends = ['image_url', 'video_url'];
}
