<?php

namespace App\Observers;

use App\Models\BuyInternet;
use Illuminate\Support\Facades\Auth;

class BuyInternetObserver
{
    public function creating(BuyInternet $buyInternet)
    {
        $buyInternet->created_by_id = Auth::user()->id;
        $buyInternet->updated_by_id = Auth::user()->id;
    }

    public function created(BuyInternet $buyInternet)
    {
    }

    public function updating(BuyInternet $buyInternet)
    {
        $buyInternet->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyInternet $buyInternet)
    {
    }

    public function deleting(BuyInternet $buyInternet)
    {
        $buyInternet->deleted_by_id = Auth::user()->id;
        $buyInternet->save();
    }

    public function deleted(BuyInternet $buyInternet)
    {
    }

    public function restoring(BuyInternet $buyInternet)
    {
        $buyInternet->deleted_by_id = null;
        $buyInternet->save();
    }

    public function restored(BuyInternet $buyInternet)
    {
    }

    public function forceDeleted(BuyInternet $buyInternet)
    {
    }
}
