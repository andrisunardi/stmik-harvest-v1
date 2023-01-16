<?php

namespace App\Observers;

use App\Models\BankBca;
use Illuminate\Support\Facades\Auth;

class BankBcaObserver
{
    public function creating(BankBca $bankBca)
    {
        $bankBca->created_by_id = Auth::user()->id;
        $bankBca->updated_by_id = Auth::user()->id;
    }

    public function created(BankBca $bankBca)
    {
    }

    public function updating(BankBca $bankBca)
    {
        $bankBca->updated_by_id = Auth::user()->id;
    }

    public function updated(BankBca $bankBca)
    {
    }

    public function deleting(BankBca $bankBca)
    {
        $bankBca->deleted_by_id = Auth::user()->id;
        $bankBca->save();
    }

    public function deleted(BankBca $bankBca)
    {
    }

    public function restoring(BankBca $bankBca)
    {
        $bankBca->deleted_by_id = null;
        $bankBca->save();
    }

    public function restored(BankBca $bankBca)
    {
    }

    public function forceDeleted(BankBca $bankBca)
    {
    }
}
