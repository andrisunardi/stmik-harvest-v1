<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Slider;
use App\Models\Lecturer;
use App\Models\StudyProgram;
use App\Models\News;

class HomeComponent extends Component
{
    public $menu_name = "Home";
    public $menu_icon = "fas fa-home";
    public $menu_slug = "home";
    public $menu_table = "home";

    public function mount()
    {
        $this->data_slider = Slider::onlyActive()->orderByDesc("id")->get();

        $this->data_lecturer = Lecturer::onlyActive()->orderBy("id")->get();

        $this->data_study_program = StudyProgram::onlyActive()->orderBy("id")->get();

        $this->data_news = News::onlyActive()->limit(4)->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
