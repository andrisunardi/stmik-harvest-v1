<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartService
{
    public $table = 'carts';

    public function add(array $data = []): Cart
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Cart::create($data);
    }

    public function clone(array $data, Cart $cart): Cart
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Cart::create($data);
    }

    public function edit(Cart $cart, $data): Cart
    {
        $cart->update($data);
        $cart->refresh();

        return $cart;
    }

    public function active(Cart $cart): Cart
    {
        $cart->is_active = ! $cart->is_active;
        $cart->save();
        $cart->refresh();

        return $cart;
    }

    public function delete(Cart $cart): bool
    {
        return $cart->delete();
    }

    public function deleteAll(array $carts = []): bool
    {
        return Cart::when($carts, fn ($q) => $q->whereIn('id', $carts))->delete();
    }

    public function restore(Cart $cart): bool
    {
        return $cart->restore();
    }

    public function restoreAll(array $carts = []): bool
    {
        return Cart::when($carts, fn ($q) => $q->whereIn('id', $carts))->onlyTrashed()->restore();
    }

    public function deletePermanent(Cart $cart): bool
    {
        return $cart->forceDelete();
    }

    public function deletePermanentAll(array $carts = []): bool
    {
        return Cart::when($carts, fn ($q) => $q->whereIn('id', $carts))->onlyTrashed()->forceDelete();
    }
}
