<?php

namespace App\Http\Livewire\CMS\Marketing\News;

use App\Http\Livewire\CMS\Component;

class NewsComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.news.index')->extends('layouts.app')->section('content');
    }
}
