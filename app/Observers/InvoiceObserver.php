<?php

namespace App\Observers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceObserver
{
    public function creating(Invoice $invoice)
    {
        $invoice->created_by_id = Auth::user()->id;
        $invoice->updated_by_id = Auth::user()->id;
    }

    public function created(Invoice $invoice)
    {
    }

    public function updating(Invoice $invoice)
    {
        $invoice->updated_by_id = Auth::user()->id;
    }

    public function updated(Invoice $invoice)
    {
    }

    public function deleting(Invoice $invoice)
    {
        $invoice->deleted_by_id = Auth::user()->id;
        $invoice->save();
    }

    public function deleted(Invoice $invoice)
    {
    }

    public function restoring(Invoice $invoice)
    {
        $invoice->deleted_by_id = null;
        $invoice->save();
    }

    public function restored(Invoice $invoice)
    {
    }

    public function forceDeleted(Invoice $invoice)
    {
    }
}
