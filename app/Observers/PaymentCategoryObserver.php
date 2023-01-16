<?php

namespace App\Observers;

use App\Models\PaymentCategory;
use Illuminate\Support\Facades\Auth;

class PaymentCategoryObserver
{
    public function creating(PaymentCategory $paymentCategory)
    {
        $paymentCategory->created_by_id = Auth::user()->id;
        $paymentCategory->updated_by_id = Auth::user()->id;
    }

    public function created(PaymentCategory $paymentCategory)
    {
    }

    public function updating(PaymentCategory $paymentCategory)
    {
        $paymentCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(PaymentCategory $paymentCategory)
    {
    }

    public function deleting(PaymentCategory $paymentCategory)
    {
        $paymentCategory->deleted_by_id = Auth::user()->id;
        $paymentCategory->save();
    }

    public function deleted(PaymentCategory $paymentCategory)
    {
    }

    public function restoring(PaymentCategory $paymentCategory)
    {
        $paymentCategory->deleted_by_id = null;
        $paymentCategory->save();
    }

    public function restored(PaymentCategory $paymentCategory)
    {
    }

    public function forceDeleted(PaymentCategory $paymentCategory)
    {
    }
}
