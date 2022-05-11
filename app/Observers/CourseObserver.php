<?php

namespace App\Observers;

use App\Models\Course;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class CourseObserver
{
    protected $name = "Course";

    public function creating(Course $course)
    {
        $course->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $course->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Course $course)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Course $course)
    {
        $course->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Course $course)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Course $course)
    {
        $course->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $course->save();
    }

    public function deleted(Course $course)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Course $course)
    {
        $course->deleted_by = null;
    }

    public function restored(Course $course)
    {
        $menu = Menu::where("name", $this->name)->first();

        $course->deleted_by = null;
        $course->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Course $course)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $course->id;
        $log->activity = 5;
        $log->save();
    }
}
