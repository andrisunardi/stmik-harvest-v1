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

/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property GalleryCategory|null $category
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $tag
 * @property string|null $tag_idn
 * @property string|null $image
 * @property string|null $video
 * @property string|null $youtube
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
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $video_url
 * @property-read mixed $youtube_code
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery active()
 * @method static \Database\Factories\GalleryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Query\Builder|Gallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTagIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereYoutube($value)
 * @method static \Illuminate\Database\Query\Builder|Gallery withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Gallery withoutTrashed()
 *
 * @property-read mixed $translate_tag
 *
 * @mixin \Eloquent
 */
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

    public function getTranslateTagAttribute()
    {
        return App::isLocale('en') ? $this->tag : $this->tag_idn;
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

    public function getYoutubeCodeAttribute()
    {
        if ($this->youtube) {
            return Str::replace('https://www.youtube.com/watch?v=', '', $this->youtube);
        }

        return null;
    }

    protected $appends = ['image_url', 'video_url'];
}
