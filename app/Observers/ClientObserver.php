<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientObserver
{
    public function creating(Client $client)
    {
        $client->created_by_id = Auth::user()->id;
        $client->updated_by_id = Auth::user()->id;
    }

    public function created(Client $client)
    {
    }

    public function updating(Client $client)
    {
        $client->updated_by_id = Auth::user()->id;
    }

    public function updated(Client $client)
    {
    }

    public function deleting(Client $client)
    {
        $client->deleted_by_id = Auth::user()->id;
        $client->save();
    }

    public function deleted(Client $client)
    {
    }

    public function restoring(Client $client)
    {
        $client->deleted_by_id = null;
        $client->save();
    }

    public function restored(Client $client)
    {
    }

    public function forceDeleted(Client $client)
    {
    }
}
