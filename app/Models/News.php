<?php

namespace App\Models;

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
 * App\Models\News
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $news_category_id
 * @property string|null $title
 * @property string|null $title_idn
 * @property string|null $short_body
 * @property string|null $short_body_idn
 * @property string|null $body
 * @property string|null $body_idn
 * @property string|null $image
 * @property string|null $video
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property bool|null $is_active
 * @property string|null $slug
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_body
 * @property-read mixed $translate_short_body
 * @property-read mixed $translate_title
 * @property-read mixed $video_url
 * @property-read \App\Models\NewsCategory|null $newsCategory
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|News active()
 * @method static \Database\Factories\NewsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News inActive()
 * @method static \Illuminate\Database\Query\Builder|News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereNewsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereShortBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereShortBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitleIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereVideo($value)
 * @method static \Illuminate\Database\Query\Builder|News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|News withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'news';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['news'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'news_category_id' => 'integer',
        'title' => 'string',
        'title_idn' => 'string',
        'short_body' => 'string',
        'short_body_idn' => 'string',
        'body' => 'string',
        'body_idn' => 'string',
        'image' => 'string',
        'video' => 'string',
        'link' => 'string',
        'datetime' => 'datetime',
        'slug' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'news_category_id',
        'title',
        'title_idn',
        'short_body',
        'short_body_idn',
        'body',
        'body_idn',
        'image',
        'video',
        'link',
        'datetime',
        'slug',
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

    public function newsCategory()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function getTranslateTitleAttribute()
    {
        return App::isLocale('en') ? $this->title : $this->title_idn;
    }

    public function getTranslateShortBodyAttribute()
    {
        return App::isLocale('en') ? $this->short_body : $this->short_body_idn;
    }

    public function getTranslateBodyAttribute()
    {
        return App::isLocale('en') ? $this->body : $this->body_idn;
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
