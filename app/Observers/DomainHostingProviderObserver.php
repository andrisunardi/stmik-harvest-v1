<?php

namespace App\Observers;

use App\Models\DomainHostingProvider;
use Illuminate\Support\Facades\Auth;

class DomainHostingProviderObserver
{
    public function creating(DomainHostingProvider $domainHostingProvider)
    {
        $domainHostingProvider->created_by_id = Auth::user()->id;
        $domainHostingProvider->updated_by_id = Auth::user()->id;
    }

    public function created(DomainHostingProvider $domainHostingProvider)
    {
    }

    public function updating(DomainHostingProvider $domainHostingProvider)
    {
        $domainHostingProvider->updated_by_id = Auth::user()->id;
    }

    public function updated(DomainHostingProvider $domainHostingProvider)
    {
    }

    public function deleting(DomainHostingProvider $domainHostingProvider)
    {
        $domainHostingProvider->deleted_by_id = Auth::user()->id;
        $domainHostingProvider->save();
    }

    public function deleted(DomainHostingProvider $domainHostingProvider)
    {
    }

    public function restoring(DomainHostingProvider $domainHostingProvider)
    {
        $domainHostingProvider->deleted_by_id = null;
        $domainHostingProvider->save();
    }

    public function restored(DomainHostingProvider $domainHostingProvider)
    {
    }

    public function forceDeleted(DomainHostingProvider $domainHostingProvider)
    {
    }
}
