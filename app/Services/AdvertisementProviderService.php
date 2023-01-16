<?php

namespace App\Services;

use App\Models\AdvertisementProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdvertisementProviderService
{
    public $table = 'advertisement_providers';

    public function add(array $data = []): AdvertisementProvider
    {
        $data['code'] = Str::code('ADP', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return AdvertisementProvider::create($data);
    }

    public function clone(array $data, AdvertisementProvider $advertisementProvider): AdvertisementProvider
    {
        $data['code'] = Str::code('ADP', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return AdvertisementProvider::create($data);
    }

    public function edit(AdvertisementProvider $advertisementProvider, array $data = []): AdvertisementProvider
    {
        $advertisementProvider->update($data);
        $advertisementProvider->refresh();

        return $advertisementProvider;
    }

    public function active(AdvertisementProvider $advertisementProvider): AdvertisementProvider
    {
        $advertisementProvider->is_active = ! $advertisementProvider->is_active;
        $advertisementProvider->save();
        $advertisementProvider->refresh();

        return $advertisementProvider;
    }

    public function delete(AdvertisementProvider $advertisementProvider): bool
    {
        return $advertisementProvider->delete();
    }

    public function deleteAll(array $advertisementProviders = []): bool
    {
        return AdvertisementProvider::when($advertisementProviders, fn ($q) => $q->whereIn('id', $advertisementProviders))->delete();
    }

    public function restore(AdvertisementProvider $advertisementProvider): bool
    {
        return $advertisementProvider->restore();
    }

    public function restoreAll(array $advertisementProviders = []): bool
    {
        return AdvertisementProvider::when($advertisementProviders, fn ($q) => $q->whereIn('id', $advertisementProviders))->onlyTrashed()->restore();
    }

    public function deletePermanent(AdvertisementProvider $advertisementProvider): bool
    {
        return $advertisementProvider->forceDelete();
    }

    public function deletePermanentAll(array $advertisementProviders = []): bool
    {
        return AdvertisementProvider::when($advertisementProviders, fn ($q) => $q->whereIn('id', $advertisementProviders))->onlyTrashed()->forceDelete();
    }
}
