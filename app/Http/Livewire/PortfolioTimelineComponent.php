<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;

class PortfolioTimelineComponent extends Component
{
    public $page = 1;

    public $queryString = [
        'page' => ['except' => 1],
    ];

    public function loadMore()
    {
        $this->page += 1;
    }

    public function mount()
    {
        $this->page = 1;
    }

    public function getPortfolios()
    {
        return Portfolio::with('portfolioCategory')->publish()->active()->latest('datetime')->limit(10 * $this->page)->get();
    }

    public function render()
    {
        return view('livewire.portfolio.timeline', [
            'portfolios' => $this->getPortfolios(),
        ])->extends('layouts.app')->section('content');
    }
}
