<?php

namespace App\Observers;

use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;

class WithdrawObserver
{
    public function creating(Withdraw $withdraw)
    {
        $withdraw->created_by_id = Auth::user()->id;
        $withdraw->updated_by_id = Auth::user()->id;
    }

    public function created(Withdraw $withdraw)
    {
    }

    public function updating(Withdraw $withdraw)
    {
        $withdraw->updated_by_id = Auth::user()->id;
    }

    public function updated(Withdraw $withdraw)
    {
    }

    public function deleting(Withdraw $withdraw)
    {
        $withdraw->deleted_by_id = Auth::user()->id;
        $withdraw->save();
    }

    public function deleted(Withdraw $withdraw)
    {
    }

    public function restoring(Withdraw $withdraw)
    {
        $withdraw->deleted_by_id = null;
        $withdraw->save();
    }

    public function restored(Withdraw $withdraw)
    {
    }

    public function forceDeleted(Withdraw $withdraw)
    {
    }
}
