<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Http\Livewire\CMS\Component;

class InternetProviderComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.internet-provider.index')->extends('layouts.app')->section('content');
    }
}
