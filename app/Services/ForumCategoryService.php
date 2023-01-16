<?php

namespace App\Services;

use App\Models\ForumCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForumCategoryService
{
    public $table = 'forum_categories';

    public function add(array $data = []): ForumCategory
    {
        $data['code'] = Str::code('FRC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ForumCategory::create($data);
    }

    public function clone(array $data, ForumCategory $forumCategory): ForumCategory
    {
        $data['code'] = Str::code('FRC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ForumCategory::create($data);
    }

    public function edit(ForumCategory $forumCategory, $data): ForumCategory
    {
        $forumCategory->update($data);
        $forumCategory->refresh();

        return $forumCategory;
    }

    public function active(ForumCategory $forumCategory): ForumCategory
    {
        $forumCategory->is_active = ! $forumCategory->is_active;
        $forumCategory->save();
        $forumCategory->refresh();

        return $forumCategory;
    }

    public function delete(ForumCategory $forumCategory): bool
    {
        return $forumCategory->delete();
    }

    public function deleteAll(array $forumCategories = []): bool
    {
        return ForumCategory::when($forumCategories, fn ($q) => $q->whereIn('id', $forumCategories))->delete();
    }

    public function restore(ForumCategory $forumCategory): bool
    {
        return $forumCategory->restore();
    }

    public function restoreAll(array $forumCategories = []): bool
    {
        return ForumCategory::when($forumCategories, fn ($q) => $q->whereIn('id', $forumCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(ForumCategory $forumCategory): bool
    {
        return $forumCategory->forceDelete();
    }

    public function deletePermanentAll(array $forumCategories = []): bool
    {
        return ForumCategory::when($forumCategories, fn ($q) => $q->whereIn('id', $forumCategories))->onlyTrashed()->forceDelete();
    }
}
