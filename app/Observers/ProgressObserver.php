<?php

namespace App\Observers;

use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressObserver
{
    public function creating(Progress $progress)
    {
        $progress->created_by_id = Auth::user()->id;
        $progress->updated_by_id = Auth::user()->id;
    }

    public function created(Progress $progress)
    {
    }

    public function updating(Progress $progress)
    {
        $progress->updated_by_id = Auth::user()->id;
    }

    public function updated(Progress $progress)
    {
    }

    public function deleting(Progress $progress)
    {
        $progress->deleted_by_id = Auth::user()->id;
        $progress->save();
    }

    public function deleted(Progress $progress)
    {
    }

    public function restoring(Progress $progress)
    {
        $progress->deleted_by_id = null;
        $progress->save();
    }

    public function restored(Progress $progress)
    {
    }

    public function forceDeleted(Progress $progress)
    {
    }
}
