<?php

namespace App\Services;

use App\Models\Platform;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlatformService
{
    public $table = 'platforms';

    public function add(array $data = []): Platform
    {
        $data['code'] = Str::code('PLATFORM', $this->table, null, 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Platform::create($data);
    }

    public function clone(array $data, Platform $platform): Platform
    {
        $data['code'] = Str::code('PLATFORM', $this->table, null, 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Platform::create($data);
    }

    public function edit(Platform $platform, $data): Platform
    {
        $platform->update($data);
        $platform->refresh();

        return $platform;
    }

    public function active(Platform $platform): Platform
    {
        $platform->is_active = ! $platform->is_active;
        $platform->save();
        $platform->refresh();

        return $platform;
    }

    public function delete(Platform $platform): bool
    {
        return $platform->delete();
    }

    public function deleteAll(array $platforms = []): bool
    {
        return Platform::when($platforms, fn ($q) => $q->whereIn('id', $platforms))->delete();
    }

    public function restore(Platform $platform): bool
    {
        return $platform->restore();
    }

    public function restoreAll(array $platforms = []): bool
    {
        return Platform::when($platforms, fn ($q) => $q->whereIn('id', $platforms))->onlyTrashed()->restore();
    }

    public function deletePermanent(Platform $platform): bool
    {
        return $platform->forceDelete();
    }

    public function deletePermanentAll(array $platforms = []): bool
    {
        return Platform::when($platforms, fn ($q) => $q->whereIn('id', $platforms))->onlyTrashed()->forceDelete();
    }
}
