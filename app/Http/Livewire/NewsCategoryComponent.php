<?php

namespace App\Http\Livewire;

use App\Models\NewsCategory;

class NewsCategoryComponent extends Component
{
    public function getPortfolioCategories()
    {
        return NewsCategory::with('newss')->active()->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.news.category.index', [
            'newsCategories' => $this->getPortfolioCategories(),
        ])->extends('layouts.app')->section('content');
    }
}
