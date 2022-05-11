<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Magazine;

class MagazineComponent extends Component
{
    public $menu_name = "Magazine";
    public $menu_icon = "fas fa-file";
    public $menu_slug = "magazine";
    public $menu_table = "magazine";

    public function mount()
    {
        $this->banner = Banner::find(8);

        $this->data_magazine = Magazine::onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
