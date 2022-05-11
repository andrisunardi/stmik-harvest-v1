<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class InternationalStudentComponent extends Component
{
    public $menu_name = "International Student";
    public $menu_icon = "fas fa-users";
    public $menu_slug = "international-student";
    public $menu_table = "international_student";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
