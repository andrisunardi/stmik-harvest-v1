<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\Procedure;
use Illuminate\Support\Facades\Auth;

class ProcedureObserver
{
    protected $name = 'Procedure';

    public function creating(Procedure $procedure)
    {
        $procedure->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $procedure->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Procedure $procedure)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $procedure->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Procedure $procedure)
    {
        $procedure->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Procedure $procedure)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $procedure->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Procedure $procedure)
    {
        $procedure->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $procedure->save();
    }

    public function deleted(Procedure $procedure)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $procedure->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Procedure $procedure)
    {
        $procedure->deleted_by_id = null;
    }

    public function restored(Procedure $procedure)
    {
        $menu = Menu::where('name', $this->name)->first();

        $procedure->deleted_by_id = null;
        $procedure->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $procedure->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Procedure $procedure)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $procedure->id;
        $log->activity = 5;
        $log->save();
    }
}
