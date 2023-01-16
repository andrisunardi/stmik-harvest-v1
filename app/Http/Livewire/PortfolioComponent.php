<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;

class PortfolioComponent extends Component
{
    public $page = 1;

    public $queryString = [
        'page' => ['except' => 1],
    ];

    public function loadMore()
    {
        $this->page += 1;
    }

    public function resetFilter()
    {
        $this->reset(['page']);
    }

    public function mount()
    {
        $this->page = 1;
    }

    public function getPortfolios()
    {
        return Portfolio::with('portfolioCategory')->publish()->active()->latest('id')->limit(8 * $this->page)->get();
    }

    public function render()
    {
        return view('livewire.portfolio.index', [
            'portfolios' => $this->getPortfolios(),
        ])->extends('layouts.app')->section('content');
    }
}
