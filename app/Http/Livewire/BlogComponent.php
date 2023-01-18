<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class BlogComponent extends Component
{
    use WithPagination;

    public $page = 1;

    public $search;

    public $category;

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => ''],
        'category' => ['except' => ''],
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
        $blogCategory = BlogCategory::where('slug', $this->category)->first();

        if ($this->category && ! $blogCategory) {
            abort(404);
            Session::flash('danger', trans('index.blog_category').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route("{$this->menu_slug}.index");
        }
    }

    public function getBanner()
    {
        return Banner::find(15);
    }

    public function getBlogs()
    {
        $data_blog = Blog::when($this->search, fn ($query) => $query->where('name', 'like', "%{$this->search}%")
            ->orWhere('name_id', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->orWhere('description_id', 'like', "%{$this->search}%")
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
        ])->extends('layouts.app')->section('content');
    }
}
