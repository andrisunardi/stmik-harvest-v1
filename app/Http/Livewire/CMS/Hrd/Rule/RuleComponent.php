<?php

namespace App\Http\Livewire\CMS\Hrd\Rule;

use App\Http\Livewire\CMS\Component;

class RuleComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.rules.index')->extends('layouts.app')->section('content');
    }
}
