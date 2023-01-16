<?php

namespace App\Http\Livewire;

use App\Models\PortfolioCategory;

class PortfolioSidebarComponent extends Component
{
    public $name;

    public $slug;

    public function getPortfolioCategories()
    {
        return PortfolioCategory::with(['portfolios' => fn ($q) => $q->publish()])
            ->active()->orderBy('name')->get();
    }

    public function mount($id, $name, $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.portfolio.sidebar', [
            'id' => $this->id,
            'name' => $this->name,
            'portfolioCategories' => $this->getPortfolioCategories(),
        ])->extends('layouts.app')->section('content');
    }
}
