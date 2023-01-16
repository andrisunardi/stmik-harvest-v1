<?php

namespace App\Observers;

use App\Models\AdministrativeCost;
use Illuminate\Support\Facades\Auth;

class AdministrativeCostObserver
{
    public function creating(AdministrativeCost $administrativeCost)
    {
        $administrativeCost->created_by_id = Auth::user()->id;
        $administrativeCost->updated_by_id = Auth::user()->id;
    }

    public function created(AdministrativeCost $administrativeCost)
    {
    }

    public function updating(AdministrativeCost $administrativeCost)
    {
        $administrativeCost->updated_by_id = Auth::user()->id;
    }

    public function updated(AdministrativeCost $administrativeCost)
    {
    }

    public function deleting(AdministrativeCost $administrativeCost)
    {
        $administrativeCost->deleted_by_id = Auth::user()->id;
        $administrativeCost->save();
    }

    public function deleted(AdministrativeCost $administrativeCost)
    {
    }

    public function restoring(AdministrativeCost $administrativeCost)
    {
        $administrativeCost->deleted_by_id = null;
        $administrativeCost->save();
    }

    public function restored(AdministrativeCost $administrativeCost)
    {
    }

    public function forceDeleted(AdministrativeCost $administrativeCost)
    {
    }
}
