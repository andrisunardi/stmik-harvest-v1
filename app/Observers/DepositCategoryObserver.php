<?php

namespace App\Observers;

use App\Models\DepositCategory;
use Illuminate\Support\Facades\Auth;

class DepositCategoryObserver
{
    public function creating(DepositCategory $depositCategory)
    {
        $depositCategory->created_by_id = Auth::user()->id;
        $depositCategory->updated_by_id = Auth::user()->id;
    }

    public function created(DepositCategory $depositCategory)
    {
    }

    public function updating(DepositCategory $depositCategory)
    {
        $depositCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(DepositCategory $depositCategory)
    {
    }

    public function deleting(DepositCategory $depositCategory)
    {
        $depositCategory->deleted_by_id = Auth::user()->id;
        $depositCategory->save();
    }

    public function deleted(DepositCategory $depositCategory)
    {
    }

    public function restoring(DepositCategory $depositCategory)
    {
        $depositCategory->deleted_by_id = null;
        $depositCategory->save();
    }

    public function restored(DepositCategory $depositCategory)
    {
    }

    public function forceDeleted(DepositCategory $depositCategory)
    {
    }
}
