<?php

namespace App\Observers;

use App\Models\LecturerEducation;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class LecturerEducationObserver
{
    protected $name = "Lecturer Education";

    public function creating(LecturerEducation $lecturer_education)
    {
        $lecturer_education->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $lecturer_education->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(LecturerEducation $lecturer_education)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_education->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(LecturerEducation $lecturer_education)
    {
        $lecturer_education->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(LecturerEducation $lecturer_education)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_education->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(LecturerEducation $lecturer_education)
    {
        $lecturer_education->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $lecturer_education->save();
    }

    public function deleted(LecturerEducation $lecturer_education)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_education->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(LecturerEducation $lecturer_education)
    {
        $lecturer_education->deleted_by = null;
    }

    public function restored(LecturerEducation $lecturer_education)
    {
        $menu = Menu::where("name", $this->name)->first();

        $lecturer_education->deleted_by = null;
        $lecturer_education->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_education->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(LecturerEducation $lecturer_education)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_education->id;
        $log->activity = 5;
        $log->save();
    }
}
