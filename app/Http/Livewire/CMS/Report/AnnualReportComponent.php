<?php

namespace App\Http\Livewire\CMS\Report;

use App\Http\Livewire\CMS\Component;

class AnnualReportComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.administrative-cost.index')->extends('layouts.app')->section('content');
    }
}
