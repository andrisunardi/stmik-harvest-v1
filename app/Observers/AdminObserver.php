<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class AdminObserver
{
    protected $name = 'Admin';

    public function creating(Admin $admin)
    {
        $admin->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $admin->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Admin $admin)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admin->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Admin $admin)
    {
        $admin->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Admin $admin)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admin->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Admin $admin)
    {
        $admin->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $admin->save();
    }

    public function deleted(Admin $admin)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admin->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Admin $admin)
    {
        $admin->deleted_by = null;
    }

    public function restored(Admin $admin)
    {
        $menu = Menu::where('name', $this->name)->first();

        $admin->deleted_by = null;
        $admin->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admin->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Admin $admin)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admin->id;
        $log->activity = 5;
        $log->save();
    }
}
