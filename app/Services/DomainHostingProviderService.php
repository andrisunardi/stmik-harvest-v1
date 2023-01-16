<?php

namespace App\Services;

use App\Models\DomainHostingProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DomainHostingProviderService
{
    public $table = 'domain_hosting_providers';

    public function add(array $data = []): DomainHostingProvider
    {
        $data['code'] = Str::code('DHP', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return DomainHostingProvider::create($data);
    }

    public function clone(array $data, DomainHostingProvider $domainHostingProvider): DomainHostingProvider
    {
        $data['code'] = Str::code('DHP', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return DomainHostingProvider::create($data);
    }

    public function edit(DomainHostingProvider $domainHostingProvider, $data): DomainHostingProvider
    {
        $domainHostingProvider->update($data);
        $domainHostingProvider->refresh();

        return $domainHostingProvider;
    }

    public function active(DomainHostingProvider $domainHostingProvider): DomainHostingProvider
    {
        $domainHostingProvider->is_active = ! $domainHostingProvider->is_active;
        $domainHostingProvider->save();
        $domainHostingProvider->refresh();

        return $domainHostingProvider;
    }

    public function delete(DomainHostingProvider $domainHostingProvider): bool
    {
        return $domainHostingProvider->delete();
    }

    public function deleteAll(array $domainHostingProviders = []): bool
    {
        return DomainHostingProvider::when($domainHostingProviders, fn ($q) => $q->whereIn('id', $domainHostingProviders))->delete();
    }

    public function restore(DomainHostingProvider $domainHostingProvider): bool
    {
        return $domainHostingProvider->restore();
    }

    public function restoreAll(array $domainHostingProviders = []): bool
    {
        return DomainHostingProvider::when($domainHostingProviders, fn ($q) => $q->whereIn('id', $domainHostingProviders))->onlyTrashed()->restore();
    }

    public function deletePermanent(DomainHostingProvider $domainHostingProvider): bool
    {
        return $domainHostingProvider->forceDelete();
    }

    public function deletePermanentAll(array $domainHostingProviders = []): bool
    {
        return DomainHostingProvider::when($domainHostingProviders, fn ($q) => $q->whereIn('id', $domainHostingProviders))->onlyTrashed()->forceDelete();
    }
}
