<?php

namespace App\Observers;

use App\Models\BuyAdvertisement;
use Illuminate\Support\Facades\Auth;

class BuyAdvertisementObserver
{
    public function creating(BuyAdvertisement $buyAdvertisement)
    {
        $buyAdvertisement->created_by_id = Auth::user()->id;
        $buyAdvertisement->updated_by_id = Auth::user()->id;
    }

    public function created(BuyAdvertisement $buyAdvertisement)
    {
    }

    public function updating(BuyAdvertisement $buyAdvertisement)
    {
        $buyAdvertisement->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyAdvertisement $buyAdvertisement)
    {
    }

    public function deleting(BuyAdvertisement $buyAdvertisement)
    {
        $buyAdvertisement->deleted_by_id = Auth::user()->id;
        $buyAdvertisement->save();
    }

    public function deleted(BuyAdvertisement $buyAdvertisement)
    {
    }

    public function restoring(BuyAdvertisement $buyAdvertisement)
    {
        $buyAdvertisement->deleted_by_id = null;
        $buyAdvertisement->save();
    }

    public function restored(BuyAdvertisement $buyAdvertisement)
    {
    }

    public function forceDeleted(BuyAdvertisement $buyAdvertisement)
    {
    }
}
