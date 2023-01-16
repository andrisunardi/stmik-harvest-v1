<?php

namespace App\Observers;

use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class QuoteObserver
{
    public function creating(Quote $quote)
    {
        $quote->created_by_id = Auth::user()->id;
        $quote->updated_by_id = Auth::user()->id;
    }

    public function created(Quote $quote)
    {
    }

    public function updating(Quote $quote)
    {
        $quote->updated_by_id = Auth::user()->id;
    }

    public function updated(Quote $quote)
    {
    }

    public function deleting(Quote $quote)
    {
        $quote->deleted_by_id = Auth::user()->id;
        $quote->save();
    }

    public function deleted(Quote $quote)
    {
    }

    public function restoring(Quote $quote)
    {
        $quote->deleted_by_id = null;
        $quote->save();
    }

    public function restored(Quote $quote)
    {
    }

    public function forceDeleted(Quote $quote)
    {
    }
}
