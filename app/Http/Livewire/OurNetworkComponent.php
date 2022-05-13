<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class OurNetworkComponent extends Component
{
    public $menu_name = "Our Network";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "our-network";
    public $menu_table = "our_network";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
