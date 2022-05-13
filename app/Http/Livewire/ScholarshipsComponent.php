<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class ScholarshipsComponent extends Component
{
    public $menu_name = "Scholarships";
    public $menu_icon = "fas fa-money";
    public $menu_slug = "scholarships";
    public $menu_table = "scholarships";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
