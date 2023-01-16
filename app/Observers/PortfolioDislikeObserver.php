<?php

namespace App\Observers;

use App\Models\PortfolioDislike;
use Illuminate\Support\Facades\Auth;

class PortfolioDislikeObserver
{
    public function creating(PortfolioDislike $portfolioDislike)
    {
        $portfolioDislike->created_by_id = Auth::user()->id;
        $portfolioDislike->updated_by_id = Auth::user()->id;
    }

    public function created(PortfolioDislike $portfolioDislike)
    {
    }

    public function updating(PortfolioDislike $portfolioDislike)
    {
        $portfolioDislike->updated_by_id = Auth::user()->id;
    }

    public function updated(PortfolioDislike $portfolioDislike)
    {
    }

    public function deleting(PortfolioDislike $portfolioDislike)
    {
        $portfolioDislike->deleted_by_id = Auth::user()->id;
        $portfolioDislike->save();
    }

    public function deleted(PortfolioDislike $portfolioDislike)
    {
    }

    public function restoring(PortfolioDislike $portfolioDislike)
    {
        $portfolioDislike->deleted_by_id = null;
        $portfolioDislike->save();
    }

    public function restored(PortfolioDislike $portfolioDislike)
    {
    }

    public function forceDeleted(PortfolioDislike $portfolioDislike)
    {
    }
}
