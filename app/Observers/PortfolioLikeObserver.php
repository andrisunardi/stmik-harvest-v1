<?php

namespace App\Observers;

use App\Models\PortfolioLike;
use Illuminate\Support\Facades\Auth;

class PortfolioLikeObserver
{
    public function creating(PortfolioLike $portfolioLike)
    {
        $portfolioLike->created_by_id = Auth::user()->id;
        $portfolioLike->updated_by_id = Auth::user()->id;
    }

    public function created(PortfolioLike $portfolioLike)
    {
    }

    public function updating(PortfolioLike $portfolioLike)
    {
        $portfolioLike->updated_by_id = Auth::user()->id;
    }

    public function updated(PortfolioLike $portfolioLike)
    {
    }

    public function deleting(PortfolioLike $portfolioLike)
    {
        $portfolioLike->deleted_by_id = Auth::user()->id;
        $portfolioLike->save();
    }

    public function deleted(PortfolioLike $portfolioLike)
    {
    }

    public function restoring(PortfolioLike $portfolioLike)
    {
        $portfolioLike->deleted_by_id = null;
        $portfolioLike->save();
    }

    public function restored(PortfolioLike $portfolioLike)
    {
    }

    public function forceDeleted(PortfolioLike $portfolioLike)
    {
    }
}
