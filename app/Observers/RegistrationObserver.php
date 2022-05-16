<?php

namespace App\Observers;

use App\Models\Registration;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class RegistrationObserver
{
    protected $name = "Registration";

    public function creating(Registration $registration)
    {
        $registration->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $registration->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Registration $registration)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $registration->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Registration $registration)
    {
        $registration->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Registration $registration)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $registration->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Registration $registration)
    {
        $registration->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $registration->save();
    }

    public function deleted(Registration $registration)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $registration->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Registration $registration)
    {
        $registration->deleted_by = null;
    }

    public function restored(Registration $registration)
    {
        $menu = Menu::where("name", $this->name)->first();

        $registration->deleted_by = null;
        $registration->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $registration->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Registration $registration)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $registration->id;
        $log->activity = 5;
        $log->save();
    }
}
