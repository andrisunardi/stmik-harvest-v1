<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Support\Facades\Auth;

class MenuCategoryObserver
{
    protected $name = 'Menu Category';

    public function creating(MenuCategory $menu_category)
    {
        $menu_category->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $menu_category->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(MenuCategory $menu_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 1;
        $log->save();
    }

    public function updating(MenuCategory $menu_category)
    {
        $menu_category->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(MenuCategory $menu_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(MenuCategory $menu_category)
    {
        $menu_category->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $menu_category->save();
    }

    public function deleted(MenuCategory $menu_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(MenuCategory $menu_category)
    {
        $menu_category->deleted_by = null;
    }

    public function restored(MenuCategory $menu_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $menu_category->deleted_by = null;
        $menu_category->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $menu_category->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(MenuCategory $menu_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 5;
        $log->save();
    }
}
