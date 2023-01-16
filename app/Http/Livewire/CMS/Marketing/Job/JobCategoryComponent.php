<?php

namespace App\Http\Livewire\CMS\Marketing\Job;

use App\Http\Livewire\CMS\Component;

class JobCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.news.index')->extends('layouts.app')->section('content');
    }
}
