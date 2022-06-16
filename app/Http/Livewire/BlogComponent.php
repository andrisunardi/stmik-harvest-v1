<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class BlogComponent extends Component
{
    use WithPagination;

    public $menu_name = "Blog";
    public $menu_icon = "fas fa-newspaper";
    public $menu_slug = "blog";
    public $menu_table = "blog";

    public $page = 1;
    public $search;
    public $category;

    public $queryString = [
        "page" => ["except" => 1],
        "search" => ["except" => ""],
        "category" => ["except" => ""],
    ];

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
        $this->banner = Banner::find(15);

        $this->blog_category = BlogCategory::where("slug", $this->category)->first();

        if ($this->category && !$this->blog_category) {
            Session::flash("danger", trans("page.Blog Category") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_blog_category = BlogCategory::active()->orderBy("name")->get();

        $this->data_recent_blog = Blog::active()->orderByDesc("date")->limit(3)->get();

        $this->data_popular_tags = Blog::active()->orderByDesc("date")->first();
    }

    public function render()
    {
        $data_blog = Blog::when($this->search, fn ($query) =>
            $query->where("name", "like", "%{$this->search}%")
                ->orWhere("name_id", "like", "%{$this->search}%")
                ->orWhere("description", "like", "%{$this->search}%")
                ->orWhere("description_id", "like", "%{$this->search}%")
            )->when($this->category, fn ($query) =>
                $query->where("blog_category_id", $this->blog_category->id)
            )->active()->orderByDesc("id");

        if ($this->search) {
            Session::flash("success", trans("message.Found") . " <b>'{$data_blog->count()}'</b> " . trans("message.results for") . " <b>'{$this->search}'</b>");
        }

        $data_blog = $data_blog->paginate(10);

        return view("livewire.{$this->menu_slug}.index", ["data_blog" => $data_blog])
            ->extends("layouts.app", ["banner" => $this->banner, "search" => $this->search])
            ->section("content");
    }
}
