<?php

namespace App\Observers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationObserver
{
    public function creating(Registration $registration)
    {
        $registration->created_by_id = Auth::user()->id;
        $registration->updated_by_id = Auth::user()->id;
    }

    public function created(Registration $registration)
    {
    }

    public function updating(Registration $registration)
    {
        $registration->updated_by_id = Auth::user()->id;
    }

    public function updated(Registration $registration)
    {
    }

    public function deleting(Registration $registration)
    {
        $registration->deleted_by_id = Auth::user()->id;
        $registration->save();
    }

    public function deleted(Registration $registration)
    {
    }

    public function restoring(Registration $registration)
    {
        $registration->deleted_by_id = null;
        $registration->save();
    }

    public function restored(Registration $registration)
    {
    }

    public function forceDeleted(Registration $registration)
    {
    }
}
