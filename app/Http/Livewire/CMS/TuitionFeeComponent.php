<?php

namespace App\Http\Livewire\CMS;

class TuitionFeeComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.rules.index')->extends('layouts.app')->section('content');
    }
}
