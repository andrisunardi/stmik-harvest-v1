<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceService
{
    public $table = 'services';

    public function add(array $data = []): Service
    {
        $data['code'] = Str::code('SERVICE', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Service::create($data);
    }

    public function clone(array $data, Service $service): Service
    {
        $data['code'] = Str::code('SERVICE', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Service::create($data);
    }

    public function edit(Service $service, $data): Service
    {
        $service->update($data);
        $service->refresh();

        return $service;
    }

    public function active(Service $service): Service
    {
        $service->is_active = ! $service->is_active;
        $service->save();
        $service->refresh();

        return $service;
    }

    public function delete(Service $service): bool
    {
        return $service->delete();
    }

    public function deleteAll(array $services = []): bool
    {
        return Service::when($services, fn ($q) => $q->whereIn('id', $services))->delete();
    }

    public function restore(Service $service): bool
    {
        return $service->restore();
    }

    public function restoreAll(array $services = []): bool
    {
        return Service::when($services, fn ($q) => $q->whereIn('id', $services))->onlyTrashed()->restore();
    }

    public function deletePermanent(Service $service): bool
    {
        return $service->forceDelete();
    }

    public function deletePermanentAll(array $services = []): bool
    {
        return Service::when($services, fn ($q) => $q->whereIn('id', $services))->onlyTrashed()->forceDelete();
    }
}
