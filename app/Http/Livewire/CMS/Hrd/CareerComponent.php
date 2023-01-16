<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class CareerComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.career.index')->extends('layouts.app')->section('content');
    }
}
