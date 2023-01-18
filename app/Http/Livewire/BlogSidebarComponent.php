<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;

class BlogSidebarComponent extends Component
{
    public function getBlogCategories()
    {
        return BlogCategory::active()->orderBy('name')->get();
    }

    public function getRecentBlogs()
    {
        return Blog::with('blogCategory')->active()->latest('date')->limit(3)->get();
    }

    public function getPopularTags()
    {
        return Blog::active()->latest('date')->first();
    }

    public function render()
    {
        return view('livewire.blog.sidebar', [
            'blogCategories' => $this->getBlogCategories(),
            'recentBlogs' => $this->getRecentBlogs(),
            'popularTags' => $this->getPopularTags(),
        ])->extends('layouts.app')->section('content');
    }
}
