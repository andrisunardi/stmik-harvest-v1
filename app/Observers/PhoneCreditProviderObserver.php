<?php

namespace App\Observers;

use App\Models\PhoneCreditProvider;
use Illuminate\Support\Facades\Auth;

class PhoneCreditProviderObserver
{
    public function creating(PhoneCreditProvider $phoneCreditProvider)
    {
        $phoneCreditProvider->created_by_id = Auth::user()->id;
        $phoneCreditProvider->updated_by_id = Auth::user()->id;
    }

    public function created(PhoneCreditProvider $phoneCreditProvider)
    {
    }

    public function updating(PhoneCreditProvider $phoneCreditProvider)
    {
        $phoneCreditProvider->updated_by_id = Auth::user()->id;
    }

    public function updated(PhoneCreditProvider $phoneCreditProvider)
    {
    }

    public function deleting(PhoneCreditProvider $phoneCreditProvider)
    {
        $phoneCreditProvider->deleted_by_id = Auth::user()->id;
        $phoneCreditProvider->save();
    }

    public function deleted(PhoneCreditProvider $phoneCreditProvider)
    {
    }

    public function restoring(PhoneCreditProvider $phoneCreditProvider)
    {
        $phoneCreditProvider->deleted_by_id = null;
        $phoneCreditProvider->save();
    }

    public function restored(PhoneCreditProvider $phoneCreditProvider)
    {
    }

    public function forceDeleted(PhoneCreditProvider $phoneCreditProvider)
    {
    }
}
