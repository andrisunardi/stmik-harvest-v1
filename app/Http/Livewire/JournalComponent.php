<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class JournalComponent extends Component
{
    public $menu_name = "Journal";
    public $menu_icon = "fas fa-book";
    public $menu_slug = "journal";
    public $menu_table = "journal";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
