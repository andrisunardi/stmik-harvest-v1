<?php

namespace App\Observers;

use App\Models\PriceList;
use Illuminate\Support\Facades\Auth;

class PriceListObserver
{
    public function creating(PriceList $priceList)
    {
        $priceList->created_by_id = Auth::user()->id;
        $priceList->updated_by_id = Auth::user()->id;
    }

    public function created(PriceList $priceList)
    {
    }

    public function updating(PriceList $priceList)
    {
        $priceList->updated_by_id = Auth::user()->id;
    }

    public function updated(PriceList $priceList)
    {
    }

    public function deleting(PriceList $priceList)
    {
        $priceList->deleted_by_id = Auth::user()->id;
        $priceList->save();
    }

    public function deleted(PriceList $priceList)
    {
    }

    public function restoring(PriceList $priceList)
    {
        $priceList->deleted_by_id = null;
        $priceList->save();
    }

    public function restored(PriceList $priceList)
    {
    }

    public function forceDeleted(PriceList $priceList)
    {
    }
}
