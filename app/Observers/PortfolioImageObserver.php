<?php

namespace App\Observers;

use App\Models\PortfolioImage;
use Illuminate\Support\Facades\Auth;

class PortfolioImageObserver
{
    public function creating(PortfolioImage $portfolioImage)
    {
        $portfolioImage->created_by_id = Auth::user()->id;
        $portfolioImage->updated_by_id = Auth::user()->id;
    }

    public function created(PortfolioImage $portfolioImage)
    {
    }

    public function updating(PortfolioImage $portfolioImage)
    {
        $portfolioImage->updated_by_id = Auth::user()->id;
    }

    public function updated(PortfolioImage $portfolioImage)
    {
    }

    public function deleting(PortfolioImage $portfolioImage)
    {
        $portfolioImage->deleted_by_id = Auth::user()->id;
        $portfolioImage->save();
    }

    public function deleted(PortfolioImage $portfolioImage)
    {
    }

    public function restoring(PortfolioImage $portfolioImage)
    {
        $portfolioImage->deleted_by_id = null;
        $portfolioImage->save();
    }

    public function restored(PortfolioImage $portfolioImage)
    {
    }

    public function forceDeleted(PortfolioImage $portfolioImage)
    {
    }
}
