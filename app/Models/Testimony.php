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
 * App\Models\Testimony
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $graduate
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
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony active()
 * @method static \Database\Factories\TestimonyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newQuery()
 * @method static \Illuminate\Database\Query\Builder|Testimony onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereGraduate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Testimony withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Testimony withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Testimony extends Model
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

    protected $table = 'testimonies';

    protected $slug = 'testimony';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'graduate' => 'string',
        'image' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'description',
        'graduate',
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
}
