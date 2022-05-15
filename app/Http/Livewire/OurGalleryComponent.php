<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Gallery;

class OurGalleryComponent extends Component
{
    public $menu_name = "Our Gallery";
    public $menu_icon = "fas fa-image-video";
    public $menu_slug = "our-gallery";
    public $menu_table = "gallery";

    public function mount()
    {
        $this->banner = Banner::find(3);

        $this->data_gallery_category = Gallery::groupBy("category")->onlyActive()->orderBy("name")->get();

        $this->data_gallery = Gallery::onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
