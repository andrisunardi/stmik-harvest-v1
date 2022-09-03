<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

/**
 * App\Models\Testimony
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $graduate
 * @property string|null $image
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $image_url
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony active()
 * @method static \Database\Factories\TestimonyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony nonActive()
 * @method static \Illuminate\Database\Query\Builder|Testimony onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereGraduate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Testimony withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Testimony withoutTrashed()
 * @mixin \Eloquent
 */
class Testimony extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'testimony';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['testimony'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'description',
        'graduate',
        'image',
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
            return asset('images/'.Str::slug($this->table).'.png');
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
}
