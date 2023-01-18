<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Blog;
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

    public function getRelatedBlogs()
    {
        return Blog::where('id', '!=', $this->blog->id)
            ->where('blog_category_id', $this->blog->blogCategory->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.view', [
            'banner' => $this->getBanner(),
            'relatedBlogs' => $this->getRelatedBlogs(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
