<?php

namespace App\Services;

use App\Models\EventCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventCategoryService
{
    public $table = 'event_categories';

    public $slug = 'event-category';

    public function add(array $data = []): EventCategory
    {
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return EventCategory::create($data);
    }

    public function clone(array $data, EventCategory $eventCategories): EventCategory
    {
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return EventCategory::create($data);
    }

    public function edit(EventCategory $eventCategories, $data): EventCategory
    {
        $data['slug'] = Str::slug($data['name']);

        $eventCategories->update($data);
        $eventCategories->refresh();

        return $eventCategories;
    }

    public function active(EventCategory $eventCategories): EventCategory
    {
        $eventCategories->is_active = ! $eventCategories->is_active;
        $eventCategories->save();
        $eventCategories->refresh();

        return $eventCategories;
    }

    public function delete(EventCategory $blogCategory): bool
    {
        return $blogCategory->delete();
    }

    public function deleteAll(array $blogCategories = []): bool
    {
        return EventCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->delete();
    }

    public function restore(EventCategory $blogCategory): bool
    {
        return $blogCategory->restore();
    }

    public function restoreAll(array $blogCategories = []): bool
    {
        return EventCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(EventCategory $blogCategory): bool
    {
        return $blogCategory->forceDelete();
    }

    public function deletePermanentAll(array $blogCategories = []): bool
    {
        return EventCategory::when($blogCategories, fn ($q) => $q->whereIn('id', $blogCategories))->onlyTrashed()->forceDelete();
    }
}
