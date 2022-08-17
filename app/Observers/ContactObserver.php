<?php

namespace App\Observers;

use App\Models\Contact;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class ContactObserver
{
    protected $name = 'Contact';

    public function creating(Contact $contact)
    {
        $contact->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $contact->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Contact $contact)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $contact->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Contact $contact)
    {
        $contact->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Contact $contact)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $contact->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Contact $contact)
    {
        $contact->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $contact->save();
    }

    public function deleted(Contact $contact)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $contact->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Contact $contact)
    {
        $contact->deleted_by_id = null;
        $contact->save();
    }

    public function restored(Contact $contact)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $contact->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Contact $contact)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $contact->id;
        $log->activity = 5;
        $log->save();
    }
}
