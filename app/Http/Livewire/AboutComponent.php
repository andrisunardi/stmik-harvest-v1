<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Network;
use App\Models\Value;

class AboutComponent extends Component
{
    public $menu_name = 'About';

    public $menu_icon = 'fas fa-building';

    public $menu_slug = 'about';

    public $menu_table = 'setting';

    public function mount()
    {
        $this->banner = Banner::find(2);

        $this->data_network = Network::active()->orderByDesc('id')->get();

        $this->data_value = Value::active()->orderByDesc('id')->limit(4)->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends('layouts.app', ['banner' => $this->banner])->section('content');
    }
}
