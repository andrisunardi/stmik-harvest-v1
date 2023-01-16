<?php

namespace App\Observers;

use App\Models\Absent;
use Illuminate\Support\Facades\Auth;

class AbsentObserver
{
    public function creating(Absent $absent)
    {
        $absent->created_by_id = Auth::user()->id;
        $absent->updated_by_id = Auth::user()->id;
    }

    public function created(Absent $absent)
    {
    }

    public function updating(Absent $absent)
    {
        $absent->updated_by_id = Auth::user()->id;
    }

    public function updated(Absent $absent)
    {
    }

    public function deleting(Absent $absent)
    {
        $absent->deleted_by_id = Auth::user()->id;
        $absent->save();
    }

    public function deleted(Absent $absent)
    {
    }

    public function restoring(Absent $absent)
    {
        $absent->deleted_by_id = null;
        $absent->save();
    }

    public function restored(Absent $absent)
    {
    }

    public function forceDeleted(Absent $absent)
    {
    }
}
