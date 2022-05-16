<?php

namespace App\Observers;

use App\Models\AdmissionCalendar;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class AdmissionCalendarObserver
{
    protected $name = "Admission Calendar";

    public function creating(AdmissionCalendar $admission_calendar)
    {
        $admission_calendar->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $admission_calendar->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(AdmissionCalendar $admission_calendar)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admission_calendar->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(AdmissionCalendar $admission_calendar)
    {
        $admission_calendar->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(AdmissionCalendar $admission_calendar)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admission_calendar->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(AdmissionCalendar $admission_calendar)
    {
        $admission_calendar->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $admission_calendar->save();
    }

    public function deleted(AdmissionCalendar $admission_calendar)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admission_calendar->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(AdmissionCalendar $admission_calendar)
    {
        $admission_calendar->deleted_by = null;
    }

    public function restored(AdmissionCalendar $admission_calendar)
    {
        $menu = Menu::where("name", $this->name)->first();

        $admission_calendar->deleted_by = null;
        $admission_calendar->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admission_calendar->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(AdmissionCalendar $admission_calendar)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $admission_calendar->id;
        $log->activity = 5;
        $log->save();
    }
}
