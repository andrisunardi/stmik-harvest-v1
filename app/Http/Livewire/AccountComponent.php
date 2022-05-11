<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class AccountComponent extends Component
{
    public $menu_name = "Event";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "event";
    public $menu_table = "event";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
