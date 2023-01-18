<?php

namespace App\Observers;

use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class BannerObserver
{
    public function creating(Banner $banner)
    {
        $banner->created_by_id = Auth::user()->id ?? null;
        $banner->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Banner $banner)
    {
    }

    public function updating(Banner $banner)
    {
        $banner->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Banner $banner)
    {
    }

    public function deleting(Banner $banner)
    {
        $banner->deleted_by_id = Auth::user()->id ?? null;
        $banner->save();
    }

    public function deleted(Banner $banner)
    {
    }

    public function restoring(Banner $banner)
    {
        $banner->deleted_by_id = null;
        $banner->save();
    }

    public function restored(Banner $banner)
    {
    }

    public function forceDeleted(Banner $banner)
    {
    }
}
