<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property int|null $menu_category_id
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $data_log
 * @property-read int|null $data_log_count
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\MenuCategory|null $menu_category
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Menu active()
 * @method static \Database\Factories\MenuFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu nonActive()
 * @method static \Illuminate\Database\Query\Builder|Menu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenuCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Menu withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu withoutMenuCategory()
 * @method static \Illuminate\Database\Query\Builder|Menu withoutTrashed()
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'menu';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['menu'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'menu_category_id',
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

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_id;
    }

    public function menu_category()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function scopeWithoutMenuCategory($query)
    {
        return $query->whereNull('menu_category_id');
    }

    public function data_log()
    {
        return $this->hasMany(Log::class)->active()->orderBy('id');
    }

    // public function namespace($id)
    // {
    //     $menu = Menu::find($id);

    //     return
    //         $menu->menu_id ?
    //         (
    //             $menu->menu->menu_id ?
    //             (
    //                 $menu->menu->menu->menu_id ?
    //                 Str::studly(Str::title(Str::replace([" / ", " - ", " & "], " ", $menu->menu->menu->menu->name))) . "\\" .
    //                 Str::studly(Str::title(Str::replace([" / ", " - ", " & "], " ", $menu->menu->menu->name))) . "\\" .
    //                 Str::studly(Str::title(Str::replace([" / ", " - ", " & "], " ", $menu->menu->name))) . "\\" :
    //                 Str::studly(Str::title(Str::replace([" / ", " - ", " & "], " ", $menu->menu->menu->name))) . "\\" .
    //                 Str::studly(Str::title(Str::replace([" / ", " - ", " & "], " ", $menu->menu->name))) . "\\"
    //             ) :
    //             Str::studly(Str::title(Str::replace([" / ", " - ", " & "], " ", $menu->menu->name))) . "\\"
    //         ) : "";
    // }

    // public function as($id)
    // {
    //     $menu = Menu::find($id);

    //     return
    //         $menu->menu_id ?
    //         (
    //             $menu->menu->menu_id ?
    //             (
    //                 $menu->menu->menu->menu_id ?
    //                 Str::slug($menu->menu->menu->menu->name) . "." .
    //                 Str::slug($menu->menu->menu->name) . "." .
    //                 Str::slug($menu->menu->name) . "." :
    //                 Str::slug($menu->menu->menu->name) . "." .
    //                 Str::slug($menu->menu->name) . "."
    //             ) :
    //             Str::slug($menu->menu->name) . "."
    //         ) : "";
    // }

    // public function prefix($id)
    // {
    //     $menu = Menu::find($id);

    //     return
    //         $menu->menu_id ?
    //         (
    //             $menu->menu->menu_id ?
    //             (
    //                 $menu->menu->menu->menu_id ?
    //                 Str::slug($menu->menu->menu->menu->name) . "/" .
    //                 Str::slug($menu->menu->menu->name) . "/" .
    //                 Str::slug($menu->menu->name) . "/" :
    //                 Str::slug($menu->menu->menu->name) . "/" .
    //                 Str::slug($menu->menu->name) . "/"
    //             ) :
    //             Str::slug($menu->menu->name) . "/"
    //         ) : "";
    // }
}
