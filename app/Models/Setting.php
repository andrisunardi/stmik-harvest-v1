<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $sms
 * @property string|null $call
 * @property string|null $fax
 * @property string|null $whatsapp
 * @property string|null $email
 * @property string|null $address
 * @property string|null $google_maps
 * @property string|null $google_maps_iframe
 * @property string|null $about_us
 * @property string|null $about_us_id
 * @property string|null $vision
 * @property string|null $vision_id
 * @property string|null $mission
 * @property string|null $mission_id
 * @property string|null $history
 * @property string|null $history_id
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
 * @property-read mixed $translate_about_us
 * @property-read mixed $translate_history
 * @property-read mixed $translate_mission
 * @property-read mixed $translate_vision
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Setting active()
 * @method static \Database\Factories\SettingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting nonActive()
 * @method static \Illuminate\Database\Query\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAboutUsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereGoogleMaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereGoogleMapsIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHistoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereVisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWhatsapp($value)
 * @method static \Illuminate\Database\Query\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Setting withoutTrashed()
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'setting';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['setting'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'sms',
        'call',
        'fax',
        'whatsapp',
        'email',
        'address',
        'google_maps',
        'google_maps_iframe',
        'about_us',
        'about_us_id',
        'vision',
        'vision_id',
        'mission',
        'mission_id',
        'history',
        'history_id',
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

    public function getTranslateAboutUsAttribute()
    {
        return App::isLocale('en') ? $this->about_us : $this->about_us_id;
    }

    public function getTranslateVisionAttribute()
    {
        return App::isLocale('en') ? $this->vision : $this->vision_id;
    }

    public function getTranslateMissionAttribute()
    {
        return App::isLocale('en') ? $this->mission : $this->mission_id;
    }

    public function getTranslateHistoryAttribute()
    {
        return App::isLocale('en') ? $this->history : $this->history_id;
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? URL::to('/').'/images/'.Str::slug($this->table)."/{$this->image}" : null;
    }

    protected $appends = ['image_url'];
}
