<?php

namespace App\Services;

use App\Models\BuyDomainHosting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyDomainHostingService
{
    public $table = 'buy_domain_hostings';

    public function add(array $data = []): BuyDomainHosting
    {
        $data['code'] = Str::code('BUYDOHO', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyDomainHosting::create($data);
    }

    public function clone(array $data, BuyDomainHosting $buyDomainHosting): BuyDomainHosting
    {
        $data['code'] = Str::code('BUYDOHO', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyDomainHosting::create($data);
    }

    public function edit(BuyDomainHosting $buyDomainHosting, $data): BuyDomainHosting
    {
        $buyDomainHosting->update($data);
        $buyDomainHosting->refresh();

        return $buyDomainHosting;
    }

    public function active(BuyDomainHosting $buyDomainHosting): BuyDomainHosting
    {
        $buyDomainHosting->is_active = ! $buyDomainHosting->is_active;
        $buyDomainHosting->save();
        $buyDomainHosting->refresh();

        return $buyDomainHosting;
    }

    public function delete(BuyDomainHosting $buyDomainHosting): bool
    {
        return $buyDomainHosting->delete();
    }

    public function deleteAll(array $buyDomainHostings = []): bool
    {
        return BuyDomainHosting::when($buyDomainHostings, fn ($q) => $q->whereIn('id', $buyDomainHostings))->delete();
    }

    public function restore(BuyDomainHosting $buyDomainHosting): bool
    {
        return $buyDomainHosting->restore();
    }

    public function restoreAll(array $buyDomainHostings = []): bool
    {
        return BuyDomainHosting::when($buyDomainHostings, fn ($q) => $q->whereIn('id', $buyDomainHostings))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyDomainHosting $buyDomainHosting): bool
    {
        return $buyDomainHosting->forceDelete();
    }

    public function deletePermanentAll(array $buyDomainHostings = []): bool
    {
        return BuyDomainHosting::when($buyDomainHostings, fn ($q) => $q->whereIn('id', $buyDomainHostings))->onlyTrashed()->forceDelete();
    }
}
