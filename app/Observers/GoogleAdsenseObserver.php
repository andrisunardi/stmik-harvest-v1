<?php

namespace App\Observers;

use App\Models\GoogleAdsense;
use Illuminate\Support\Facades\Auth;

class GoogleAdsenseObserver
{
    public function creating(GoogleAdsense $googleAdsense)
    {
        $googleAdsense->created_by_id = Auth::user()->id;
        $googleAdsense->updated_by_id = Auth::user()->id;
    }

    public function created(GoogleAdsense $googleAdsense)
    {
    }

    public function updating(GoogleAdsense $googleAdsense)
    {
        $googleAdsense->updated_by_id = Auth::user()->id;
    }

    public function updated(GoogleAdsense $googleAdsense)
    {
    }

    public function deleting(GoogleAdsense $googleAdsense)
    {
        $googleAdsense->deleted_by_id = Auth::user()->id;
        $googleAdsense->save();
    }

    public function deleted(GoogleAdsense $googleAdsense)
    {
    }

    public function restoring(GoogleAdsense $googleAdsense)
    {
        $googleAdsense->deleted_by_id = null;
        $googleAdsense->save();
    }

    public function restored(GoogleAdsense $googleAdsense)
    {
    }

    public function forceDeleted(GoogleAdsense $googleAdsense)
    {
    }
}
