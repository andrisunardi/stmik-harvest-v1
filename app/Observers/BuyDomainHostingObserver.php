<?php

namespace App\Observers;

use App\Models\BuyDomainHosting;
use Illuminate\Support\Facades\Auth;

class BuyDomainHostingObserver
{
    public function creating(BuyDomainHosting $buyDomainHosting)
    {
        $buyDomainHosting->created_by_id = Auth::user()->id;
        $buyDomainHosting->updated_by_id = Auth::user()->id;
    }

    public function created(BuyDomainHosting $buyDomainHosting)
    {
    }

    public function updating(BuyDomainHosting $buyDomainHosting)
    {
        $buyDomainHosting->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyDomainHosting $buyDomainHosting)
    {
    }

    public function deleting(BuyDomainHosting $buyDomainHosting)
    {
        $buyDomainHosting->deleted_by_id = Auth::user()->id;
        $buyDomainHosting->save();
    }

    public function deleted(BuyDomainHosting $buyDomainHosting)
    {
    }

    public function restoring(BuyDomainHosting $buyDomainHosting)
    {
        $buyDomainHosting->deleted_by_id = null;
        $buyDomainHosting->save();
    }

    public function restored(BuyDomainHosting $buyDomainHosting)
    {
    }

    public function forceDeleted(BuyDomainHosting $buyDomainHosting)
    {
    }
}
