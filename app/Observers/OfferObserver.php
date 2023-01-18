<?php

namespace App\Observers;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferObserver
{
    public function creating(Offer $offer)
    {
        $offer->created_by_id = Auth::user()->id ?? null;
        $offer->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Offer $offer)
    {
    }

    public function updating(Offer $offer)
    {
        $offer->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Offer $offer)
    {
    }

    public function deleting(Offer $offer)
    {
        $offer->deleted_by_id = Auth::user()->id ?? null;
        $offer->save();
    }

    public function deleted(Offer $offer)
    {
    }

    public function restoring(Offer $offer)
    {
        $offer->deleted_by_id = null;
        $offer->save();
    }

    public function restored(Offer $offer)
    {
    }

    public function forceDeleted(Offer $offer)
    {
    }
}
