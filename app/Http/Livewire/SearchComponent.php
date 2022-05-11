<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\News;

class SearchComponent extends Component
{
    public $menu_name = "Search";
    public $menu_icon = "fas fa-search";
    public $menu_slug = "search";
    public $menu_table = "search";

    public $search;

    public $queryString = ["search" => ["except" => ""]];

    public function mount()
    {
        $this->data_news = News::where("name", "like", "%{$this->search}%")->onlyActive()->orderByDesc("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app")->section("content");
    }
}
