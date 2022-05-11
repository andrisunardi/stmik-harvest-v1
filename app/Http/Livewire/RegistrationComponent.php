<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\StudyProgramCategory;

class RegistrationComponent extends Component
{
    public $menu_name = "Registration";
    public $menu_icon = "fas fa-pencil";
    public $menu_slug = "registration";
    public $menu_table = "registration";

    public function mount()
    {
        $this->data_study_program_category = StudyProgramCategory::onlyActive()->orderBy("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
