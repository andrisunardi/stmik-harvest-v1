<?php

namespace App\Observers;

use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class DepositObserver
{
    public function creating(Deposit $deposit)
    {
        $deposit->created_by_id = Auth::user()->id;
        $deposit->updated_by_id = Auth::user()->id;
    }

    public function created(Deposit $deposit)
    {
    }

    public function updating(Deposit $deposit)
    {
        $deposit->updated_by_id = Auth::user()->id;
    }

    public function updated(Deposit $deposit)
    {
    }

    public function deleting(Deposit $deposit)
    {
        $deposit->deleted_by_id = Auth::user()->id;
        $deposit->save();
    }

    public function deleted(Deposit $deposit)
    {
    }

    public function restoring(Deposit $deposit)
    {
        $deposit->deleted_by_id = null;
        $deposit->save();
    }

    public function restored(Deposit $deposit)
    {
    }

    public function forceDeleted(Deposit $deposit)
    {
    }
}
