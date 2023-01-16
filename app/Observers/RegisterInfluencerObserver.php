<?php

namespace App\Observers;

use App\Models\RegisterInfluencer;
use Illuminate\Support\Facades\Auth;

class RegisterInfluencerObserver
{
    public function creating(RegisterInfluencer $registerInfluencer)
    {
        $registerInfluencer->created_by_id = Auth::user()->id;
        $registerInfluencer->updated_by_id = Auth::user()->id;
    }

    public function created(RegisterInfluencer $registerInfluencer)
    {
    }

    public function updating(RegisterInfluencer $registerInfluencer)
    {
        $registerInfluencer->updated_by_id = Auth::user()->id;
    }

    public function updated(RegisterInfluencer $registerInfluencer)
    {
    }

    public function deleting(RegisterInfluencer $registerInfluencer)
    {
        $registerInfluencer->deleted_by_id = Auth::user()->id;
        $registerInfluencer->save();
    }

    public function deleted(RegisterInfluencer $registerInfluencer)
    {
    }

    public function restoring(RegisterInfluencer $registerInfluencer)
    {
        $registerInfluencer->deleted_by_id = null;
        $registerInfluencer->save();
    }

    public function restored(RegisterInfluencer $registerInfluencer)
    {
    }

    public function forceDeleted(RegisterInfluencer $registerInfluencer)
    {
    }
}
