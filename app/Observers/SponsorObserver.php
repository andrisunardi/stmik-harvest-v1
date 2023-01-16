<?php

namespace App\Observers;

use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;

class SponsorObserver
{
    public function creating(Sponsor $sponsor)
    {
        $sponsor->created_by_id = Auth::user()->id;
        $sponsor->updated_by_id = Auth::user()->id;
    }

    public function created(Sponsor $sponsor)
    {
    }

    public function updating(Sponsor $sponsor)
    {
        $sponsor->updated_by_id = Auth::user()->id;
    }

    public function updated(Sponsor $sponsor)
    {
    }

    public function deleting(Sponsor $sponsor)
    {
        $sponsor->deleted_by_id = Auth::user()->id;
        $sponsor->save();
    }

    public function deleted(Sponsor $sponsor)
    {
    }

    public function restoring(Sponsor $sponsor)
    {
        $sponsor->deleted_by_id = null;
        $sponsor->save();
    }

    public function restored(Sponsor $sponsor)
    {
    }

    public function forceDeleted(Sponsor $sponsor)
    {
    }
}
