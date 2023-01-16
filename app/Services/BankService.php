<?php

namespace App\Services;

use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class BankService
{
    public $table = 'banks';

    public function add(array $data = []): Bank
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Bank::create($data);
    }

    public function clone(array $data, Bank $bank): Bank
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Bank::create($data);
    }

    public function edit(Bank $bank, $data): Bank
    {
        $bank->update($data);
        $bank->refresh();

        return $bank;
    }

    public function active(Bank $bank): Bank
    {
        $bank->is_active = ! $bank->is_active;
        $bank->save();
        $bank->refresh();

        return $bank;
    }

    public function delete(Bank $bank): bool
    {
        return $bank->delete();
    }

    public function deleteAll(array $banks = []): bool
    {
        return Bank::when($banks, fn ($q) => $q->whereIn('id', $banks))->delete();
    }

    public function restore(Bank $bank): bool
    {
        return $bank->restore();
    }

    public function restoreAll(array $banks = []): bool
    {
        return Bank::when($banks, fn ($q) => $q->whereIn('id', $banks))->onlyTrashed()->restore();
    }

    public function deletePermanent(Bank $bank): bool
    {
        return $bank->forceDelete();
    }

    public function deletePermanentAll(array $banks = []): bool
    {
        return Bank::when($banks, fn ($q) => $q->whereIn('id', $banks))->onlyTrashed()->forceDelete();
    }
}
