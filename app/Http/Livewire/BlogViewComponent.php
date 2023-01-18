<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Session;

class BlogViewComponent extends Component
{
    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->active()->first();

        if (! $this->blog) {
            Session::flash('danger', trans('index.blog').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route('blog.index');
        }
    }

    public function getBanner()
    {
        return Banner::find(15);
    }

    public function getBlogs()
    {
        $data_blog = Blog::when($this->search, fn ($query) => $query->where('name', 'like', "%{$this->search}%")
            ->orWhere('name_idn', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->orWhere('description_idn', 'like', "%{$this->search}%")
        )->when($this->category, fn ($query) => $query->where('blog_category_id', $this->blog_category->id)
        )->active()->orderByDesc('id');

        if ($this->search) {
            Session::flash('success', trans('index.found')." <b>'{$data_blog->count()}'</b> ".trans('index.results_for')." <b>'{$this->search}'</b>");
        }

        return $data_blog->paginate(10);
    }

    public function getBlogCategories()
    {
        return BlogCategory::active()->orderBy('name')->get();
    }

    public function getOtherBlogs()
    {
        return Blog::where('id', '!=', $this->blog->id)
            ->where('blog_category_id', $this->blog->blog_category->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function getRecentBlogs()
    {
        return Blog::active()->latest('date')->limit(3)->get();
    }

    public function getPopularTag()
    {
        return Blog::active()->latest('date')->first();
    }

    public function render()
    {
        return view('livewire.blog.index', [
            'banner' => $this->getBanner(),
            'blogs' => $this->getBlogs(),
            'blogCategories' => $this->getBlogCategories(),
            'recentBlogs' => $this->getRecentBlogs(),
            'popularTag' => $this->getPopularTag(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
