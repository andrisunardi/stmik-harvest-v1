<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->created_by_id = Auth::user()->id;
        $service->updated_by_id = Auth::user()->id;
    }

    public function created(Service $service)
    {
    }

    public function updating(Service $service)
    {
        $service->updated_by_id = Auth::user()->id;
    }

    public function updated(Service $service)
    {
    }

    public function deleting(Service $service)
    {
        $service->deleted_by_id = Auth::user()->id;
        $service->save();
    }

    public function deleted(Service $service)
    {
    }

    public function restoring(Service $service)
    {
        $service->deleted_by_id = null;
        $service->save();
    }

    public function restored(Service $service)
    {
    }

    public function forceDeleted(Service $service)
    {
    }
}
