<?php

namespace App\Observers;

use App\Models\Refund;
use Illuminate\Support\Facades\Auth;

class RefundObserver
{
    public function creating(Refund $refund)
    {
        $refund->created_by_id = Auth::user()->id;
        $refund->updated_by_id = Auth::user()->id;
    }

    public function created(Refund $refund)
    {
    }

    public function updating(Refund $refund)
    {
        $refund->updated_by_id = Auth::user()->id;
    }

    public function updated(Refund $refund)
    {
    }

    public function deleting(Refund $refund)
    {
        $refund->deleted_by_id = Auth::user()->id;
        $refund->save();
    }

    public function deleted(Refund $refund)
    {
    }

    public function restoring(Refund $refund)
    {
        $refund->deleted_by_id = null;
        $refund->save();
    }

    public function restored(Refund $refund)
    {
    }

    public function forceDeleted(Refund $refund)
    {
    }
}
