<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoryService
{
    public $table = 'blog_categories';

    public function add(array $data = []): BlogCategory
    {
        $data['code'] = Str::code('BC', $this->table, null, 8);
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BlogCategory::create($data);
    }

    public function clone(array $data, BlogCategory $blogCategory): BlogCategory
    {
        $data['code'] = Str::code('BC', $this->table, null, 8);
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BlogCategory::create($data);
    }

    public function edit(BlogCategory $blogCategory, $data): BlogCategory
    {
        $data['slug'] = Str::slug($data['name']);

        $blogCategory->update($data);
        $blogCategory->refresh();

        return $blogCategory;
    }

    public function active(BlogCategory $blogCategory): BlogCategory
    {
        $blogCategory->is_active = ! $blogCategory->is_active;
        $blogCategory->save();
        $blogCategory->refresh();

        return $blogCategory;
    }

    public function delete(BlogCategory $blogCategory): bool
    {
        return $blogCategory->delete();
    }

    public function deleteAll(array $blogCategories = []): bool
    {
        return BlogCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->delete();
    }

    public function restore(BlogCategory $blogCategory): bool
    {
        return $blogCategory->restore();
    }

    public function restoreAll(array $blogCategories = []): bool
    {
        return BlogCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(BlogCategory $blogCategory): bool
    {
        return $blogCategory->forceDelete();
    }

    public function deletePermanentAll(array $blogCategories = []): bool
    {
        return BlogCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->onlyTrashed()->forceDelete();
    }
}
