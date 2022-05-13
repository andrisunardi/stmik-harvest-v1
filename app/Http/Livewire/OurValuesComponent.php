<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class OurValuesComponent extends Component
{
    public $menu_name = "Our Values";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "our-values";
    public $menu_table = "our_values";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
