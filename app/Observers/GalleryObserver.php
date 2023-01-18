<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GalleryObserver
{
    public function creating(Gallery $gallery)
    {
        $gallery->created_by_id = Auth::user()->id ?? null;
        $gallery->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Gallery $gallery)
    {
    }

    public function updating(Gallery $gallery)
    {
        $gallery->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Gallery $gallery)
    {
    }

    public function deleting(Gallery $gallery)
    {
        $gallery->deleted_by_id = Auth::user()->id ?? null;
        $gallery->save();
    }

    public function deleted(Gallery $gallery)
    {
    }

    public function restoring(Gallery $gallery)
    {
        $gallery->deleted_by_id = null;
        $gallery->save();
    }

    public function restored(Gallery $gallery)
    {
    }

    public function forceDeleted(Gallery $gallery)
    {
    }
}
