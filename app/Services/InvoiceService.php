<?php

namespace App\Services;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvoiceService
{
    public $table = 'invoices';

    public function add(array $data = []): Invoice
    {
        $data['code'] = Str::code('INVOICE', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Invoice::create($data);
    }

    public function clone(array $data, Invoice $invoice): Invoice
    {
        $data['code'] = Str::code('INVOICE', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Invoice::create($data);
    }

    public function edit(Invoice $invoice, $data): Invoice
    {
        $invoice->update($data);
        $invoice->refresh();

        return $invoice;
    }

    public function active(Invoice $invoice): Invoice
    {
        $invoice->is_active = ! $invoice->is_active;
        $invoice->save();
        $invoice->refresh();

        return $invoice;
    }

    public function delete(Invoice $invoice): bool
    {
        return $invoice->delete();
    }

    public function deleteAll(array $invoices = []): bool
    {
        return Invoice::when($invoices, fn ($q) => $q->whereIn('id', $invoices))->delete();
    }

    public function restore(Invoice $invoice): bool
    {
        return $invoice->restore();
    }

    public function restoreAll(array $invoices = []): bool
    {
        return Invoice::when($invoices, fn ($q) => $q->whereIn('id', $invoices))->onlyTrashed()->restore();
    }

    public function deletePermanent(Invoice $invoice): bool
    {
        return $invoice->forceDelete();
    }

    public function deletePermanentAll(array $invoices = []): bool
    {
        return Invoice::when($invoices, fn ($q) => $q->whereIn('id', $invoices))->onlyTrashed()->forceDelete();
    }
}
