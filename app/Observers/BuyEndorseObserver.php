<?php

namespace App\Observers;

use App\Models\BuyEndorse;
use Illuminate\Support\Facades\Auth;

class BuyEndorseObserver
{
    public function creating(BuyEndorse $buyEndorse)
    {
        $buyEndorse->created_by_id = Auth::user()->id;
        $buyEndorse->updated_by_id = Auth::user()->id;
    }

    public function created(BuyEndorse $buyEndorse)
    {
    }

    public function updating(BuyEndorse $buyEndorse)
    {
        $buyEndorse->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyEndorse $buyEndorse)
    {
    }

    public function deleting(BuyEndorse $buyEndorse)
    {
        $buyEndorse->deleted_by_id = Auth::user()->id;
        $buyEndorse->save();
    }

    public function deleted(BuyEndorse $buyEndorse)
    {
    }

    public function restoring(BuyEndorse $buyEndorse)
    {
        $buyEndorse->deleted_by_id = null;
        $buyEndorse->save();
    }

    public function restored(BuyEndorse $buyEndorse)
    {
    }

    public function forceDeleted(BuyEndorse $buyEndorse)
    {
    }
}
