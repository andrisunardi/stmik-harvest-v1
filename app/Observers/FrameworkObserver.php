<?php

namespace App\Observers;

use App\Models\Framework;
use Illuminate\Support\Facades\Auth;

class FrameworkObserver
{
    public function creating(Framework $framework)
    {
        $framework->created_by_id = Auth::user()->id;
        $framework->updated_by_id = Auth::user()->id;
    }

    public function created(Framework $framework)
    {
    }

    public function updating(Framework $framework)
    {
        $framework->updated_by_id = Auth::user()->id;
    }

    public function updated(Framework $framework)
    {
    }

    public function deleting(Framework $framework)
    {
        $framework->deleted_by_id = Auth::user()->id;
        $framework->save();
    }

    public function deleted(Framework $framework)
    {
    }

    public function restoring(Framework $framework)
    {
        $framework->deleted_by_id = null;
        $framework->save();
    }

    public function restored(Framework $framework)
    {
    }

    public function forceDeleted(Framework $framework)
    {
    }
}
