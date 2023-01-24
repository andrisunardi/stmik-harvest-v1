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

    public $blogCategory;

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
        $this->blogCategory = BlogCategory::where('slug', $this->category)->first();

        if ($this->category && ! $this->blogCategory) {
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
        $data_blog = Blog::when($this->search, fn ($query) => $query->where('title', 'like', "%{$this->search}%")
            ->orWhere('title_idn', 'like', "%{$this->search}%")
            ->orWhere('short_body', 'like', "%{$this->search}%")
            ->orWhere('short_body_idn', 'like', "%{$this->search}%")
            ->orWhere('body', 'like', "%{$this->search}%")
            ->orWhere('body_idn', 'like', "%{$this->search}%")
            ->orWhere('tag', 'like', "%{$this->search}%")
            ->orWhere('tag_id', 'like', "%{$this->search}%")
        )->when($this->category, fn ($query) => $query->where('blog_category_id', $this->blogCategory->id)
        )->active()->orderByDesc('id');

        if ($this->search) {
            Session::flash('success', trans('index.found')." <b>'{$data_blog->count()}'</b> ".trans('index.results_for')." <b>'{$this->search}'</b>");
        }

        return $data_blog->paginate(10);
    }

    public function render()
    {
        return view('livewire.blog.index', [
            'blogs' => $this->getBlogs(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
