<?php

namespace App\Http\Livewire;

class BlogCategoryViewComponent extends Component
{
    public function render()
    {
        return view('livewire.blog.category.view')->extends('layouts.app')->section('content');
    }
}
