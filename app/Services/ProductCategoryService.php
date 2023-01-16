<?php

namespace App\Services;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoryService
{
    public $table = 'product_categories';

    public function add(array $data = []): ProductCategory
    {
        $data['code'] = Str::code('PTC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ProductCategory::create($data);
    }

    public function clone(array $data, ProductCategory $productCategory): ProductCategory
    {
        $data['code'] = Str::code('PTC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ProductCategory::create($data);
    }

    public function edit(ProductCategory $productCategory, $data): ProductCategory
    {
        $productCategory->update($data);
        $productCategory->refresh();

        return $productCategory;
    }

    public function active(ProductCategory $productCategory): ProductCategory
    {
        $productCategory->is_active = ! $productCategory->is_active;
        $productCategory->save();
        $productCategory->refresh();

        return $productCategory;
    }

    public function delete(ProductCategory $productCategory): bool
    {
        return $productCategory->delete();
    }

    public function deleteAll(array $productCategories = []): bool
    {
        return ProductCategory::when($productCategories, fn ($q) => $q->whereIn('id', $productCategories))->delete();
    }

    public function restore(ProductCategory $productCategory): bool
    {
        return $productCategory->restore();
    }

    public function restoreAll(array $productCategories = []): bool
    {
        return ProductCategory::when($productCategories, fn ($q) => $q->whereIn('id', $productCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(ProductCategory $productCategory): bool
    {
        return $productCategory->forceDelete();
    }

    public function deletePermanentAll(array $productCategories = []): bool
    {
        return ProductCategory::when($productCategories, fn ($q) => $q->whereIn('id', $productCategories))->onlyTrashed()->forceDelete();
    }
}
