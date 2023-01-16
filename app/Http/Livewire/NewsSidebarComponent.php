<?php

namespace App\Http\Livewire;

use App\Models\NewsCategory;

class NewsSidebarComponent extends Component
{
    public $name;

    public $slug;

    public function getNewsCategories()
    {
        return NewsCategory::with('newss')->active()->orderBy('name')->get();
    }

    public function mount($id, $name, $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.news.sidebar', [
            'id' => $this->id,
            'name' => $this->name,
            'newsCategories' => $this->getNewsCategories(),
        ])->extends('layouts.app')->section('content');
    }
}
