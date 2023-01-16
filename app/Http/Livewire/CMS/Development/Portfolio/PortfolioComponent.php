<?php

namespace App\Http\Livewire\CMS\Development\Portfolio;

use App\Http\Livewire\CMS\Component;

class PortfolioComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.portfolio.index')->extends('layouts.app')->section('content');
    }
}
