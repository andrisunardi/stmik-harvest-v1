<?php

namespace App\Observers;

use App\Models\EventCategory;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class EventCategoryObserver
{
    protected $name = 'EventCategory';

    public function creating(EventCategory $event_category)
    {
        $event_category->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $event_category->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(EventCategory $event_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event_category->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(EventCategory $event_category)
    {
        $event_category->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(EventCategory $event_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event_category->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(EventCategory $event_category)
    {
        $event_category->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $event_category->save();
    }

    public function deleted(EventCategory $event_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event_category->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(EventCategory $event_category)
    {
        $event_category->deleted_by_id = null;
        $event_category->save();
    }

    public function restored(EventCategory $event_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event_category->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(EventCategory $event_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event_category->id;
        $log->activity = 5;
        $log->save();
    }
}
