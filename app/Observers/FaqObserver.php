<?php

namespace App\Observers;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class FaqObserver
{
    public function creating(Faq $faq)
    {
        $faq->created_by_id = Auth::user()->id;
        $faq->updated_by_id = Auth::user()->id;
    }

    public function created(Faq $faq)
    {
    }

    public function updating(Faq $faq)
    {
        $faq->updated_by_id = Auth::user()->id;
    }

    public function updated(Faq $faq)
    {
    }

    public function deleting(Faq $faq)
    {
        $faq->deleted_by_id = Auth::user()->id;
        $faq->save();
    }

    public function deleted(Faq $faq)
    {
    }

    public function restoring(Faq $faq)
    {
        $faq->deleted_by_id = null;
        $faq->save();
    }

    public function restored(Faq $faq)
    {
    }

    public function forceDeleted(Faq $faq)
    {
    }
}
