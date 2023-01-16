<?php

namespace App\Services;

use App\Models\BuyEndorse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyEndorseService
{
    public $table = 'buy_endorses';

    public function add(array $data = []): BuyEndorse
    {
        $data['code'] = Str::code('ENDORSE', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyEndorse::create($data);
    }

    public function clone(array $data, BuyEndorse $buyEndorse): BuyEndorse
    {
        $data['code'] = Str::code('ENDORSE', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyEndorse::create($data);
    }

    public function edit(BuyEndorse $buyEndorse, $data): BuyEndorse
    {
        $buyEndorse->update($data);
        $buyEndorse->refresh();

        return $buyEndorse;
    }

    public function active(BuyEndorse $buyEndorse): BuyEndorse
    {
        $buyEndorse->is_active = ! $buyEndorse->is_active;
        $buyEndorse->save();
        $buyEndorse->refresh();

        return $buyEndorse;
    }

    public function delete(BuyEndorse $buyEndorse): bool
    {
        return $buyEndorse->delete();
    }

    public function deleteAll(array $buyEndorses = []): bool
    {
        return BuyEndorse::when($buyEndorses, fn ($q) => $q->whereIn('id', $buyEndorses))->delete();
    }

    public function restore(BuyEndorse $buyEndorse): bool
    {
        return $buyEndorse->restore();
    }

    public function restoreAll(array $buyEndorses = []): bool
    {
        return BuyEndorse::when($buyEndorses, fn ($q) => $q->whereIn('id', $buyEndorses))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyEndorse $buyEndorse): bool
    {
        return $buyEndorse->forceDelete();
    }

    public function deletePermanentAll(array $buyEndorses = []): bool
    {
        return BuyEndorse::when($buyEndorses, fn ($q) => $q->whereIn('id', $buyEndorses))->onlyTrashed()->forceDelete();
    }
}
