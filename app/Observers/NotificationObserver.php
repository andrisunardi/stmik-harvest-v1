<?php

namespace App\Observers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationObserver
{
    public function creating(Notification $notification)
    {
        $notification->created_by_id = Auth::user()->id;
        $notification->updated_by_id = Auth::user()->id;
    }

    public function created(Notification $notification)
    {
    }

    public function updating(Notification $notification)
    {
        $notification->updated_by_id = Auth::user()->id;
    }

    public function updated(Notification $notification)
    {
    }

    public function deleting(Notification $notification)
    {
        $notification->deleted_by_id = Auth::user()->id;
        $notification->save();
    }

    public function deleted(Notification $notification)
    {
    }

    public function restoring(Notification $notification)
    {
        $notification->deleted_by_id = null;
        $notification->save();
    }

    public function restored(Notification $notification)
    {
    }

    public function forceDeleted(Notification $notification)
    {
    }
}
