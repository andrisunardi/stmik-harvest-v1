<?php

namespace App\Observers;

use App\Models\AdmissionCalendar;
use Illuminate\Support\Facades\Auth;

class AdmissionCalendarObserver
{
    public function creating(AdmissionCalendar $admissionCalendar)
    {
        $admissionCalendar->created_by_id = Auth::user()->id;
        $admissionCalendar->updated_by_id = Auth::user()->id;
    }

    public function created(AdmissionCalendar $admissionCalendar)
    {
    }

    public function updating(AdmissionCalendar $admissionCalendar)
    {
        $admissionCalendar->updated_by_id = Auth::user()->id;
    }

    public function updated(AdmissionCalendar $admissionCalendar)
    {
    }

    public function deleting(AdmissionCalendar $admissionCalendar)
    {
        $admissionCalendar->deleted_by_id = Auth::user()->id;
        $admissionCalendar->save();
    }

    public function deleted(AdmissionCalendar $admissionCalendar)
    {
    }

    public function restoring(AdmissionCalendar $admissionCalendar)
    {
        $admissionCalendar->deleted_by_id = null;
        $admissionCalendar->save();
    }

    public function restored(AdmissionCalendar $admissionCalendar)
    {
    }

    public function forceDeleted(AdmissionCalendar $admissionCalendar)
    {
    }
}
