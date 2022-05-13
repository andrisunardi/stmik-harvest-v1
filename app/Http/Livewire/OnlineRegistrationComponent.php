<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class OnlineRegistrationComponent extends Component
{
    public $menu_name = "Online Registration";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "online-registration";
    public $menu_table = "online_registration";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
