<?php

namespace App\Observers;

use App\Models\EventCategory;
use Illuminate\Support\Facades\Auth;

class EventCategoryObserver
{
    public function creating(EventCategory $eventCategory)
    {
        $eventCategory->created_by_id = Auth::user()->id ?? null;
        $eventCategory->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(EventCategory $eventCategory)
    {
    }

    public function updating(EventCategory $eventCategory)
    {
        $eventCategory->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(EventCategory $eventCategory)
    {
    }

    public function deleting(EventCategory $eventCategory)
    {
        $eventCategory->deleted_by_id = Auth::user()->id ?? null;
        $eventCategory->save();
    }

    public function deleted(EventCategory $eventCategory)
    {
    }

    public function restoring(EventCategory $eventCategory)
    {
        $eventCategory->deleted_by_id = null;
        $eventCategory->save();
    }

    public function restored(EventCategory $eventCategory)
    {
    }

    public function forceDeleted(EventCategory $eventCategory)
    {
    }
}
