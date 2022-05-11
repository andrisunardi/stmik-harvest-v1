<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

use App\Models\Banner;
use App\Models\News;
use App\Models\NewsCategory;

class NewsComponent extends Component
{
    use WithPagination;

    public $menu_name = "News And Event";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "news";
    public $menu_table = "news";

    public $queryString = [
        "page" => ["except" => 1],
        "search" => ["except" => ""],
        "category" => ["except" => ""],
    ];

    public $page = 1;
    public $search;
    public $category;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->banner = Banner::find(6);

        $this->news_category = NewsCategory::find($this->category);

        if ($this->category && !$this->news_category) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_news_category = NewsCategory::onlyActive()->orderByDesc("id")->get();

        $this->data_recent_news = News::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_popular_tags = News::onlyActive()->orderByDesc("id")->first();
    }

    public function render()
    {
        $data_news = News::when($this->search, fn ($query) =>
            $query->where("name", "like", "%{$this->search}%")
                ->orWhere("name_id", "like", "%{$this->search}%")
                ->orWhere("description", "like", "%{$this->search}%")
                ->orWhere("description", "like", "%{$this->search}%")
        )->when($this->category, fn ($query) =>
            $query->where("news_category_id", $this->category)
        )
            ->onlyActive()->orderByDesc("id");

        if ($this->search) {
            Session::flash("success", trans("message.Found") . " <b>'{$data_news->count()}'</b> " . trans("message.results for") . " <b>'{$this->search}'</b>");
        }

        $data_news = $data_news->paginate(10);

        return view("livewire.{$this->menu_slug}.index", ["data_news" => $data_news])->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
