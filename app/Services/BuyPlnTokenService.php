<?php

namespace App\Services;

use App\Models\BuyPlnToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyPlnTokenService
{
    public $table = 'buy_pln_tokens';

    public function add(array $data = []): BuyPlnToken
    {
        $data['code'] = Str::code('PLNTOKEN', $this->table, now()->format('Y-m-d'), 1);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyPlnToken::create($data);
    }

    public function clone(array $data, BuyPlnToken $buyPlnToken): BuyPlnToken
    {
        $data['code'] = Str::code('PLNTOKEN', $this->table, now()->format('Y-m-d'), 1);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyPlnToken::create($data);
    }

    public function edit(BuyPlnToken $buyPlnToken, $data): BuyPlnToken
    {
        $buyPlnToken->update($data);
        $buyPlnToken->refresh();

        return $buyPlnToken;
    }

    public function active(BuyPlnToken $buyPlnToken): BuyPlnToken
    {
        $buyPlnToken->is_active = ! $buyPlnToken->is_active;
        $buyPlnToken->save();
        $buyPlnToken->refresh();

        return $buyPlnToken;
    }

    public function delete(BuyPlnToken $buyPlnToken): bool
    {
        return $buyPlnToken->delete();
    }

    public function deleteAll(array $buyPlnTokens = []): bool
    {
        return BuyPlnToken::when($buyPlnTokens, fn ($q) => $q->whereIn('id', $buyPlnTokens))->delete();
    }

    public function restore(BuyPlnToken $buyPlnToken): bool
    {
        return $buyPlnToken->restore();
    }

    public function restoreAll(array $buyPlnTokens = []): bool
    {
        return BuyPlnToken::when($buyPlnTokens, fn ($q) => $q->whereIn('id', $buyPlnTokens))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyPlnToken $buyPlnToken): bool
    {
        return $buyPlnToken->forceDelete();
    }

    public function deletePermanentAll(array $buyPlnTokens = []): bool
    {
        return BuyPlnToken::when($buyPlnTokens, fn ($q) => $q->whereIn('id', $buyPlnTokens))->onlyTrashed()->forceDelete();
    }
}
