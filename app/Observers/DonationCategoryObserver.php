<?php

namespace App\Observers;

use App\Models\DonationCategory;
use Illuminate\Support\Facades\Auth;

class DonationCategoryObserver
{
    public function creating(DonationCategory $donationCategory)
    {
        $donationCategory->created_by_id = Auth::user()->id;
        $donationCategory->updated_by_id = Auth::user()->id;
    }

    public function created(DonationCategory $donationCategory)
    {
    }

    public function updating(DonationCategory $donationCategory)
    {
        $donationCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(DonationCategory $donationCategory)
    {
    }

    public function deleting(DonationCategory $donationCategory)
    {
        $donationCategory->deleted_by_id = Auth::user()->id;
        $donationCategory->save();
    }

    public function deleted(DonationCategory $donationCategory)
    {
    }

    public function restoring(DonationCategory $donationCategory)
    {
        $donationCategory->deleted_by_id = null;
        $donationCategory->save();
    }

    public function restored(DonationCategory $donationCategory)
    {
    }

    public function forceDeleted(DonationCategory $donationCategory)
    {
    }
}
