<?php

namespace App\Services;

use App\Models\BuyInternet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyInternetService
{
    public $table = 'buy_internets';

    public function add(array $data = []): BuyInternet
    {
        $data['code'] = Str::code('BUYINTERNET', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyInternet::create($data);
    }

    public function clone(array $data, BuyInternet $buyInternet): BuyInternet
    {
        $data['code'] = Str::code('BUYINTERNET', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyInternet::create($data);
    }

    public function edit(BuyInternet $buyInternet, $data): BuyInternet
    {
        $buyInternet->update($data);
        $buyInternet->refresh();

        return $buyInternet;
    }

    public function active(BuyInternet $buyInternet): BuyInternet
    {
        $buyInternet->is_active = ! $buyInternet->is_active;
        $buyInternet->save();
        $buyInternet->refresh();

        return $buyInternet;
    }

    public function delete(BuyInternet $buyInternet): bool
    {
        return $buyInternet->delete();
    }

    public function deleteAll(array $buyInternets = []): bool
    {
        return BuyInternet::when($buyInternets, fn ($q) => $q->whereIn('id', $buyInternets))->delete();
    }

    public function restore(BuyInternet $buyInternet): bool
    {
        return $buyInternet->restore();
    }

    public function restoreAll(array $buyInternets = []): bool
    {
        return BuyInternet::when($buyInternets, fn ($q) => $q->whereIn('id', $buyInternets))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyInternet $buyInternet): bool
    {
        return $buyInternet->forceDelete();
    }

    public function deletePermanentAll(array $buyInternets = []): bool
    {
        return BuyInternet::when($buyInternets, fn ($q) => $q->whereIn('id', $buyInternets))->onlyTrashed()->forceDelete();
    }
}
