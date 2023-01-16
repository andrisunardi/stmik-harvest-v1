<?php

namespace App\Services;

use App\Models\GameCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameCategoryService
{
    public $table = 'game_categories';

    public function add(array $data = []): GameCategory
    {
        $data['code'] = Str::code('GMC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return GameCategory::create($data);
    }

    public function clone(array $data, GameCategory $gameCategory): GameCategory
    {
        $data['code'] = Str::code('GMC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return GameCategory::create($data);
    }

    public function edit(GameCategory $gameCategory, $data): GameCategory
    {
        $gameCategory->update($data);
        $gameCategory->refresh();

        return $gameCategory;
    }

    public function active(GameCategory $gameCategory): GameCategory
    {
        $gameCategory->is_active = ! $gameCategory->is_active;
        $gameCategory->save();
        $gameCategory->refresh();

        return $gameCategory;
    }

    public function delete(GameCategory $gameCategory): bool
    {
        return $gameCategory->delete();
    }

    public function deleteAll(array $gameCategories = []): bool
    {
        return GameCategory::when($gameCategories, fn ($q) => $q->whereIn('id', $gameCategories))->delete();
    }

    public function restore(GameCategory $gameCategory): bool
    {
        return $gameCategory->restore();
    }

    public function restoreAll(array $gameCategories = []): bool
    {
        return GameCategory::when($gameCategories, fn ($q) => $q->whereIn('id', $gameCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(GameCategory $gameCategory): bool
    {
        return $gameCategory->forceDelete();
    }

    public function deletePermanentAll(array $gameCategories = []): bool
    {
        return GameCategory::when($gameCategories, fn ($q) => $q->whereIn('id', $gameCategories))->onlyTrashed()->forceDelete();
    }
}
