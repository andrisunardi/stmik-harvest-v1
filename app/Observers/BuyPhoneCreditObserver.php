<?php

namespace App\Observers;

use App\Models\BuyPhoneCredit;
use Illuminate\Support\Facades\Auth;

class BuyPhoneCreditObserver
{
    public function creating(BuyPhoneCredit $buyPhoneCredit)
    {
        $buyPhoneCredit->created_by_id = Auth::user()->id;
        $buyPhoneCredit->updated_by_id = Auth::user()->id;
    }

    public function created(BuyPhoneCredit $buyPhoneCredit)
    {
    }

    public function updating(BuyPhoneCredit $buyPhoneCredit)
    {
        $buyPhoneCredit->updated_by_id = Auth::user()->id;
    }

    public function updated(BuyPhoneCredit $buyPhoneCredit)
    {
    }

    public function deleting(BuyPhoneCredit $buyPhoneCredit)
    {
        $buyPhoneCredit->deleted_by_id = Auth::user()->id;
        $buyPhoneCredit->save();
    }

    public function deleted(BuyPhoneCredit $buyPhoneCredit)
    {
    }

    public function restoring(BuyPhoneCredit $buyPhoneCredit)
    {
        $buyPhoneCredit->deleted_by_id = null;
        $buyPhoneCredit->save();
    }

    public function restored(BuyPhoneCredit $buyPhoneCredit)
    {
    }

    public function forceDeleted(BuyPhoneCredit $buyPhoneCredit)
    {
    }
}
