<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class InformationSystemComponent extends Component
{
    public $menu_name = "Information System";
    public $menu_icon = "fas fa-money";
    public $menu_slug = "information-system";
    public $menu_table = "information_system";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}