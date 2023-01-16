<?php

namespace App\Http\Livewire;

use App\Models\PortfolioCategory;

class PortfolioCategoryComponent extends Component
{
    public function getPortfolioCategories()
    {
        return PortfolioCategory::with(['portfolios' => fn ($q) => $q->publish()])
            ->active()->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.portfolio.category.index', [
            'portfolioCategories' => $this->getPortfolioCategories(),
        ])->extends('layouts.app')->section('content');
    }
}
