<?php

namespace App\Observers;

use App\Models\Value;
use Illuminate\Support\Facades\Auth;

class ValueObserver
{
    public function creating(Value $value)
    {
        $value->created_by_id = Auth::user()->id ?? null;
        $value->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Value $value)
    {
    }

    public function updating(Value $value)
    {
        $value->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Value $value)
    {
    }

    public function deleting(Value $value)
    {
        $value->deleted_by_id = Auth::user()->id ?? null;
        $value->save();
    }

    public function deleted(Value $value)
    {
    }

    public function restoring(Value $value)
    {
        $value->deleted_by_id = null;
        $value->save();
    }

    public function restored(Value $value)
    {
    }

    public function forceDeleted(Value $value)
    {
    }
}
