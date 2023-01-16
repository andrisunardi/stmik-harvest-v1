<?php

namespace App\Observers;

use App\Models\JobCategory;
use Illuminate\Support\Facades\Auth;

class JobCategoryObserver
{
    public function creating(JobCategory $jobCategory)
    {
        $jobCategory->created_by_id = Auth::user()->id;
        $jobCategory->updated_by_id = Auth::user()->id;
    }

    public function created(JobCategory $jobCategory)
    {
    }

    public function updating(JobCategory $jobCategory)
    {
        $jobCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(JobCategory $jobCategory)
    {
    }

    public function deleting(JobCategory $jobCategory)
    {
        $jobCategory->deleted_by_id = Auth::user()->id;
        $jobCategory->save();
    }

    public function deleted(JobCategory $jobCategory)
    {
    }

    public function restoring(JobCategory $jobCategory)
    {
        $jobCategory->deleted_by_id = null;
        $jobCategory->save();
    }

    public function restored(JobCategory $jobCategory)
    {
    }

    public function forceDeleted(JobCategory $jobCategory)
    {
    }
}
