<?php

namespace App\Http\Livewire\CMS\Finance;

use App\Http\Livewire\CMS\Component;

class InvoiceComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.administrative-cost.index')->extends('layouts.app')->section('content');
    }
}
