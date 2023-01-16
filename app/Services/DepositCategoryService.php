<?php

namespace App\Services;

use App\Models\DepositCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepositCategoryService
{
    public $table = 'deposit_categories';

    public function add(array $data = []): DepositCategory
    {
        $data['code'] = Str::code('DPCAT', $this->table, null, 5);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return DepositCategory::create($data);
    }

    public function clone(array $data, DepositCategory $depositCategory): DepositCategory
    {
        $data['code'] = Str::code('DPCAT', $this->table, null, 5);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return DepositCategory::create($data);
    }

    public function edit(DepositCategory $depositCategory, $data): DepositCategory
    {
        $depositCategory->update($data);
        $depositCategory->refresh();

        return $depositCategory;
    }

    public function active(DepositCategory $depositCategory): DepositCategory
    {
        $depositCategory->is_active = ! $depositCategory->is_active;
        $depositCategory->save();
        $depositCategory->refresh();

        return $depositCategory;
    }

    public function delete(DepositCategory $depositCategory): bool
    {
        return $depositCategory->delete();
    }

    public function deleteAll(array $depositCategories = []): bool
    {
        return DepositCategory::when($depositCategories, fn ($q) => $q->whereIn('id', $depositCategories))->delete();
    }

    public function restore(DepositCategory $depositCategory): bool
    {
        return $depositCategory->restore();
    }

    public function restoreAll(array $depositCategories = []): bool
    {
        return DepositCategory::when($depositCategories, fn ($q) => $q->whereIn('id', $depositCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(DepositCategory $depositCategory): bool
    {
        return $depositCategory->forceDelete();
    }

    public function deletePermanentAll(array $depositCategories = []): bool
    {
        return DepositCategory::when($depositCategories, fn ($q) => $q->whereIn('id', $depositCategories))->onlyTrashed()->forceDelete();
    }
}
