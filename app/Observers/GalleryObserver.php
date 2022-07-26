<?php

namespace App\Observers;

use App\Models\Gallery;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class GalleryObserver
{
    protected $name = 'Gallery';

    public function creating(Gallery $gallery)
    {
        $gallery->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $gallery->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Gallery $gallery)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $gallery->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Gallery $gallery)
    {
        $gallery->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Gallery $gallery)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $gallery->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Gallery $gallery)
    {
        $gallery->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $gallery->save();
    }

    public function deleted(Gallery $gallery)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $gallery->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Gallery $gallery)
    {
        $gallery->deleted_by = null;
    }

    public function restored(Gallery $gallery)
    {
        $menu = Menu::where('name', $this->name)->first();

        $gallery->deleted_by = null;
        $gallery->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $gallery->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Gallery $gallery)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $gallery->id;
        $log->activity = 5;
        $log->save();
    }
}
