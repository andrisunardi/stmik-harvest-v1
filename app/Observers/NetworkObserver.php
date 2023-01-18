<?php

namespace App\Observers;

use App\Models\Network;
use Illuminate\Support\Facades\Auth;

class NetworkObserver
{
    public function creating(Network $network)
    {
        $network->created_by_id = Auth::user()->id ?? null;
        $network->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Network $network)
    {
    }

    public function updating(Network $network)
    {
        $network->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Network $network)
    {
    }

    public function deleting(Network $network)
    {
        $network->deleted_by_id = Auth::user()->id ?? null;
        $network->save();
    }

    public function deleted(Network $network)
    {
    }

    public function restoring(Network $network)
    {
        $network->deleted_by_id = null;
        $network->save();
    }

    public function restored(Network $network)
    {
    }

    public function forceDeleted(Network $network)
    {
    }
}
