<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Http\Livewire\CMS\Component;

class BuyPhoneCreditComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.buy-phone-credit.index')->extends('layouts.app')->section('content');
    }
}
