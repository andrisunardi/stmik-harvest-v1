<?php

namespace App\Observers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;

class PortfolioObserver
{
    public function creating(Portfolio $portfolio)
    {
        $portfolio->created_by_id = Auth::user()->id;
        $portfolio->updated_by_id = Auth::user()->id;
    }

    public function created(Portfolio $portfolio)
    {
    }

    public function updating(Portfolio $portfolio)
    {
        $portfolio->updated_by_id = Auth::user()->id;
    }

    public function updated(Portfolio $portfolio)
    {
    }

    public function deleting(Portfolio $portfolio)
    {
        $portfolio->deleted_by_id = Auth::user()->id;
        $portfolio->save();
    }

    public function deleted(Portfolio $portfolio)
    {
    }

    public function restoring(Portfolio $portfolio)
    {
        $portfolio->deleted_by_id = null;
        $portfolio->save();
    }

    public function restored(Portfolio $portfolio)
    {
    }

    public function forceDeleted(Portfolio $portfolio)
    {
    }
}
