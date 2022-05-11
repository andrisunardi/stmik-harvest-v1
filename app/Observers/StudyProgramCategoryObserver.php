<?php

namespace App\Observers;

use App\Models\StudyProgramCategory;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class StudyProgramCategoryObserver
{
    protected $name = "Study Program Category";

    public function creating(StudyProgramCategory $study_program_category)
    {
        $study_program_category->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $study_program_category->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(StudyProgramCategory $study_program_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program_category->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(StudyProgramCategory $study_program_category)
    {
        $study_program_category->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(StudyProgramCategory $study_program_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program_category->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(StudyProgramCategory $study_program_category)
    {
        $study_program_category->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $study_program_category->save();
    }

    public function deleted(StudyProgramCategory $study_program_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program_category->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(StudyProgramCategory $study_program_category)
    {
        $study_program_category->deleted_by = null;
    }

    public function restored(StudyProgramCategory $study_program_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $study_program_category->deleted_by = null;
        $study_program_category->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program_category->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(StudyProgramCategory $study_program_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $study_program_category->id;
        $log->activity = 5;
        $log->save();
    }
}
