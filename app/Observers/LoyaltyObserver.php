<?php

namespace App\Observers;

use App\Models\Loyalty;
use Illuminate\Support\Facades\Auth;

class LoyaltyObserver
{
    public function creating(Loyalty $loyalty)
    {
        $loyalty->created_by_id = Auth::user()->id;
        $loyalty->updated_by_id = Auth::user()->id;
    }

    public function created(Loyalty $loyalty)
    {
    }

    public function updating(Loyalty $loyalty)
    {
        $loyalty->updated_by_id = Auth::user()->id;
    }

    public function updated(Loyalty $loyalty)
    {
    }

    public function deleting(Loyalty $loyalty)
    {
        $loyalty->deleted_by_id = Auth::user()->id;
        $loyalty->save();
    }

    public function deleted(Loyalty $loyalty)
    {
    }

    public function restoring(Loyalty $loyalty)
    {
        $loyalty->deleted_by_id = null;
        $loyalty->save();
    }

    public function restored(Loyalty $loyalty)
    {
    }

    public function forceDeleted(Loyalty $loyalty)
    {
    }
}
