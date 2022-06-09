<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogViewComponent extends Component
{
    public $menu_name = "Blog";
    public $menu_icon = "fas fa-newspaper";
    public $menu_slug = "blog";
    public $menu_table = "blog";

    public $blog;
    public $name;
    public $email;
    public $phone;
    public $title;
    public $message;

    public function rules()
    {
        return [
            "name"      => "required|max:50",
            "phone"     => "nullable|max:15",
            "email"     => "required|email|max:50",
            "title"     => "nullable|max:100",
            "message"   => "required|max:1000",
        ];
    }

    public function mount($blog_slug)
    {
        $this->banner = Banner::find(15);

        $this->blog = Blog::where("slug", $blog_slug)->onlyActive()->first();

        if (!$this->blog) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_other_blog = Blog::where("id", "!=", $this->blog->id)
            ->onlyActive()
            ->inRandomOrder()
            ->limit("3")
            ->get();

        $this->data_blog_category = BlogCategory::onlyActive()->orderByDesc("id")->get();

        $this->data_recent_blog = Blog::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_popular_tags = Blog::onlyActive()->orderByDesc("id")->first();
    }

    public function render()
    {
        $this->blog->refresh();

        return view("livewire.{$this->menu_slug}.view")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
