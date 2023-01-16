<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Documentation
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property string|null $at
 * @property string|null $image
 * @property string|null $video
 * @property \Illuminate\Support\Carbon|null $datetime
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
 * @property-read mixed $video_url
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation active()
 * @method static \Database\Factories\DocumentationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation newQuery()
 * @method static \Illuminate\Database\Query\Builder|Documentation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereVideo($value)
 * @method static \Illuminate\Database\Query\Builder|Documentation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Documentation withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Documentation extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    public $slug = 'documentation';

    protected $table = 'documentations';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['documentations'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'at' => 'string',
        'image' => 'string',
        'video' => 'string',
        'datetime' => 'datetime',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
        'description',
        'at',
        'image',
        'video',
        'datetime',
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

    public function altVideo()
    {
        return trans('index.video').' - '.trans('index.'.Str::singular($this->table)).' - '.env('APP_TITLE');
    }

    public function checkVideo()
    {
        if ($this->video && File::exists(public_path("videos/{$this->slug}/{$this->video}"))) {
            return true;
        }
    }

    public function assetVideo()
    {
        if ($this->checkVideo()) {
            return asset("videos/{$this->slug}/{$this->video}");
        } else {
            return asset('videos/video-not-available.pdf');
        }
    }

    public function deleteVideo()
    {
        if ($this->checkVideo()) {
            File::delete(public_path("videos/{$this->slug}/{$this->video}"));
        }
    }

    public function getVideoUrlAttribute()
    {
        if ($this->checkVideo()) {
            return URL::to('/')."/videos/{$this->slug}/{$this->video}";
        }

        return null;
    }

    protected $appends = ['image_url', 'video_url'];
}
