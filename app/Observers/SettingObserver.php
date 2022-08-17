<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingObserver
{
    protected $name = 'Setting';

    public function creating(Setting $setting)
    {
        $setting->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $setting->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Setting $setting)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $setting->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Setting $setting)
    {
        $setting->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Setting $setting)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $setting->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Setting $setting)
    {
        $setting->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $setting->save();
    }

    public function deleted(Setting $setting)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $setting->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Setting $setting)
    {
        $setting->deleted_by_id = null;
        $setting->save();
    }

    public function restored(Setting $setting)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $setting->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Setting $setting)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $setting->id;
        $log->activity = 5;
        $log->save();
    }
}
