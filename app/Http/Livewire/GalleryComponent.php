<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\Banner;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class GalleryComponent extends Component
{
    use WithPagination;

    public $menu_name = "Gallery";
    public $menu_icon = "fas fa-image-video";
    public $menu_slug = "gallery";
    public $menu_table = "gallery";

    public $page = 1;
    public $tag;

    public $queryString = [
        "page" => ["except" => 1],
        "tag" => ["except" => ""],
    ];

    public function mount()
    {
        $this->banner = Banner::find(13);

        $this->data_gallery_category = Gallery::groupBy("tag")->onlyActive()->orderBy("name")->get();
    }

    public function tag($tag = null)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        $data_gallery = Gallery::when($this->tag, fn ($query) => $query->where("tag", Str::headline($this->tag))->orWhere("tag_id", Str::headline($this->tag)))->onlyActive()->orderBy("id")->paginate(12);

        return view("livewire.{$this->menu_slug}.index", ["data_gallery" => $data_gallery])->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
