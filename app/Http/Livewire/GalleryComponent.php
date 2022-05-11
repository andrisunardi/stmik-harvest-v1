<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Gallery;

class GalleryComponent extends Component
{
    public $menu_name = "Gallery";
    public $menu_icon = "fas fa-image-video";
    public $menu_slug = "gallery";
    public $menu_table = "gallery";

    public function mount()
    {
        $this->banner = Banner::find(3);

        $this->data_gallery_image = Gallery::where("category", 1)->whereNotNull("image")->onlyActive()->orderByDesc("id")->get();

        $this->data_gallery_video = Gallery::where("category", "!=", 1)->whereNotNull("video")->orWhereNotNull("youtube")->onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
