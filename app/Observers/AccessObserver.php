<?php

namespace App\Observers;

use App\Models\Access;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class AccessObserver
{
    protected $name = 'Access';

    public function creating(Access $access)
    {
        $access->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $access->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Access $access)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Access $access)
    {
        $access->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Access $access)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Access $access)
    {
        $access->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $access->save();
    }

    public function deleted(Access $access)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Access $access)
    {
        $access->deleted_by_id = null;
    }

    public function restored(Access $access)
    {
        $menu = Menu::where('name', $this->name)->first();

        $access->deleted_by_id = null;
        $access->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Access $access)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $access->id;
        $log->activity = 5;
        $log->save();
    }
}
