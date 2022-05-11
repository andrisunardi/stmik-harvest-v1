<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Banner;
use App\Models\Lecturer;
use App\Models\LecturerEducation;
use App\Models\LecturerWorkExperience;
use App\Models\CourseLecturer;

class LecturerViewComponent extends Component
{
    public $menu_name = "Lecturer";
    public $menu_icon = "fas fa-users";
    public $menu_slug = "lecturer";
    public $menu_table = "lecturer";

    public $lecturer;

    public function mount($lecturer_slug)
    {
        $this->banner = Banner::find(2);

        $this->lecturer = Lecturer::where("slug", $lecturer_slug)->onlyActive()->first();

        if (!$this->lecturer) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_lecturer_education = LecturerEducation::where("lecturer_id", $this->lecturer->id)->onlyActive()->orderBy("id")->get();

        $this->data_lecturer_work_experience = LecturerWorkExperience::where("lecturer_id", $this->lecturer->id)->onlyActive()->orderBy("id")->get();

        $this->data_course_lecturer = CourseLecturer::select("*")
            ->join("course", "course_lecturer.course_id", "course.id")
            ->where("lecturer_id", $this->lecturer->id)->orderBy("course.semester")
            ->where("course_lecturer.active", true)
            ->where("course.active", true)
            ->get();

        $this->data_other_lecturer = Lecturer::where("id", "!=", $this->lecturer->id)
            ->onlyActive()
            ->inRandomOrder()
            ->limit("3")
            ->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.view")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
