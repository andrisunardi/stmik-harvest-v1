<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

class OurGalleryComponent extends Component
{
    public $menu_name = "Our Gallery";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "our-gallery";
    public $menu_table = "our_gallery";

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
