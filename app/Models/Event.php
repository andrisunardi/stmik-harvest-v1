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
 * App\Models\Event
 *
 * @property int $id
 * @property int|null $event_category_id
 * @property string|null $title
 * @property string|null $title_idn
 * @property string|null $short_body
 * @property string|null $short_body_idn
 * @property string|null $body
 * @property string|null $body_idn
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $start
 * @property \Illuminate\Support\Carbon|null $end
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\EventCategory|null $eventCategory
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $translate_tag
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event active()
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShortBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShortBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitleIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Event withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property string|null $tag_idn
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTagIdn($value)
 *
 * @property-read mixed $translate_body
 * @property-read mixed $translate_short_body
 * @property-read mixed $translate_title
 */
class Event extends Model
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

    protected $table = 'events';

    protected $slug = 'event';

    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'event_category_id' => 'integer',
        'title' => 'string',
        'title_idn' => 'string',
        'short_body' => 'string',
        'short_body_idn' => 'string',
        'body' => 'string',
        'body_idn' => 'string',
        'location' => 'string',
        'start' => 'datetime',
        'end' => 'datetime',
        'tag' => 'string',
        'tag_idn' => 'string',
        'image' => 'string',
        'slug' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'event_category_id',
        'title',
        'title_idn',
        'short_body',
        'short_body_idn',
        'body',
        'body_idn',
        'location',
        'start',
        'end',
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
            return asset('images/image-not-available.pdf');
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

    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class);
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
