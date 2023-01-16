<?php

namespace App\Observers;

use App\Models\NewsCategory;
use Illuminate\Support\Facades\Auth;

class NewsCategoryObserver
{
    public function creating(NewsCategory $newsCategory)
    {
        $newsCategory->created_by_id = Auth::user()->id;
        $newsCategory->updated_by_id = Auth::user()->id;
    }

    public function created(NewsCategory $newsCategory)
    {
    }

    public function updating(NewsCategory $newsCategory)
    {
        $newsCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(NewsCategory $newsCategory)
    {
    }

    public function deleting(NewsCategory $newsCategory)
    {
        $newsCategory->deleted_by_id = Auth::user()->id;
        $newsCategory->save();
    }

    public function deleted(NewsCategory $newsCategory)
    {
    }

    public function restoring(NewsCategory $newsCategory)
    {
        $newsCategory->deleted_by_id = null;
        $newsCategory->save();
    }

    public function restored(NewsCategory $newsCategory)
    {
    }

    public function forceDeleted(NewsCategory $newsCategory)
    {
    }
}
