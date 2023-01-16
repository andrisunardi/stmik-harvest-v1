<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class TestimonialComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.rules.index')->extends('layouts.app')->section('content');
    }
}
