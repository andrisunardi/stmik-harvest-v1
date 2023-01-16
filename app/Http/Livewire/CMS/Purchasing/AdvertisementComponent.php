<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Http\Livewire\CMS\Component;

class AdvertisementComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.advertisement-provider.index')->extends('layouts.app')->section('content');
    }
}
