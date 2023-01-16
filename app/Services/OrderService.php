<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public $table = 'orders';

    public function add(array $data = []): Order
    {
        $data['code'] = Str::code('ORDER', $this->table, now()->format('Y-m-d'), 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Order::create($data);
    }

    public function clone(array $data, Order $order): Order
    {
        $data['code'] = Str::code('ORDER', $this->table, now()->format('Y-m-d'), 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Order::create($data);
    }

    public function edit(Order $order, $data): Order
    {
        $order->update($data);
        $order->refresh();

        return $order;
    }

    public function active(Order $order): Order
    {
        $order->is_active = ! $order->is_active;
        $order->save();
        $order->refresh();

        return $order;
    }

    public function delete(Order $order): bool
    {
        return $order->delete();
    }

    public function deleteAll(array $orders = []): bool
    {
        return Order::when($orders, fn ($q) => $q->whereIn('id', $orders))->delete();
    }

    public function restore(Order $order): bool
    {
        return $order->restore();
    }

    public function restoreAll(array $orders = []): bool
    {
        return Order::when($orders, fn ($q) => $q->whereIn('id', $orders))->onlyTrashed()->restore();
    }

    public function deletePermanent(Order $order): bool
    {
        return $order->forceDelete();
    }

    public function deletePermanentAll(array $orders = []): bool
    {
        return Order::when($orders, fn ($q) => $q->whereIn('id', $orders))->onlyTrashed()->forceDelete();
    }
}
