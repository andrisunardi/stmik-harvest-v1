<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Value;

class OurValuesComponent extends Component
{
    public $menu_name = "Our Values";
    public $menu_icon = "fas fa-trophy";
    public $menu_slug = "our-values";
    public $menu_table = "value";

    public function mount()
    {
        $this->banner = Banner::find(4);

        $this->data_value = Value::onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
