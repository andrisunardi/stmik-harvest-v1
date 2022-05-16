<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\AdmissionCalendar;

class AdmissionCalendarComponent extends Component
{
    public $menu_name = "Admission Calendar";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "admission-calendar";
    public $menu_table = "admission_calendar";

    public function mount()
    {
        $this->banner = Banner::find(2);

        $this->data_admission_calendar = AdmissionCalendar::onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
