<?php

namespace App\Observers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactObserver
{
    public function creating(Contact $contact)
    {
        $contact->created_by_id = Auth::user()->id;
        $contact->updated_by_id = Auth::user()->id;
    }

    public function created(Contact $contact)
    {
    }

    public function updating(Contact $contact)
    {
        $contact->updated_by_id = Auth::user()->id;
    }

    public function updated(Contact $contact)
    {
    }

    public function deleting(Contact $contact)
    {
        $contact->deleted_by_id = Auth::user()->id;
        $contact->save();
    }

    public function deleted(Contact $contact)
    {
    }

    public function restoring(Contact $contact)
    {
        $contact->deleted_by_id = null;
        $contact->save();
    }

    public function restored(Contact $contact)
    {
    }

    public function forceDeleted(Contact $contact)
    {
    }
}
