<?php

namespace App\Observers;

use App\Models\ProcedureCategory;
use Illuminate\Support\Facades\Auth;

class ProcedureCategoryObserver
{
    public function creating(ProcedureCategory $procedureCategory)
    {
        $procedureCategory->created_by_id = Auth::user()->id;
        $procedureCategory->updated_by_id = Auth::user()->id;
    }

    public function created(ProcedureCategory $procedureCategory)
    {
    }

    public function updating(ProcedureCategory $procedureCategory)
    {
        $procedureCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(ProcedureCategory $procedureCategory)
    {
    }

    public function deleting(ProcedureCategory $procedureCategory)
    {
        $procedureCategory->deleted_by_id = Auth::user()->id;
        $procedureCategory->save();
    }

    public function deleted(ProcedureCategory $procedureCategory)
    {
    }

    public function restoring(ProcedureCategory $procedureCategory)
    {
        $procedureCategory->deleted_by_id = null;
        $procedureCategory->save();
    }

    public function restored(ProcedureCategory $procedureCategory)
    {
    }

    public function forceDeleted(ProcedureCategory $procedureCategory)
    {
    }
}
