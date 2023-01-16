<?php

namespace App\Observers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobObserver
{
    public function creating(Job $job)
    {
        $job->created_by_id = Auth::user()->id;
        $job->updated_by_id = Auth::user()->id;
    }

    public function created(Job $job)
    {
    }

    public function updating(Job $job)
    {
        $job->updated_by_id = Auth::user()->id;
    }

    public function updated(Job $job)
    {
    }

    public function deleting(Job $job)
    {
        $job->deleted_by_id = Auth::user()->id;
        $job->save();
    }

    public function deleted(Job $job)
    {
    }

    public function restoring(Job $job)
    {
        $job->deleted_by_id = null;
        $job->save();
    }

    public function restored(Job $job)
    {
    }

    public function forceDeleted(Job $job)
    {
    }
}
