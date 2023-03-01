<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Blog;

class BlogViewComponent extends Component
{
    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->active()->firstOrFail();
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
            'relatedBlogs' => $this->getRelatedBlogs(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
