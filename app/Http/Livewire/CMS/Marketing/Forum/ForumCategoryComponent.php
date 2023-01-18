<?php

namespace App\Http\Livewire\CMS\Marketing\Forum;

use App\Http\Livewire\CMS\Component;

class ForumCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.news.index')->extends('layouts.app')->section('content');
    }
}