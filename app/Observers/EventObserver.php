<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class EventObserver
{
    protected $name = 'Event';

    public function creating(Event $event)
    {
        $event->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $event->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Event $event)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Event $event)
    {
        $event->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Event $event)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Event $event)
    {
        $event->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $event->save();
    }

    public function deleted(Event $event)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Event $event)
    {
        $event->deleted_by = null;
    }

    public function restored(Event $event)
    {
        $menu = Menu::where('name', $this->name)->first();

        $event->deleted_by = null;
        $event->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Event $event)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $event->id;
        $log->activity = 5;
        $log->save();
    }
}
