<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class AdmissionComponent extends Component
{
    public $menu_name = "Admission";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "admission";
    public $menu_table = "admission";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
