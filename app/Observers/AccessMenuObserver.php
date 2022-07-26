<?php

namespace App\Observers;

use App\Models\AccessMenu;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class AccessMenuObserver
{
    protected $name = 'Access';

    public function creating(AccessMenu $access_menu)
    {
        $access_menu->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $access_menu->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(AccessMenu $access_menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access_menu->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(AccessMenu $access_menu)
    {
        $access_menu->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(AccessMenu $access_menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access_menu->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(AccessMenu $access_menu)
    {
        $access_menu->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $access_menu->save();
    }

    public function deleted(AccessMenu $access_menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access_menu->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(AccessMenu $access_menu)
    {
        $access_menu->deleted_by = null;
    }

    public function restored(AccessMenu $access_menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $access_menu->deleted_by = null;
        $access_menu->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access_menu->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(AccessMenu $access_menu)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access_menu->id;
        $log->activity = 5;
        $log->save();
    }
}
