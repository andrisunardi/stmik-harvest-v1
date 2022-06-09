<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Event;

class EventComponent extends Component
{
    public $menu_name = "Event";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "event";
    public $menu_table = "event";

    public function mount()
    {
        $this->banner = Banner::find(14);

        $this->data_event = Event::onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
