<?php

namespace App\Observers;

use App\Models\LecturerWorkExperience;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class LecturerWorkExperienceObserver
{
    protected $name = "Lecturer Work Experience";

    public function creating(LecturerWorkExperience $lecturer_work_experience)
    {
        $lecturer_work_experience->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $lecturer_work_experience->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(LecturerWorkExperience $lecturer_work_experience)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_work_experience->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(LecturerWorkExperience $lecturer_work_experience)
    {
        $lecturer_work_experience->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(LecturerWorkExperience $lecturer_work_experience)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_work_experience->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(LecturerWorkExperience $lecturer_work_experience)
    {
        $lecturer_work_experience->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $lecturer_work_experience->save();
    }

    public function deleted(LecturerWorkExperience $lecturer_work_experience)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_work_experience->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(LecturerWorkExperience $lecturer_work_experience)
    {
        $lecturer_work_experience->deleted_by = null;
    }

    public function restored(LecturerWorkExperience $lecturer_work_experience)
    {
        $menu = Menu::where("name", $this->name)->first();

        $lecturer_work_experience->deleted_by = null;
        $lecturer_work_experience->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_work_experience->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(LecturerWorkExperience $lecturer_work_experience)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer_work_experience->id;
        $log->activity = 5;
        $log->save();
    }
}
