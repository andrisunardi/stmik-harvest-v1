<?php

namespace App\Observers;

use App\Models\Platform;
use Illuminate\Support\Facades\Auth;

class PlatformObserver
{
    public function creating(Platform $platform)
    {
        $platform->created_by_id = Auth::user()->id;
        $platform->updated_by_id = Auth::user()->id;
    }

    public function created(Platform $platform)
    {
    }

    public function updating(Platform $platform)
    {
        $platform->updated_by_id = Auth::user()->id;
    }

    public function updated(Platform $platform)
    {
    }

    public function deleting(Platform $platform)
    {
        $platform->deleted_by_id = Auth::user()->id;
        $platform->save();
    }

    public function deleted(Platform $platform)
    {
    }

    public function restoring(Platform $platform)
    {
        $platform->deleted_by_id = null;
        $platform->save();
    }

    public function restored(Platform $platform)
    {
    }

    public function forceDeleted(Platform $platform)
    {
    }
}
