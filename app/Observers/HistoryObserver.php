<?php

namespace App\Observers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryObserver
{
    public function creating(History $history)
    {
        $history->created_by_id = Auth::user()->id;
        $history->updated_by_id = Auth::user()->id;
    }

    public function created(History $history)
    {
    }

    public function updating(History $history)
    {
        $history->updated_by_id = Auth::user()->id;
    }

    public function updated(History $history)
    {
    }

    public function deleting(History $history)
    {
        $history->deleted_by_id = Auth::user()->id;
        $history->save();
    }

    public function deleted(History $history)
    {
    }

    public function restoring(History $history)
    {
        $history->deleted_by_id = null;
        $history->save();
    }

    public function restored(History $history)
    {
    }

    public function forceDeleted(History $history)
    {
    }
}
