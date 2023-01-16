<?php

namespace App\Observers;

use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;

class InvoiceDetailObserver
{
    public function creating(InvoiceDetail $invoiceDetail)
    {
        $invoiceDetail->created_by_id = Auth::user()->id;
        $invoiceDetail->updated_by_id = Auth::user()->id;
    }

    public function created(InvoiceDetail $invoiceDetail)
    {
    }

    public function updating(InvoiceDetail $invoiceDetail)
    {
        $invoiceDetail->updated_by_id = Auth::user()->id;
    }

    public function updated(InvoiceDetail $invoiceDetail)
    {
    }

    public function deleting(InvoiceDetail $invoiceDetail)
    {
        $invoiceDetail->deleted_by_id = Auth::user()->id;
        $invoiceDetail->save();
    }

    public function deleted(InvoiceDetail $invoiceDetail)
    {
    }

    public function restoring(InvoiceDetail $invoiceDetail)
    {
        $invoiceDetail->deleted_by_id = null;
        $invoiceDetail->save();
    }

    public function restored(InvoiceDetail $invoiceDetail)
    {
    }

    public function forceDeleted(InvoiceDetail $invoiceDetail)
    {
    }
}
