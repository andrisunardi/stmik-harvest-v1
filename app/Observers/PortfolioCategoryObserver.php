<?php

namespace App\Observers;

use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\Auth;

class PortfolioCategoryObserver
{
    public function creating(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->created_by_id = Auth::user()->id;
        $portfolioCategory->updated_by_id = Auth::user()->id;
    }

    public function created(PortfolioCategory $portfolioCategory)
    {
    }

    public function updating(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(PortfolioCategory $portfolioCategory)
    {
    }

    public function deleting(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->deleted_by_id = Auth::user()->id;
        $portfolioCategory->save();
    }

    public function deleted(PortfolioCategory $portfolioCategory)
    {
    }

    public function restoring(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->deleted_by_id = null;
        $portfolioCategory->save();
    }

    public function restored(PortfolioCategory $portfolioCategory)
    {
    }

    public function forceDeleted(PortfolioCategory $portfolioCategory)
    {
    }
}
