<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Value;

class AboutComponent extends Component
{
    public $menu_name = "About";
    public $menu_icon = "fas fa-building";
    public $menu_slug = "about";
    public $menu_table = "setting";

    public function mount()
    {
        $this->banner = Banner::find(1);

        $this->data_value = Value::onlyActive()->orderBy("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
