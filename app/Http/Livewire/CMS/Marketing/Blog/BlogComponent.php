<?php

namespace App\Http\Livewire\CMS\Marketing\Blog;

use App\Http\Livewire\CMS\Component;

class BlogComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.blog.index')->extends('layouts.app')->section('content');
    }
}
