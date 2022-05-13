<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class OurProfileComponent extends Component
{
    public $menu_name = "Our Profile";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "our-profile";
    public $menu_table = "our_profile";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
