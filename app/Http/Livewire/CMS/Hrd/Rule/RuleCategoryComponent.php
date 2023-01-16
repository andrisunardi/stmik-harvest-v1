<?php

namespace App\Http\Livewire\CMS\Hrd\Rule;

use App\Http\Livewire\CMS\Component;

class RuleCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.rules.category')->extends('layouts.app')->section('content');
    }
}
