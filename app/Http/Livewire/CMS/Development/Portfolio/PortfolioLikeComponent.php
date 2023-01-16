<?php

namespace App\Http\Livewire\CMS\Development\Portfolio;

use App\Http\Livewire\CMS\Component;

class PortfolioLikeComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.portfolio.like')->extends('cms.layouts.app')->section('content');
    }
}
