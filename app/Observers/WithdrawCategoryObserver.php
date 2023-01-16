<?php

namespace App\Observers;

use App\Models\WithdrawCategory;
use Illuminate\Support\Facades\Auth;

class WithdrawCategoryObserver
{
    public function creating(WithdrawCategory $withdrawCategory)
    {
        $withdrawCategory->created_by_id = Auth::user()->id;
        $withdrawCategory->updated_by_id = Auth::user()->id;
    }

    public function created(WithdrawCategory $withdrawCategory)
    {
    }

    public function updating(WithdrawCategory $withdrawCategory)
    {
        $withdrawCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(WithdrawCategory $withdrawCategory)
    {
    }

    public function deleting(WithdrawCategory $withdrawCategory)
    {
        $withdrawCategory->deleted_by_id = Auth::user()->id;
        $withdrawCategory->save();
    }

    public function deleted(WithdrawCategory $withdrawCategory)
    {
    }

    public function restoring(WithdrawCategory $withdrawCategory)
    {
        $withdrawCategory->deleted_by_id = null;
        $withdrawCategory->save();
    }

    public function restored(WithdrawCategory $withdrawCategory)
    {
    }

    public function forceDeleted(WithdrawCategory $withdrawCategory)
    {
    }
}
