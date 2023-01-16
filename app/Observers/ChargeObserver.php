<?php

namespace App\Observers;

use App\Models\Charge;
use Illuminate\Support\Facades\Auth;

class ChargeObserver
{
    public function creating(Charge $charge)
    {
        $charge->created_by_id = Auth::user()->id;
        $charge->updated_by_id = Auth::user()->id;
    }

    public function created(Charge $charge)
    {
    }

    public function updating(Charge $charge)
    {
        $charge->updated_by_id = Auth::user()->id;
    }

    public function updated(Charge $charge)
    {
    }

    public function deleting(Charge $charge)
    {
        $charge->deleted_by_id = Auth::user()->id;
        $charge->save();
    }

    public function deleted(Charge $charge)
    {
    }

    public function restoring(Charge $charge)
    {
        $charge->deleted_by_id = null;
        $charge->save();
    }

    public function restored(Charge $charge)
    {
    }

    public function forceDeleted(Charge $charge)
    {
    }
}
