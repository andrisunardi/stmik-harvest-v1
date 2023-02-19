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
 * App\Models\Banner
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $image
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
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Banner active()
 * @method static \Database\Factories\BannerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Query\Builder|Banner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Banner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Banner withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Banner extends Model
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

    protected $table = 'banners';

    protected $slug = 'banner';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'image' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'name_idn',
        'description',
        'description_idn',
        'image',
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
        return trans('index.image').' - '.Str::translate(Str::singular($this->table)).' - '.env('APP_TITLE');
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }
}
