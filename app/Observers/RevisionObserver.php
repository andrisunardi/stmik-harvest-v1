<?php

namespace App\Observers;

use App\Models\Revision;
use Illuminate\Support\Facades\Auth;

class RevisionObserver
{
    public function creating(Revision $revision)
    {
        $revision->created_by_id = Auth::user()->id;
        $revision->updated_by_id = Auth::user()->id;
    }

    public function created(Revision $revision)
    {
    }

    public function updating(Revision $revision)
    {
        $revision->updated_by_id = Auth::user()->id;
    }

    public function updated(Revision $revision)
    {
    }

    public function deleting(Revision $revision)
    {
        $revision->deleted_by_id = Auth::user()->id;
        $revision->save();
    }

    public function deleted(Revision $revision)
    {
    }

    public function restoring(Revision $revision)
    {
        $revision->deleted_by_id = null;
        $revision->save();
    }

    public function restored(Revision $revision)
    {
    }

    public function forceDeleted(Revision $revision)
    {
    }
}
