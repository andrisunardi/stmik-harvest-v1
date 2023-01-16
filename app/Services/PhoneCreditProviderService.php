<?php

namespace App\Services;

use App\Models\PhoneCreditProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhoneCreditProviderService
{
    public $table = 'phone_credit_providers';

    public function add(array $data = []): PhoneCreditProvider
    {
        $data['code'] = Str::code('PCP', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PhoneCreditProvider::create($data);
    }

    public function clone(array $data, PhoneCreditProvider $phoneCreditProvider): PhoneCreditProvider
    {
        $data['code'] = Str::code('PCP', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PhoneCreditProvider::create($data);
    }

    public function edit(PhoneCreditProvider $phoneCreditProvider, $data): PhoneCreditProvider
    {
        $phoneCreditProvider->update($data);
        $phoneCreditProvider->refresh();

        return $phoneCreditProvider;
    }

    public function active(PhoneCreditProvider $phoneCreditProvider): PhoneCreditProvider
    {
        $phoneCreditProvider->is_active = ! $phoneCreditProvider->is_active;
        $phoneCreditProvider->save();
        $phoneCreditProvider->refresh();

        return $phoneCreditProvider;
    }

    public function delete(PhoneCreditProvider $phoneCreditProvider): bool
    {
        return $phoneCreditProvider->delete();
    }

    public function deleteAll(array $phoneCreditProviders = []): bool
    {
        return PhoneCreditProvider::when($phoneCreditProviders, fn ($q) => $q->whereIn('id', $phoneCreditProviders))->delete();
    }

    public function restore(PhoneCreditProvider $phoneCreditProvider): bool
    {
        return $phoneCreditProvider->restore();
    }

    public function restoreAll(array $phoneCreditProviders = []): bool
    {
        return PhoneCreditProvider::when($phoneCreditProviders, fn ($q) => $q->whereIn('id', $phoneCreditProviders))->onlyTrashed()->restore();
    }

    public function deletePermanent(PhoneCreditProvider $phoneCreditProvider): bool
    {
        return $phoneCreditProvider->forceDelete();
    }

    public function deletePermanentAll(array $phoneCreditProviders = []): bool
    {
        return PhoneCreditProvider::when($phoneCreditProviders, fn ($q) => $q->whereIn('id', $phoneCreditProviders))->onlyTrashed()->forceDelete();
    }
}
