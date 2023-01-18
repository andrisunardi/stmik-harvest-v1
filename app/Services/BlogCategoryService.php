<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoryService
{
    public $table = 'blog_categories';

    public $slug = 'blog-category';

    public function add(array $data = []): BlogCategory
    {
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BlogCategory::create($data);
    }

    public function clone(array $data, BlogCategory $blogCategories): BlogCategory
    {
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BlogCategory::create($data);
    }

    public function edit(BlogCategory $blogCategories, $data): BlogCategory
    {
        $data['slug'] = Str::slug($data['name']);

        $blogCategories->update($data);
        $blogCategories->refresh();

        return $blogCategories;
    }

    public function active(BlogCategory $blogCategories): BlogCategory
    {
        $blogCategories->is_active = ! $blogCategories->is_active;
        $blogCategories->save();
        $blogCategories->refresh();

        return $blogCategories;
    }

    public function delete(BlogCategory $blogCategories): bool
    {
        return $blogCategories->delete();
    }

    public function deleteAll(array $blogCategories = []): bool
    {
        return BlogCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->delete();
    }

    public function restore(BlogCategory $blogCategories): bool
    {
        return $blogCategories->restore();
    }

    public function restoreAll(array $blogCategories = []): bool
    {
        return BlogCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(BlogCategory $blogCategories): bool
    {
        return $blogCategories->forceDelete();
    }

    public function deletePermanentAll(array $blogCategories = []): bool
    {
        return BlogCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->onlyTrashed()->forceDelete();
    }
}
