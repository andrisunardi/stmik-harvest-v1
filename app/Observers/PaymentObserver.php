<?php

namespace App\Observers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentObserver
{
    public function creating(Payment $payment)
    {
        $payment->created_by_id = Auth::user()->id;
        $payment->updated_by_id = Auth::user()->id;
    }

    public function created(Payment $payment)
    {
    }

    public function updating(Payment $payment)
    {
        $payment->updated_by_id = Auth::user()->id;
    }

    public function updated(Payment $payment)
    {
    }

    public function deleting(Payment $payment)
    {
        $payment->deleted_by_id = Auth::user()->id;
        $payment->save();
    }

    public function deleted(Payment $payment)
    {
    }

    public function restoring(Payment $payment)
    {
        $payment->deleted_by_id = null;
        $payment->save();
    }

    public function restored(Payment $payment)
    {
    }

    public function forceDeleted(Payment $payment)
    {
    }
}
