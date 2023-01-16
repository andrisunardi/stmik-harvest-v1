<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Http\Livewire\CMS\Component;

class BuyPlnTokenComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.buy-pln-token.index')->extends('layouts.app')->section('content');
    }
}
