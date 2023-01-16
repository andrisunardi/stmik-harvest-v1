<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\Session;

class PortfolioViewComponent extends Component
{
    public $portfolio;

    public function mount($slug)
    {
        $this->portfolio = Portfolio::where('slug', $slug)->publish()->active()->first();

        if (! $this->portfolio) {
            Session::flash('danger', trans('index.portfolio').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route('portfolio.index');
        }
    }

    public function getPortfolios()
    {
        return Portfolio::where('portfolio_category_id', $this->portfolioCategory->id)
            ->publish()
            ->active()
            ->latest('id')
            ->limit(10)
            ->get();
    }

    public function getPortfolioCategories()
    {
        return PortfolioCategory::active()->orderBy('name')->get();
    }

    public function getRelatedPortfolios()
    {
        return Portfolio::where('portfolio_category_id', $this->portfolio->portfolio_category_id)
            ->where('id', '!=', $this->portfolio->id)
            ->publish()
            ->active()
            ->inRandomOrder()
            ->limit('8')
            ->get();
    }

    public function render()
    {
        return view('livewire.portfolio.view', [
            'portfolioCategories' => $this->getPortfolioCategories(),
            'relatedPortfolios' => $this->getRelatedPortfolios(),
        ])->extends('layouts.app')->section('content');
    }
}
