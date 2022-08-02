<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;

class TestimonyObserver
{
    protected $name = 'Testimony';

    public function creating(Testimony $testimony)
    {
        $testimony->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $testimony->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Testimony $testimony)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $testimony->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Testimony $testimony)
    {
        $testimony->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Testimony $testimony)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $testimony->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Testimony $testimony)
    {
        $testimony->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $testimony->save();
    }

    public function deleted(Testimony $testimony)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $testimony->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Testimony $testimony)
    {
        $testimony->deleted_by_id = null;
    }

    public function restored(Testimony $testimony)
    {
        $menu = Menu::where('name', $this->name)->first();

        $testimony->deleted_by_id = null;
        $testimony->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $testimony->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Testimony $testimony)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $testimony->id;
        $log->activity = 5;
        $log->save();
    }
}
