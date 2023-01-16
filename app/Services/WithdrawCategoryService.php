<?php

namespace App\Services;

use App\Models\WithdrawCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WithdrawCategoryService
{
    public $table = 'withdraw_categories';

    public function add(array $data = []): WithdrawCategory
    {
        $data['code'] = Str::code('WDC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return WithdrawCategory::create($data);
    }

    public function clone(array $data, WithdrawCategory $withdrawCategory): WithdrawCategory
    {
        $data['code'] = Str::code('WDC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return WithdrawCategory::create($data);
    }

    public function edit(WithdrawCategory $withdrawCategory, $data): WithdrawCategory
    {
        $withdrawCategory->update($data);
        $withdrawCategory->refresh();

        return $withdrawCategory;
    }

    public function active(WithdrawCategory $withdrawCategory): WithdrawCategory
    {
        $withdrawCategory->is_active = ! $withdrawCategory->is_active;
        $withdrawCategory->save();
        $withdrawCategory->refresh();

        return $withdrawCategory;
    }

    public function delete(WithdrawCategory $withdrawCategory): bool
    {
        return $withdrawCategory->delete();
    }

    public function deleteAll(array $withdrawCategories = []): bool
    {
        return WithdrawCategory::when($withdrawCategories, fn ($q) => $q->whereIn('id', $withdrawCategories))->delete();
    }

    public function restore(WithdrawCategory $withdrawCategory): bool
    {
        return $withdrawCategory->restore();
    }

    public function restoreAll(array $withdrawCategories = []): bool
    {
        return WithdrawCategory::when($withdrawCategories, fn ($q) => $q->whereIn('id', $withdrawCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(WithdrawCategory $withdrawCategory): bool
    {
        return $withdrawCategory->forceDelete();
    }

    public function deletePermanentAll(array $withdrawCategories = []): bool
    {
        return WithdrawCategory::when($withdrawCategories, fn ($q) => $q->whereIn('id', $withdrawCategories))->onlyTrashed()->forceDelete();
    }
}
