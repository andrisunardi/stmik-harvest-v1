<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService
{
    public $table = 'products';

    public function add(array $data = []): Product
    {
        $data['code'] = Str::code('PRODUCT', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Product::create($data);
    }

    public function clone(array $data, Product $product): Product
    {
        $data['code'] = Str::code('PRODUCT', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Product::create($data);
    }

    public function edit(Product $product, $data): Product
    {
        $product->update($data);
        $product->refresh();

        return $product;
    }

    public function active(Product $product): Product
    {
        $product->is_active = ! $product->is_active;
        $product->save();
        $product->refresh();

        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function deleteAll(array $products = []): bool
    {
        return Product::when($products, fn ($q) => $q->whereIn('id', $products))->delete();
    }

    public function restore(Product $product): bool
    {
        return $product->restore();
    }

    public function restoreAll(array $products = []): bool
    {
        return Product::when($products, fn ($q) => $q->whereIn('id', $products))->onlyTrashed()->restore();
    }

    public function deletePermanent(Product $product): bool
    {
        return $product->forceDelete();
    }

    public function deletePermanentAll(array $products = []): bool
    {
        return Product::when($products, fn ($q) => $q->whereIn('id', $products))->onlyTrashed()->forceDelete();
    }
}
