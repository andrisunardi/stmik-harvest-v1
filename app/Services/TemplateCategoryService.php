<?php

namespace App\Services;

use App\Models\TemplateCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateCategoryService
{
    public $table = 'template_categories';

    public function add(array $data = []): TemplateCategory
    {
        $data['code'] = Str::code('TPC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return TemplateCategory::create($data);
    }

    public function clone(array $data, TemplateCategory $templateCategory): TemplateCategory
    {
        $data['code'] = Str::code('TPC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return TemplateCategory::create($data);
    }

    public function edit(TemplateCategory $templateCategory, $data): TemplateCategory
    {
        $templateCategory->update($data);
        $templateCategory->refresh();

        return $templateCategory;
    }

    public function active(TemplateCategory $templateCategory): TemplateCategory
    {
        $templateCategory->is_active = ! $templateCategory->is_active;
        $templateCategory->save();
        $templateCategory->refresh();

        return $templateCategory;
    }

    public function delete(TemplateCategory $templateCategory): bool
    {
        return $templateCategory->delete();
    }

    public function deleteAll(array $templateCategories = []): bool
    {
        return TemplateCategory::when($templateCategories, fn ($q) => $q->whereIn('id', $templateCategories))->delete();
    }

    public function restore(TemplateCategory $templateCategory): bool
    {
        return $templateCategory->restore();
    }

    public function restoreAll(array $templateCategories = []): bool
    {
        return TemplateCategory::when($templateCategories, fn ($q) => $q->whereIn('id', $templateCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(TemplateCategory $templateCategory): bool
    {
        return $templateCategory->forceDelete();
    }

    public function deletePermanentAll(array $templateCategories = []): bool
    {
        return TemplateCategory::when($templateCategories, fn ($q) => $q->whereIn('id', $templateCategories))->onlyTrashed()->forceDelete();
    }
}
