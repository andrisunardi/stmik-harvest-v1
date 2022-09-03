<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * App\Models\MenuCategory
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $icon
 * @property int|null $sort
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu[] $data_menu
 * @property-read int|null $data_menu_count
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $translate_name
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory active()
 * @method static \Database\Factories\MenuCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory nonActive()
 * @method static \Illuminate\Database\Query\Builder|MenuCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|MenuCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MenuCategory withoutTrashed()
 * @mixin \Eloquent
 */
class MenuCategory extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'menu_category';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['menu_category'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'name_id',
        'icon',
        'sort',
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

    public function data_menu()
    {
        return $this->hasMany(Menu::class)->active()->orderBy('sort');
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            $table->data_menu()->delete();
        });

        static::restored(function ($table) {
            $table->data_menu()->restore();
        });
    }
}
