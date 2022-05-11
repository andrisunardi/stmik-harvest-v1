<?php

namespace App\Observers;

use App\Models\CourseLecturer;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class CourseLecturerObserver
{
    protected $name = "Course Lecturer";

    public function creating(CourseLecturer $course_lecturer)
    {
        $course_lecturer->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $course_lecturer->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(CourseLecturer $course_lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course_lecturer->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(CourseLecturer $course_lecturer)
    {
        $course_lecturer->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(CourseLecturer $course_lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course_lecturer->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(CourseLecturer $course_lecturer)
    {
        $course_lecturer->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $course_lecturer->save();
    }

    public function deleted(CourseLecturer $course_lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course_lecturer->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(CourseLecturer $course_lecturer)
    {
        $course_lecturer->deleted_by = null;
    }

    public function restored(CourseLecturer $course_lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $course_lecturer->deleted_by = null;
        $course_lecturer->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course_lecturer->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(CourseLecturer $course_lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course_lecturer->id;
        $log->activity = 5;
        $log->save();
    }
}
