<?php

namespace App\Observers;

use App\Models\Banner;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class BannerObserver
{
    protected $name = 'Banner';

    public function creating(Banner $banner)
    {
        $banner->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $banner->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Banner $banner)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $banner->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Banner $banner)
    {
        $banner->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Banner $banner)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $banner->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Banner $banner)
    {
        $banner->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $banner->save();
    }

    public function deleted(Banner $banner)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $banner->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Banner $banner)
    {
        $banner->deleted_by_id = null;
    }

    public function restored(Banner $banner)
    {
        $menu = Menu::where('name', $this->name)->first();

        $banner->deleted_by_id = null;
        $banner->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $banner->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Banner $banner)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $banner->id;
        $log->activity = 5;
        $log->save();
    }
}
