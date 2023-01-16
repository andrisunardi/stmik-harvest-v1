<?php

namespace App\Observers;

use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;

class TestimonyObserver
{
    public function creating(Testimony $testimony)
    {
        $testimony->created_by_id = Auth::user()->id;
        $testimony->updated_by_id = Auth::user()->id;
    }

    public function created(Testimony $testimony)
    {
    }

    public function updating(Testimony $testimony)
    {
        $testimony->updated_by_id = Auth::user()->id;
    }

    public function updated(Testimony $testimony)
    {
    }

    public function deleting(Testimony $testimony)
    {
        $testimony->deleted_by_id = Auth::user()->id;
        $testimony->save();
    }

    public function deleted(Testimony $testimony)
    {
    }

    public function restoring(Testimony $testimony)
    {
        $testimony->deleted_by_id = null;
        $testimony->save();
    }

    public function restored(Testimony $testimony)
    {
    }

    public function forceDeleted(Testimony $testimony)
    {
    }
}
