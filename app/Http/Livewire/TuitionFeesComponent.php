<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class TuitionFeesComponent extends Component
{
    public $menu_name = "Tuition Fees";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "tuition-fees";
    public $menu_table = "tuition_fees";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
