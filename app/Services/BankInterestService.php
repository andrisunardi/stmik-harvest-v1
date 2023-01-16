<?php

namespace App\Services;

use App\Models\BankInterest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BankInterestService
{
    public $table = 'bank_interests';

    public function add(array $data = []): BankInterest
    {
        $data['code'] = Str::code('BNKINT', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BankInterest::create($data);
    }

    public function clone(array $data, BankInterest $bankInterest): BankInterest
    {
        $data['code'] = Str::code('BNKINT', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BankInterest::create($data);
    }

    public function edit(BankInterest $bankInterest, $data): BankInterest
    {
        $bankInterest->update($data);
        $bankInterest->refresh();

        return $bankInterest;
    }

    public function active(BankInterest $bankInterest): BankInterest
    {
        $bankInterest->is_active = ! $bankInterest->is_active;
        $bankInterest->save();
        $bankInterest->refresh();

        return $bankInterest;
    }

    public function delete(BankInterest $bankInterest): bool
    {
        return $bankInterest->delete();
    }

    public function deleteAll(array $bankInterests = []): bool
    {
        return BankInterest::when($bankInterests, fn ($q) => $q->whereIn('id', $bankInterests))->delete();
    }

    public function restore(BankInterest $bankInterest): bool
    {
        return $bankInterest->restore();
    }

    public function restoreAll(array $bankInterests = []): bool
    {
        return BankInterest::when($bankInterests, fn ($q) => $q->whereIn('id', $bankInterests))->onlyTrashed()->restore();
    }

    public function deletePermanent(BankInterest $bankInterest): bool
    {
        return $bankInterest->forceDelete();
    }

    public function deletePermanentAll(array $bankInterests = []): bool
    {
        return BankInterest::when($bankInterests, fn ($q) => $q->whereIn('id', $bankInterests))->onlyTrashed()->forceDelete();
    }
}
