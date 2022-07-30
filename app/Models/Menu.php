<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

    public function created_by_admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function updated_by_admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function deleted_by_admin()
    {
        return $this->belongsTo(Admin::class, 'deleted_by', 'id');
    }

    public function getTranslateNameAttribute()
    {
        return Session::get('locale') == 'en' ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return Session::get('locale') == 'en' ? $this->description : $this->description_id;
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
