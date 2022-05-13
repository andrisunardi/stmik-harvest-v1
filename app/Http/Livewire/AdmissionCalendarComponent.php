<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class AdmissionCalendarComponent extends Component
{
    public $menu_name = "Admission Calendar";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "admission-calendar";
    public $menu_table = "admission_calendar";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
