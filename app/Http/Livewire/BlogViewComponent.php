<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Session;

class BlogViewComponent extends Component
{
    public $menu_name = 'Blog';

    public $menu_icon = 'fas fa-newspaper';

    public $menu_slug = 'blog';

    public $menu_table = 'blog';

    public $blog;

    public $name;

    public $email;

    public $phone;

    public $title;

    public $message;

    public function mount($blog_slug)
    {
        $this->banner = Banner::find(15);

        $this->blog = Blog::where('slug', $blog_slug)->active()->first();

        if (! $this->blog) {
            Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_other_blog = Blog::where('id', '!=', $this->blog->id)
            ->where('blog_category_id', $this->blog->blog_category->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();

        $this->data_blog_category = BlogCategory::active()->orderByDesc('id')->get();

        $this->data_recent_blog = Blog::active()->orderByDesc('id')->limit(3)->get();

        $this->data_popular_tags = Blog::active()->orderByDesc('id')->first();
    }

    public function render()
    {
        $this->blog->refresh();

        return view("livewire.{$this->menu_slug}.view")->extends('layouts.app', ['banner' => $this->banner])->section('content');
    }
}
