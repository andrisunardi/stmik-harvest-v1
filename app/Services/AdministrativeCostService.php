<?php

namespace App\Services;

use App\Models\AdministrativeCost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdministrativeCostService
{
    public $table = 'administrative_costs';

    public function add(array $data = []): AdministrativeCost
    {
        $data['code'] = Str::code('ADMCST', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return AdministrativeCost::create($data);
    }

    public function clone($data, AdministrativeCost $administrativeCost): AdministrativeCost
    {
        $data['code'] = Str::code('ADMCST', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return AdministrativeCost::create($data);
    }

    public function edit(AdministrativeCost $administrativeCost, $data): AdministrativeCost
    {
        $administrativeCost->update($data);
        $administrativeCost->refresh();

        return $administrativeCost;
    }

    public function active(AdministrativeCost $administrativeCost): AdministrativeCost
    {
        $administrativeCost->is_active = ! $administrativeCost->is_active;
        $administrativeCost->save();
        $administrativeCost->refresh();

        return $administrativeCost;
    }

    public function delete(AdministrativeCost $administrativeCost): bool
    {
        return $administrativeCost->delete();
    }

    public function deleteAll(array $administrativeCosts = []): bool
    {
        return AdministrativeCost::when($administrativeCosts, fn ($q) => $q->whereIn('id', $administrativeCosts))->delete();
    }

    public function restore(AdministrativeCost $administrativeCost): bool
    {
        return $administrativeCost->restore();
    }

    public function restoreAll(array $administrativeCosts = []): bool
    {
        return AdministrativeCost::when($administrativeCosts, fn ($q) => $q->whereIn('id', $administrativeCosts))->onlyTrashed()->restore();
    }

    public function deletePermanent(AdministrativeCost $administrativeCost): bool
    {
        return $administrativeCost->forceDelete();
    }

    public function deletePermanentAll(array $administrativeCosts = []): bool
    {
        return AdministrativeCost::when($administrativeCosts, fn ($q) => $q->whereIn('id', $administrativeCosts))->onlyTrashed()->forceDelete();
    }
}
