<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\Network;
use Illuminate\Support\Facades\Auth;

class NetworkObserver
{
    protected $name = 'Network';

    public function creating(Network $network)
    {
        $network->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $network->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Network $network)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $network->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Network $network)
    {
        $network->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Network $network)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $network->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Network $network)
    {
        $network->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $network->save();
    }

    public function deleted(Network $network)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $network->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Network $network)
    {
        $network->deleted_by = null;
    }

    public function restored(Network $network)
    {
        $menu = Menu::where('name', $this->name)->first();

        $network->deleted_by = null;
        $network->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $network->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Network $network)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $network->id;
        $log->activity = 5;
        $log->save();
    }
}
