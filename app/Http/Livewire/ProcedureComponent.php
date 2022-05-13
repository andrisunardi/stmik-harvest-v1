<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class ProcedureComponent extends Component
{
    public $menu_name = "Procedure";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "procedure";
    public $menu_table = "procedure";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
