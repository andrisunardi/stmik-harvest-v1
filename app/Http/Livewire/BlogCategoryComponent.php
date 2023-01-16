<?php

namespace App\Http\Livewire;

use App\Models\BlogCategory;

class BlogCategoryComponent extends Component
{
    public function getPortfolioCategories()
    {
        return BlogCategory::active()->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.blog.category.index', [
            'blogCategories' => $this->getPortfolioCategories(),
        ])->extends('layouts.app')->section('content');
    }
}
