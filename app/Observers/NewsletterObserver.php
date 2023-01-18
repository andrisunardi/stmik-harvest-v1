<?php

namespace App\Observers;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

class NewsletterObserver
{
    public function creating(Newsletter $newsletter)
    {
        $newsletter->created_by_id = Auth::user()->id ?? null;
        $newsletter->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Newsletter $newsletter)
    {
    }

    public function updating(Newsletter $newsletter)
    {
        $newsletter->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Newsletter $newsletter)
    {
    }

    public function deleting(Newsletter $newsletter)
    {
        $newsletter->deleted_by_id = Auth::user()->id ?? null;
        $newsletter->save();
    }

    public function deleted(Newsletter $newsletter)
    {
    }

    public function restoring(Newsletter $newsletter)
    {
        $newsletter->deleted_by_id = null;
        $newsletter->save();
    }

    public function restored(Newsletter $newsletter)
    {
    }

    public function forceDeleted(Newsletter $newsletter)
    {
    }
}
