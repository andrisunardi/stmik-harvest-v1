<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Network;

class OurNetworkComponent extends Component
{
    public $menu_name = "Our Network";
    public $menu_icon = "fas fa-sitemap";
    public $menu_slug = "our-network";
    public $menu_table = "network";

    public function mount()
    {
        $this->banner = Banner::find(5);

        $this->data_network = Network::onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
