<?php

namespace App\Observers;

use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class ForumObserver
{
    public function creating(Forum $forum)
    {
        $forum->created_by_id = Auth::user()->id;
        $forum->updated_by_id = Auth::user()->id;
    }

    public function created(Forum $forum)
    {
    }

    public function updating(Forum $forum)
    {
        $forum->updated_by_id = Auth::user()->id;
    }

    public function updated(Forum $forum)
    {
    }

    public function deleting(Forum $forum)
    {
        $forum->deleted_by_id = Auth::user()->id;
        $forum->save();
    }

    public function deleted(Forum $forum)
    {
    }

    public function restoring(Forum $forum)
    {
        $forum->deleted_by_id = null;
        $forum->save();
    }

    public function restored(Forum $forum)
    {
    }

    public function forceDeleted(Forum $forum)
    {
    }
}
