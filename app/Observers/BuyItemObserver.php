<?php

namespace App\Observers;

use App\Models\BuyItem;
use Illuminate\Support\Facades\Auth;

class BuyItemObserver
{
    public function creating(BuyItem $buyItem)
    {
        $buyItem->created_by_id = Auth::user()->id;
        $buyItem->updated_by_id = Auth::user()->id;
    }

    public function created(BuyItem $buyItem)
    {
    }

    public function updating(BuyItem $buyItem)
    {
        $buyItem->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyItem $buyItem)
    {
    }

    public function deleting(BuyItem $buyItem)
    {
        $buyItem->deleted_by_id = Auth::user()->id;
        $buyItem->save();
    }

    public function deleted(BuyItem $buyItem)
    {
    }

    public function restoring(BuyItem $buyItem)
    {
        $buyItem->deleted_by_id = null;
        $buyItem->save();
    }

    public function restored(BuyItem $buyItem)
    {
    }

    public function forceDeleted(BuyItem $buyItem)
    {
    }
}
