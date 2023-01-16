<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Http\Livewire\CMS\Component;

class PhoneCreditProviderComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.phone-credit-provider.index')->extends('layouts.app')->section('content');
    }
}
