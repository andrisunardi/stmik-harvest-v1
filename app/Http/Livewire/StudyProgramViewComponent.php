<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Banner;
use App\Models\StudyProgram;

class StudyProgramViewComponent extends Component
{
    public $menu_name = "Study Program";
    public $menu_icon = "fas fa-book";
    public $menu_slug = "study-program";
    public $menu_table = "study_program";

    public $study_program;

    public function mount($study_program_slug)
    {
        $this->banner = Banner::find(5);

        $this->study_program = StudyProgram::where("slug", $study_program_slug)->onlyActive()->first();

        if (!$this->study_program) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_other_study_program = StudyProgram::where("id", "!=", $this->study_program->id)
            ->onlyActive()
            ->orderBy("id")
            ->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.view")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
