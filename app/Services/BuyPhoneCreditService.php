<?php

namespace App\Services;

use App\Models\BuyPhoneCredit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyPhoneCreditService
{
    public $table = 'buy_phone_credits';

    public function add(array $data = []): BuyPhoneCredit
    {
        $data['code'] = Str::code('BPC', $this->table, now()->format('Y-m-d'), 1);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyPhoneCredit::create($data);
    }

    public function clone(array $data, BuyPhoneCredit $buyPhoneCredit): BuyPhoneCredit
    {
        $data['code'] = Str::code('BPC', $this->table, now()->format('Y-m-d'), 1);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyPhoneCredit::create($data);
    }

    public function edit(BuyPhoneCredit $buyPhoneCredit, $data): BuyPhoneCredit
    {
        $buyPhoneCredit->update($data);
        $buyPhoneCredit->refresh();

        return $buyPhoneCredit;
    }

    public function active(BuyPhoneCredit $buyPhoneCredit): BuyPhoneCredit
    {
        $buyPhoneCredit->is_active = ! $buyPhoneCredit->is_active;
        $buyPhoneCredit->save();
        $buyPhoneCredit->refresh();

        return $buyPhoneCredit;
    }

    public function delete(BuyPhoneCredit $buyPhoneCredit): bool
    {
        return $buyPhoneCredit->delete();
    }

    public function deleteAll(array $buyPhoneCredits = []): bool
    {
        return BuyPhoneCredit::when($buyPhoneCredits, fn ($q) => $q->whereIn('id', $buyPhoneCredits))->delete();
    }

    public function restore(BuyPhoneCredit $buyPhoneCredit): bool
    {
        return $buyPhoneCredit->restore();
    }

    public function restoreAll(array $buyPhoneCredits = []): bool
    {
        return BuyPhoneCredit::when($buyPhoneCredits, fn ($q) => $q->whereIn('id', $buyPhoneCredits))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyPhoneCredit $buyPhoneCredit): bool
    {
        return $buyPhoneCredit->forceDelete();
    }

    public function deletePermanentAll(array $buyPhoneCredits = []): bool
    {
        return BuyPhoneCredit::when($buyPhoneCredits, fn ($q) => $q->whereIn('id', $buyPhoneCredits))->onlyTrashed()->forceDelete();
    }
}
