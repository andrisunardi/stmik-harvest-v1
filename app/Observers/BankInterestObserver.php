<?php

namespace App\Observers;

use App\Models\BankInterest;
use Illuminate\Support\Facades\Auth;

class BankInterestObserver
{
    public function creating(BankInterest $bankInterest)
    {
        $bankInterest->created_by_id = Auth::user()->id;
        $bankInterest->updated_by_id = Auth::user()->id;
    }

    public function created(BankInterest $bankInterest)
    {
    }

    public function updating(BankInterest $bankInterest)
    {
        $bankInterest->updated_by_id = Auth::user()->id;
    }

    public function updated(BankInterest $bankInterest)
    {
    }

    public function deleting(BankInterest $bankInterest)
    {
        $bankInterest->deleted_by_id = Auth::user()->id;
        $bankInterest->save();
    }

    public function deleted(BankInterest $bankInterest)
    {
    }

    public function restoring(BankInterest $bankInterest)
    {
        $bankInterest->deleted_by_id = null;
        $bankInterest->save();
    }

    public function restored(BankInterest $bankInterest)
    {
    }

    public function forceDeleted(BankInterest $bankInterest)
    {
    }
}
