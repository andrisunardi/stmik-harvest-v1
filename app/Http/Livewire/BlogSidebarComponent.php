<?php

namespace App\Http\Livewire;

use App\Models\BlogCategory;

class BlogSidebarComponent extends Component
{
    public $name;

    public $slug;

    public function getBlogCategories()
    {
        return BlogCategory::with('blogs')->active()->orderBy('name')->get();
    }

    public function mount($id, $name, $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.blog.sidebar', [
            'id' => $this->id,
            'name' => $this->name,
            'blogCategories' => $this->getBlogCategories(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
