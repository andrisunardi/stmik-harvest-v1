<?php

namespace App\Observers;

use App\Models\StudyProgram;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class StudyProgramObserver
{
    protected $name = "Study Program";

    public function creating(StudyProgram $study_program)
    {
        $study_program->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $study_program->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(StudyProgram $study_program)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(StudyProgram $study_program)
    {
        $study_program->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(StudyProgram $study_program)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(StudyProgram $study_program)
    {
        $study_program->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $study_program->save();
    }

    public function deleted(StudyProgram $study_program)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(StudyProgram $study_program)
    {
        $study_program->deleted_by = null;
    }

    public function restored(StudyProgram $study_program)
    {
        $menu = Menu::where("name", $this->name)->first();

        $study_program->deleted_by = null;
        $study_program->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(StudyProgram $study_program)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program->id;
        $log->activity = 5;
        $log->save();
    }
}
