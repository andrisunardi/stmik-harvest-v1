<?php

namespace App\Observers;

use App\Models\Bank;
use Illuminate\Support\Facades\Auth;

class BankObserver
{
    public function creating(Bank $bank)
    {
        $bank->created_by_id = Auth::user()->id;
        $bank->updated_by_id = Auth::user()->id;
    }

    public function created(Bank $bank)
    {
    }

    public function updating(Bank $bank)
    {
        $bank->updated_by_id = Auth::user()->id;
    }

    public function updated(Bank $bank)
    {
    }

    public function deleting(Bank $bank)
    {
        $bank->deleted_by_id = Auth::user()->id;
        $bank->save();
    }

    public function deleted(Bank $bank)
    {
    }

    public function restoring(Bank $bank)
    {
        $bank->deleted_by_id = null;
        $bank->save();
    }

    public function restored(Bank $bank)
    {
    }

    public function forceDeleted(Bank $bank)
    {
    }
}
