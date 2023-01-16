<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogObserver
{
    public function creating(Blog $blog)
    {
        $blog->created_by_id = Auth::user()->id;
        $blog->updated_by_id = Auth::user()->id;
    }

    public function created(Blog $blog)
    {
    }

    public function updating(Blog $blog)
    {
        $blog->updated_by_id = Auth::user()->id;
    }

    public function updated(Blog $blog)
    {
    }

    public function deleting(Blog $blog)
    {
        $blog->deleted_by_id = Auth::user()->id;
        $blog->save();
    }

    public function deleted(Blog $blog)
    {
    }

    public function restoring(Blog $blog)
    {
        $blog->deleted_by_id = null;
        $blog->save();
    }

    public function restored(Blog $blog)
    {
    }

    public function forceDeleted(Blog $blog)
    {
    }
}
