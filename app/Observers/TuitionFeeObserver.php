<?php

namespace App\Observers;

use App\Models\TuitionFee;
use Illuminate\Support\Facades\Auth;

class TuitionFeeObserver
{
    public function creating(TuitionFee $tuitionFee)
    {
        $tuitionFee->created_by_id = Auth::user()->id ?? null;
        $tuitionFee->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(TuitionFee $tuitionFee)
    {
    }

    public function updating(TuitionFee $tuitionFee)
    {
        $tuitionFee->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(TuitionFee $tuitionFee)
    {
    }

    public function deleting(TuitionFee $tuitionFee)
    {
        $tuitionFee->deleted_by_id = Auth::user()->id ?? null;
        $tuitionFee->save();
    }

    public function deleted(TuitionFee $tuitionFee)
    {
    }

    public function restoring(TuitionFee $tuitionFee)
    {
        $tuitionFee->deleted_by_id = null;
        $tuitionFee->save();
    }

    public function restored(TuitionFee $tuitionFee)
    {
    }

    public function forceDeleted(TuitionFee $tuitionFee)
    {
    }
}
