<?php

namespace App\Observers;

use App\Models\Endorse;
use Illuminate\Support\Facades\Auth;

class EndorseObserver
{
    public function creating(Endorse $endorse)
    {
        $endorse->created_by_id = Auth::user()->id;
        $endorse->updated_by_id = Auth::user()->id;
    }

    public function created(Endorse $endorse)
    {
    }

    public function updating(Endorse $endorse)
    {
        $endorse->updated_by_id = Auth::user()->id;
    }

    public function updated(Endorse $endorse)
    {
    }

    public function deleting(Endorse $endorse)
    {
        $endorse->deleted_by_id = Auth::user()->id;
        $endorse->save();
    }

    public function deleted(Endorse $endorse)
    {
    }

    public function restoring(Endorse $endorse)
    {
        $endorse->deleted_by_id = null;
        $endorse->save();
    }

    public function restored(Endorse $endorse)
    {
    }

    public function forceDeleted(Endorse $endorse)
    {
    }
}
