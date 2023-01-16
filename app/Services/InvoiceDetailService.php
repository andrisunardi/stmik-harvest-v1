<?php

namespace App\Services;

use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;

class InvoiceDetailService
{
    public $table = 'invoice_details';

    public function add(array $data = []): InvoiceDetail
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return InvoiceDetail::create($data);
    }

    public function clone(array $data, InvoiceDetail $invoiceDetail): InvoiceDetail
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return InvoiceDetail::create($data);
    }

    public function edit(InvoiceDetail $invoiceDetail, $data): InvoiceDetail
    {
        $invoiceDetail->update($data);
        $invoiceDetail->refresh();

        return $invoiceDetail;
    }

    public function active(InvoiceDetail $invoiceDetail): InvoiceDetail
    {
        $invoiceDetail->is_active = ! $invoiceDetail->is_active;
        $invoiceDetail->save();
        $invoiceDetail->refresh();

        return $invoiceDetail;
    }

    public function delete(InvoiceDetail $invoiceDetail): bool
    {
        return $invoiceDetail->delete();
    }

    public function deleteAll(array $invoiceDetails = []): bool
    {
        return InvoiceDetail::when($invoiceDetails, fn ($q) => $q->whereIn('id', $invoiceDetails))->delete();
    }

    public function restore(InvoiceDetail $invoiceDetail): bool
    {
        return $invoiceDetail->restore();
    }

    public function restoreAll(array $invoiceDetails = []): bool
    {
        return InvoiceDetail::when($invoiceDetails, fn ($q) => $q->whereIn('id', $invoiceDetails))->onlyTrashed()->restore();
    }

    public function deletePermanent(InvoiceDetail $invoiceDetail): bool
    {
        return $invoiceDetail->forceDelete();
    }

    public function deletePermanentAll(array $invoiceDetails = []): bool
    {
        return InvoiceDetail::when($invoiceDetails, fn ($q) => $q->whereIn('id', $invoiceDetails))->onlyTrashed()->forceDelete();
    }
}
