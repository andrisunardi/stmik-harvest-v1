<?php

namespace App\Observers;

use App\Models\Procedure;
use Illuminate\Support\Facades\Auth;

class ProcedureObserver
{
    public function creating(Procedure $procedure)
    {
        $procedure->created_by_id = Auth::user()->id;
        $procedure->updated_by_id = Auth::user()->id;
    }

    public function created(Procedure $procedure)
    {
    }

    public function updating(Procedure $procedure)
    {
        $procedure->updated_by_id = Auth::user()->id;
    }

    public function updated(Procedure $procedure)
    {
    }

    public function deleting(Procedure $procedure)
    {
        $procedure->deleted_by_id = Auth::user()->id;
        $procedure->save();
    }

    public function deleted(Procedure $procedure)
    {
    }

    public function restoring(Procedure $procedure)
    {
        $procedure->deleted_by_id = null;
        $procedure->save();
    }

    public function restored(Procedure $procedure)
    {
    }

    public function forceDeleted(Procedure $procedure)
    {
    }
}
