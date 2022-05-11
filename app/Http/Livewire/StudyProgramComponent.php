<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\StudyProgram;
use App\Models\StudyProgramCategory;

class StudyProgramComponent extends Component
{
    public $menu_name = "Study Program";
    public $menu_icon = "fas fa-mortarboard";
    public $menu_slug = "study-program";
    public $menu_table = "study_program";

    public $study_program_category = "";
    public $queryString = ["study_program_category" => ["except" => ""]];

    public function mount()
    {
        $this->banner = Banner::find(5);

        $this->data_study_program = StudyProgram::when($this->study_program_category, function ($query) {
            $query->where("study_program_category_id", $this->study_program_category);
        })->onlyActive()->orderBy("id")->get();

        $this->data_study_program_category = StudyProgramCategory::onlyActive()->orderBy("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
