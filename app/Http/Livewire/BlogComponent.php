<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;

class BlogComponent extends Component
{
    public function getBlogs()
    {
        return Blog::active()->orderByDesc('id')->get();
    }

    public function getBlogCategories()
    {
        return BlogCategory::active()->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.blog.index', [
            'blogs' => $this->getBlogs(),
            'blogCategories' => $this->getBlogCategories(),
        ])->extends('layouts.app')->section('content');
    }
}
