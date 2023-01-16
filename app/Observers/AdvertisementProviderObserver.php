<?php

namespace App\Observers;

use App\Models\AdvertisementProvider;
use Illuminate\Support\Facades\Auth;

class AdvertisementProviderObserver
{
    public function creating(AdvertisementProvider $advertisementProvider)
    {
        $advertisementProvider->created_by_id = Auth::user()->id;
        $advertisementProvider->updated_by_id = Auth::user()->id;
    }

    public function created(AdvertisementProvider $advertisementProvider)
    {
    }

    public function updating(AdvertisementProvider $advertisementProvider)
    {
        $advertisementProvider->updated_by_id = Auth::user()->id;
    }

    public function updated(AdvertisementProvider $advertisementProvider)
    {
    }

    public function deleting(AdvertisementProvider $advertisementProvider)
    {
        $advertisementProvider->deleted_by_id = Auth::user()->id;
        $advertisementProvider->save();
    }

    public function deleted(AdvertisementProvider $advertisementProvider)
    {
    }

    public function restoring(AdvertisementProvider $advertisementProvider)
    {
        $advertisementProvider->deleted_by_id = null;
        $advertisementProvider->save();
    }

    public function restored(AdvertisementProvider $advertisementProvider)
    {
    }

    public function forceDeleted(AdvertisementProvider $advertisementProvider)
    {
    }
}
