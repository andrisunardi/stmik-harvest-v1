<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\Session;

class PortfolioCategoryViewComponent extends Component
{
    public $page = 1;

    public $slug;

    public $portfolioCategory;

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

    public function mount($slug)
    {
        $this->portfolioCategory = PortfolioCategory::with(['portfolios' => fn ($q) => $q->publish()])
            ->where('slug', $slug)->active()->first();

        if (! $this->portfolioCategory) {
            Session::flash('danger', trans('index.portfolio_category').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route('portfolio.category.index');
        }

        $this->page = 1;
    }

    public function getPortfolios()
    {
        return Portfolio::where('portfolio_category_id', $this->portfolioCategory->id)
            ->publish()->active()->latest('id')->limit(8 * $this->page)->get();
    }

    public function render()
    {
        return view('livewire.portfolio.category.view', [
            'portfolios' => $this->getPortfolios(),
        ])->extends('layouts.app')->section('content');
    }
}
