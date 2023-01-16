<?php

namespace App\Observers;

use App\Models\BuyPlnToken;
use Illuminate\Support\Facades\Auth;

class BuyPlnTokenObserver
{
    public function creating(BuyPlnToken $buyPlnToken)
    {
        $buyPlnToken->created_by_id = Auth::user()->id;
        $buyPlnToken->updated_by_id = Auth::user()->id;
    }

    public function created(BuyPlnToken $buyPlnToken)
    {
    }

    public function updating(BuyPlnToken $buyPlnToken)
    {
        $buyPlnToken->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyPlnToken $buyPlnToken)
    {
    }

    public function deleting(BuyPlnToken $buyPlnToken)
    {
        $buyPlnToken->deleted_by_id = Auth::user()->id;
        $buyPlnToken->save();
    }

    public function deleted(BuyPlnToken $buyPlnToken)
    {
    }

    public function restoring(BuyPlnToken $buyPlnToken)
    {
        $buyPlnToken->deleted_by_id = null;
        $buyPlnToken->save();
    }

    public function restored(BuyPlnToken $buyPlnToken)
    {
    }

    public function forceDeleted(BuyPlnToken $buyPlnToken)
    {
    }
}
