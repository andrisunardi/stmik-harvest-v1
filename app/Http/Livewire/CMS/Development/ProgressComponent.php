<?php

namespace App\Http\Livewire\CMS\Development;

use App\Http\Livewire\CMS\Component;

class ProgressComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.progress.index')->extends('layouts.app')->section('content');
    }
}
