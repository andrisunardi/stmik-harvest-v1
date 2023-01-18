<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventObserver
{
    public function creating(Event $event)
    {
        $event->created_by_id = Auth::user()->id ?? null;
        $event->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Event $event)
    {
    }

    public function updating(Event $event)
    {
        $event->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Event $event)
    {
    }

    public function deleting(Event $event)
    {
        $event->deleted_by_id = Auth::user()->id ?? null;
        $event->save();
    }

    public function deleted(Event $event)
    {
    }

    public function restoring(Event $event)
    {
        $event->deleted_by_id = null;
        $event->save();
    }

    public function restored(Event $event)
    {
    }

    public function forceDeleted(Event $event)
    {
    }
}
