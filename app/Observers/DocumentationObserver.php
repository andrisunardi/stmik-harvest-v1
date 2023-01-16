<?php

namespace App\Observers;

use App\Models\Documentation;
use Illuminate\Support\Facades\Auth;

class DocumentationObserver
{
    public function creating(Documentation $documentation)
    {
        $documentation->created_by_id = Auth::user()->id;
        $documentation->updated_by_id = Auth::user()->id;
    }

    public function created(Documentation $documentation)
    {
    }

    public function updating(Documentation $documentation)
    {
        $documentation->updated_by_id = Auth::user()->id;
    }

    public function updated(Documentation $documentation)
    {
    }

    public function deleting(Documentation $documentation)
    {
        $documentation->deleted_by_id = Auth::user()->id;
        $documentation->save();
    }

    public function deleted(Documentation $documentation)
    {
    }

    public function restoring(Documentation $documentation)
    {
        $documentation->deleted_by_id = null;
        $documentation->save();
    }

    public function restored(Documentation $documentation)
    {
    }

    public function forceDeleted(Documentation $documentation)
    {
    }
}
