<?php

namespace App\Services;

use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioCategoryService
{
    public $table = 'portfolio_categories';

    public function add(array $data = []): PortfolioCategory
    {
        $data['code'] = Str::code('PC', $this->table, null, 8);
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioCategory::create($data);
    }

    public function clone(array $data, PortfolioCategory $portfolioCategory): PortfolioCategory
    {
        $data['code'] = Str::code('PC', $this->table, null, 8);
        $data['slug'] = Str::slug($data['name']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioCategory::create($data);
    }

    public function edit(PortfolioCategory $portfolioCategory, $data): PortfolioCategory
    {
        $data['slug'] = Str::slug($data['name']);

        $portfolioCategory->update($data);
        $portfolioCategory->refresh();

        return $portfolioCategory;
    }

    public function active(PortfolioCategory $portfolioCategory): PortfolioCategory
    {
        $portfolioCategory->is_active = ! $portfolioCategory->is_active;
        $portfolioCategory->save();
        $portfolioCategory->refresh();

        return $portfolioCategory;
    }

    public function delete(PortfolioCategory $portfolioCategory): bool
    {
        return $portfolioCategory->delete();
    }

    public function deleteAll(array $portfolioCategories = []): bool
    {
        return PortfolioCategory::when($portfolioCategories, fn ($q) => $q->whereIn('id', $portfolioCategories))->delete();
    }

    public function restore(PortfolioCategory $portfolioCategory): bool
    {
        return $portfolioCategory->restore();
    }

    public function restoreAll(array $portfolioCategories = []): bool
    {
        return PortfolioCategory::when($portfolioCategories, fn ($q) => $q->whereIn('id', $portfolioCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(PortfolioCategory $portfolioCategory): bool
    {
        return $portfolioCategory->forceDelete();
    }

    public function deletePermanentAll(array $portfolioCategories = []): bool
    {
        return PortfolioCategory::when($portfolioCategories, fn ($q) => $q->whereIn('id', $portfolioCategories))->onlyTrashed()->forceDelete();
    }
}
