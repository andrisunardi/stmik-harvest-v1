<?php

namespace App\Services;

use App\Models\ProcedureCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProcedureCategoryService
{
    public $table = 'procedure_categories';

    public function add(array $data = []): ProcedureCategory
    {
        $data['code'] = Str::code('PDC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ProcedureCategory::create($data);
    }

    public function clone(array $data, ProcedureCategory $procedureCategory): ProcedureCategory
    {
        $data['code'] = Str::code('PDC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ProcedureCategory::create($data);
    }

    public function edit(ProcedureCategory $procedureCategory, $data): ProcedureCategory
    {
        $procedureCategory->update($data);
        $procedureCategory->refresh();

        return $procedureCategory;
    }

    public function active(ProcedureCategory $procedureCategory): ProcedureCategory
    {
        $procedureCategory->is_active = ! $procedureCategory->is_active;
        $procedureCategory->save();
        $procedureCategory->refresh();

        return $procedureCategory;
    }

    public function delete(ProcedureCategory $procedureCategory): bool
    {
        return $procedureCategory->delete();
    }

    public function deleteAll(array $procedureCategories = []): bool
    {
        return ProcedureCategory::when($procedureCategories, fn ($q) => $q->whereIn('id', $procedureCategories))->delete();
    }

    public function restore(ProcedureCategory $procedureCategory): bool
    {
        return $procedureCategory->restore();
    }

    public function restoreAll(array $procedureCategories = []): bool
    {
        return ProcedureCategory::when($procedureCategories, fn ($q) => $q->whereIn('id', $procedureCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(ProcedureCategory $procedureCategory): bool
    {
        return $procedureCategory->forceDelete();
    }

    public function deletePermanentAll(array $procedureCategories = []): bool
    {
        return ProcedureCategory::when($procedureCategories, fn ($q) => $q->whereIn('id', $procedureCategories))->onlyTrashed()->forceDelete();
    }
}
