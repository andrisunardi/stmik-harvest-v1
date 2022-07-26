<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\Value;
use Illuminate\Support\Facades\Auth;

class ValueObserver
{
    protected $name = 'Value';

    public function creating(Value $value)
    {
        $value->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $value->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Value $value)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $value->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Value $value)
    {
        $value->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Value $value)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $value->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Value $value)
    {
        $value->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $value->save();
    }

    public function deleted(Value $value)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $value->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Value $value)
    {
        $value->deleted_by = null;
    }

    public function restored(Value $value)
    {
        $menu = Menu::where('name', $this->name)->first();

        $value->deleted_by = null;
        $value->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $value->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Value $value)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $value->id;
        $log->activity = 5;
        $log->save();
    }
}
