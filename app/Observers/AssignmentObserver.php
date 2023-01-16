<?php

namespace App\Observers;

use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class AssignmentObserver
{
    public function creating(Assignment $assignment)
    {
        $assignment->created_by_id = Auth::user()->id;
        $assignment->updated_by_id = Auth::user()->id;
    }

    public function created(Assignment $assignment)
    {
    }

    public function updating(Assignment $assignment)
    {
        $assignment->updated_by_id = Auth::user()->id;
    }

    public function updated(Assignment $assignment)
    {
    }

    public function deleting(Assignment $assignment)
    {
        $assignment->deleted_by_id = Auth::user()->id;
        $assignment->save();
    }

    public function deleted(Assignment $assignment)
    {
    }

    public function restoring(Assignment $assignment)
    {
        $assignment->deleted_by_id = null;
        $assignment->save();
    }

    public function restored(Assignment $assignment)
    {
    }

    public function forceDeleted(Assignment $assignment)
    {
    }
}
