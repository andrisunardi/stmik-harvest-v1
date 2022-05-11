<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class ScholarshipComponent extends Component
{
    public $menu_name = "Scholarship";
    public $menu_icon = "fas fa-money";
    public $menu_slug = "scholarship";
    public $menu_table = "scholarship";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
