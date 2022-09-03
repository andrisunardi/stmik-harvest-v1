<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * App\Models\Offer
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $button_name
 * @property string|null $button_name_id
 * @property string|null $button_link
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $translate_button_name
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Offer active()
 * @method static \Database\Factories\OfferFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer nonActive()
 * @method static \Illuminate\Database\Query\Builder|Offer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereButtonLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereButtonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereButtonNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Offer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Offer withoutTrashed()
 * @mixin \Eloquent
 */
class Offer extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'offer';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['offer'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'name_id',
        'description',
        'description_id',
        'button_name',
        'button_name_id',
        'button_link',
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_id;
    }

    public function getTranslateButtonNameAttribute()
    {
        return App::isLocale('en') ? $this->button_name : $this->button_name_id;
    }
}
