<?php

namespace App\Observers;

use App\Models\InternetProvider;
use Illuminate\Support\Facades\Auth;

class InternetProviderObserver
{
    public function creating(InternetProvider $internetProvider)
    {
        $internetProvider->created_by_id = Auth::user()->id;
        $internetProvider->updated_by_id = Auth::user()->id;
    }

    public function created(InternetProvider $internetProvider)
    {
    }

    public function updating(InternetProvider $internetProvider)
    {
        $internetProvider->updated_by_id = Auth::user()->id;
    }

    public function updated(InternetProvider $internetProvider)
    {
    }

    public function deleting(InternetProvider $internetProvider)
    {
        $internetProvider->deleted_by_id = Auth::user()->id;
        $internetProvider->save();
    }

    public function deleted(InternetProvider $internetProvider)
    {
    }

    public function restoring(InternetProvider $internetProvider)
    {
        $internetProvider->deleted_by_id = null;
        $internetProvider->save();
    }

    public function restored(InternetProvider $internetProvider)
    {
    }

    public function forceDeleted(InternetProvider $internetProvider)
    {
    }
}
