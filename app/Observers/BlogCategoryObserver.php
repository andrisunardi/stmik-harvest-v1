<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;

class BlogCategoryObserver
{
    public function creating(BlogCategory $blogCategory)
    {
        $blogCategory->created_by_id = Auth::user()->id ?? null;
        $blogCategory->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(BlogCategory $blogCategory)
    {
    }

    public function updating(BlogCategory $blogCategory)
    {
        $blogCategory->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(BlogCategory $blogCategory)
    {
    }

    public function deleting(BlogCategory $blogCategory)
    {
        $blogCategory->deleted_by_id = Auth::user()->id ?? null;
        $blogCategory->save();
    }

    public function deleted(BlogCategory $blogCategory)
    {
    }

    public function restoring(BlogCategory $blogCategory)
    {
        $blogCategory->deleted_by_id = null;
        $blogCategory->save();
    }

    public function restored(BlogCategory $blogCategory)
    {
    }

    public function forceDeleted(BlogCategory $blogCategory)
    {
    }
}
