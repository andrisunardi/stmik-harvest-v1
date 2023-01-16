<?php

namespace App\Observers;

use App\Models\Career;
use Illuminate\Support\Facades\Auth;

class CareerObserver
{
    public function creating(Career $career)
    {
        $career->created_by_id = Auth::user()->id;
        $career->updated_by_id = Auth::user()->id;
    }

    public function created(Career $career)
    {
    }

    public function updating(Career $career)
    {
        $career->updated_by_id = Auth::user()->id;
    }

    public function updated(Career $career)
    {
    }

    public function deleting(Career $career)
    {
        $career->deleted_by_id = Auth::user()->id;
        $career->save();
    }

    public function deleted(Career $career)
    {
    }

    public function restoring(Career $career)
    {
        $career->deleted_by_id = null;
        $career->save();
    }

    public function restored(Career $career)
    {
    }

    public function forceDeleted(Career $career)
    {
    }
}
