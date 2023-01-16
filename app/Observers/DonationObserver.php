<?php

namespace App\Observers;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationObserver
{
    public function creating(Donation $donation)
    {
        $donation->created_by_id = Auth::user()->id;
        $donation->updated_by_id = Auth::user()->id;
    }

    public function created(Donation $donation)
    {
    }

    public function updating(Donation $donation)
    {
        $donation->updated_by_id = Auth::user()->id;
    }

    public function updated(Donation $donation)
    {
    }

    public function deleting(Donation $donation)
    {
        $donation->deleted_by_id = Auth::user()->id;
        $donation->save();
    }

    public function deleted(Donation $donation)
    {
    }

    public function restoring(Donation $donation)
    {
        $donation->deleted_by_id = null;
        $donation->save();
    }

    public function restored(Donation $donation)
    {
    }

    public function forceDeleted(Donation $donation)
    {
    }
}
