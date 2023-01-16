<?php

namespace App\Observers;

use App\Models\ForumCategory;
use Illuminate\Support\Facades\Auth;

class ForumCategoryObserver
{
    public function creating(ForumCategory $forumCategory)
    {
        $forumCategory->created_by_id = Auth::user()->id;
        $forumCategory->updated_by_id = Auth::user()->id;
    }

    public function created(ForumCategory $forumCategory)
    {
    }

    public function updating(ForumCategory $forumCategory)
    {
        $forumCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(ForumCategory $forumCategory)
    {
    }

    public function deleting(ForumCategory $forumCategory)
    {
        $forumCategory->deleted_by_id = Auth::user()->id;
        $forumCategory->save();
    }

    public function deleted(ForumCategory $forumCategory)
    {
    }

    public function restoring(ForumCategory $forumCategory)
    {
        $forumCategory->deleted_by_id = null;
        $forumCategory->save();
    }

    public function restored(ForumCategory $forumCategory)
    {
    }

    public function forceDeleted(ForumCategory $forumCategory)
    {
    }
}
