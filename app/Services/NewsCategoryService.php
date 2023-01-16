<?php

namespace App\Services;

use App\Models\NewsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsCategoryService
{
    public $table = 'news_categories';

    public function add(array $data = []): NewsCategory
    {
        $data['code'] = Str::code('NC', $this->table, null, 8);
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return NewsCategory::create($data);
    }

    public function clone(array $data, NewsCategory $newsCategory): NewsCategory
    {
        $data['code'] = Str::code('NC', $this->table, null, 8);
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return NewsCategory::create($data);
    }

    public function edit(NewsCategory $newsCategory, $data): NewsCategory
    {
        $data['slug'] = Str::slug($data['name']);

        $newsCategory->update($data);
        $newsCategory->refresh();

        return $newsCategory;
    }

    public function active(NewsCategory $newsCategory): NewsCategory
    {
        $newsCategory->is_active = ! $newsCategory->is_active;
        $newsCategory->save();
        $newsCategory->refresh();

        return $newsCategory;
    }

    public function delete(NewsCategory $newsCategory): bool
    {
        return $newsCategory->delete();
    }

    public function deleteAll(array $newsCategories = []): bool
    {
        return NewsCategory::when($newsCategories, fn ($q) => $q->whereIn('id', $newsCategories))->delete();
    }

    public function restore(NewsCategory $newsCategory): bool
    {
        return $newsCategory->restore();
    }

    public function restoreAll(array $newsCategories = []): bool
    {
        return NewsCategory::when($newsCategories, fn ($q) => $q->whereIn('id', $newsCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(NewsCategory $newsCategory): bool
    {
        return $newsCategory->forceDelete();
    }

    public function deletePermanentAll(array $newsCategories = []): bool
    {
        return NewsCategory::when($newsCategories, fn ($q) => $q->whereIn('id', $newsCategories))->onlyTrashed()->forceDelete();
    }
}
