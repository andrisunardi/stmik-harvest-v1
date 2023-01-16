<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class RegisterInfluencerComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.register-influence.index')->extends('layouts.app')->section('content');
    }
}
