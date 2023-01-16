<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    public function creating(User $user)
    {
        $user->created_by_id = Auth::user()->id ?? null;
        $user->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(User $user)
    {
    }

    public function updating(User $user)
    {
        $user->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(User $user)
    {
    }

    public function deleting(User $user)
    {
        $user->deleted_by_id = Auth::user()->id ?? null;
        $user->save();
    }

    public function deleted(User $user)
    {
    }

    public function restoring(User $user)
    {
        $user->deleted_by_id = null;
        $user->save();
    }

    public function restored(User $user)
    {
    }

    public function forceDeleted(User $user)
    {
    }
}
