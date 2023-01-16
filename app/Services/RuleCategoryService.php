<?php

namespace App\Services;

use App\Models\RuleCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RuleCategoryService
{
    public $table = 'rule_categories';

    public function add(array $data = []): RuleCategory
    {
        $data['code'] = Str::code('RLC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return RuleCategory::create($data);
    }

    public function clone(array $data, RuleCategory $ruleCategory): RuleCategory
    {
        $data['code'] = Str::code('RLC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return RuleCategory::create($data);
    }

    public function edit(RuleCategory $ruleCategory, $data): RuleCategory
    {
        $ruleCategory->update($data);
        $ruleCategory->refresh();

        return $ruleCategory;
    }

    public function active(RuleCategory $ruleCategory): RuleCategory
    {
        $ruleCategory->is_active = ! $ruleCategory->is_active;
        $ruleCategory->save();
        $ruleCategory->refresh();

        return $ruleCategory;
    }

    public function delete(RuleCategory $ruleCategory): bool
    {
        return $ruleCategory->delete();
    }

    public function deleteAll(array $ruleCategories = []): bool
    {
        return RuleCategory::when($ruleCategories, fn ($q) => $q->whereIn('id', $ruleCategories))->delete();
    }

    public function restore(RuleCategory $ruleCategory): bool
    {
        return $ruleCategory->restore();
    }

    public function restoreAll(array $ruleCategories = []): bool
    {
        return RuleCategory::when($ruleCategories, fn ($q) => $q->whereIn('id', $ruleCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(RuleCategory $ruleCategory): bool
    {
        return $ruleCategory->forceDelete();
    }

    public function deletePermanentAll(array $ruleCategories = []): bool
    {
        return RuleCategory::when($ruleCategories, fn ($q) => $q->whereIn('id', $ruleCategories))->onlyTrashed()->forceDelete();
    }
}
