<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class MenuObserver
{
    protected $name = 'Menu';

    public function creating(Menu $menu)
    {
        $menu->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $menu->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Menu $menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Menu $menu)
    {
        $menu->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Menu $menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Menu $menu)
    {
        $menu->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $menu->save();
    }

    public function deleted(Menu $menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Menu $menu)
    {
        $menu->deleted_by = null;
    }

    public function restored(Menu $menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $menu->deleted_by = null;
        $menu->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $menu->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Menu $menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id ?? null;
        $log->row = $menu->id ?? null;
        $log->activity = 'Deleted Permanent';
        $log->save();
    }
}
