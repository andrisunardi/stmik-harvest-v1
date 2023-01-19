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
 * App\Models\Blog
 *
 * @property int $id
 * @property int|null $blog_category_id
 * @property string|null $title
 * @property string|null $title_idn
 * @property string|null $short_body
 * @property string|null $short_body_idn
 * @property string|null $body
 * @property string|null $body_idn
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $tag
 * @property string|null $tag_id
 * @property string|null $image
 * @property string|null $slug
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\BlogCategory|null $blogCategory
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $translate_tag
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Blog active()
 * @method static \Database\Factories\BlogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Query\Builder|Blog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitleIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Blog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Blog withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property string|null $tag_idn
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTagIdn($value)
 *
 * @property-read mixed $translate_body
 * @property-read mixed $translate_short_body
 * @property-read mixed $translate_title
 */
class Blog extends Model
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

    protected $table = 'blogs';

    protected $slug = 'blog';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'blog_category_id' => 'integer',
        'title' => 'string',
        'title_idn' => 'string',
        'short_body' => 'string',
        'short_body_idn' => 'string',
        'body' => 'string',
        'body_idn' => 'string',
        'date' => 'datetime',
        'tag' => 'string',
        'tag_idn' => 'string',
        'slug' => 'string',
        'image' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'blog_category_id',
        'title',
        'title_idn',
        'short_body',
        'short_body_idn',
        'body',
        'body_idn',
        'date',
        'tag',
        'tag_idn',
        'image',
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

    public function altImage()
    {
        return trans('index.image').' - '.trans('index.'.Str::singular($this->table)).' - '.env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path("images/{$this->slug}/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/{$this->slug}/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/{$this->slug}/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/{$this->slug}/{$this->image}";
        }

        return null;
    }

    protected $appends = ['image_url'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
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

    public function getTranslateTagAttribute()
    {
        return App::isLocale('en') ? $this->tag : $this->tag_idn;
    }

    public function tags()
    {
        if ($this->tag && $this->tag_idn) {
            return explode(',', $this->translate_tag);
        }

        return 0;
    }

    public function tag()
    {
        if ($this->tag) {
            return explode(',', $this->tag);
        }

        return 0;
    }

    public function tagIdn()
    {
        if ($this->tag_idn) {
            return explode(',', $this->tag_idn);
        }

        return 0;
    }
}
