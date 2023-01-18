<?php

namespace App\Http\Livewire\CMS;

class OfferComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.rules.index')->extends('layouts.app')->section('content');
    }
}
