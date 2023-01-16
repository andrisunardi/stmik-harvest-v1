<?php

namespace App\Services;

use App\Models\InternetProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InternetProviderService
{
    public $table = 'internet_providers';

    public function add(array $data = []): InternetProvider
    {
        $data['code'] = Str::code('IPV', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return InternetProvider::create($data);
    }

    public function clone(array $data, InternetProvider $internetProvider): InternetProvider
    {
        $data['code'] = Str::code('IPV', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return InternetProvider::create($data);
    }

    public function edit(InternetProvider $internetProvider, $data): InternetProvider
    {
        $internetProvider->update($data);
        $internetProvider->refresh();

        return $internetProvider;
    }

    public function active(InternetProvider $internetProvider): InternetProvider
    {
        $internetProvider->is_active = ! $internetProvider->is_active;
        $internetProvider->save();
        $internetProvider->refresh();

        return $internetProvider;
    }

    public function delete(InternetProvider $internetProvider): bool
    {
        return $internetProvider->delete();
    }

    public function deleteAll(array $internetProviders = []): bool
    {
        return InternetProvider::when($internetProviders, fn ($q) => $q->whereIn('id', $internetProviders))->delete();
    }

    public function restore(InternetProvider $internetProvider): bool
    {
        return $internetProvider->restore();
    }

    public function restoreAll(array $internetProviders = []): bool
    {
        return InternetProvider::when($internetProviders, fn ($q) => $q->whereIn('id', $internetProviders))->onlyTrashed()->restore();
    }

    public function deletePermanent(InternetProvider $internetProvider): bool
    {
        return $internetProvider->forceDelete();
    }

    public function deletePermanentAll(array $internetProviders = []): bool
    {
        return InternetProvider::when($internetProviders, fn ($q) => $q->whereIn('id', $internetProviders))->onlyTrashed()->forceDelete();
    }
}
