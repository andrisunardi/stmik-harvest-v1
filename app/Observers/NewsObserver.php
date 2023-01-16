<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsObserver
{
    public function creating(News $news)
    {
        $news->created_by_id = Auth::user()->id;
        $news->updated_by_id = Auth::user()->id;
    }

    public function created(News $news)
    {
    }

    public function updating(News $news)
    {
        $news->updated_by_id = Auth::user()->id;
    }

    public function updated(News $news)
    {
    }

    public function deleting(News $news)
    {
        $news->deleted_by_id = Auth::user()->id;
        $news->save();
    }

    public function deleted(News $news)
    {
    }

    public function restoring(News $news)
    {
        $news->deleted_by_id = null;
        $news->save();
    }

    public function restored(News $news)
    {
    }

    public function forceDeleted(News $news)
    {
    }
}
