<?php

namespace App\Http\Livewire\CMS\Development\Portfolio;

use App\Http\Livewire\CMS\Component;

class PortfolioDislikeComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.portfolio.dislike')->extends('cms.layouts.app')->section('content');
    }
}
