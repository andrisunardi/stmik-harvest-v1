<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Livewire\WithPagination;

use App\Models\Banner;
use App\Models\Gallery;

class OurGalleryComponent extends Component
{
    use WithPagination;

    public $menu_name = "Our Gallery";
    public $menu_icon = "fas fa-image-video";
    public $menu_slug = "our-gallery";
    public $menu_table = "gallery";

    public $page = 1;
    public $tag;

    public $queryString = [
        "page" => ["except" => 1],
        "tag" => ["except" => ""],
    ];

    public function mount()
    {
        $this->banner = Banner::find(3);

        $this->data_gallery_category = Gallery::groupBy("category")->onlyActive()->orderBy("name")->get();
    }

    public function tag($tag = null)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        $data_gallery = Gallery::when($this->tag, fn ($query) => $query->where("tag", $this->tag)->orWhere("tag_id", $this->tag))->onlyActive()->orderBy("id")->paginate(12);

        return view("livewire.{$this->menu_slug}.index", ["data_gallery" => $data_gallery])->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
