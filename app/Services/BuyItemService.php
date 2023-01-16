<?php

namespace App\Services;

use App\Models\BuyItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyItemService
{
    public $table = 'buy_items';

    public function add(array $data = []): BuyItem
    {
        $data['code'] = Str::code('BUYITEM', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyItem::create($data);
    }

    public function clone(array $data, BuyItem $buyItem): BuyItem
    {
        $data['code'] = Str::code('BUYITEM', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyItem::create($data);
    }

    public function edit(BuyItem $buyItem, $data): BuyItem
    {
        $buyItem->update($data);
        $buyItem->refresh();

        return $buyItem;
    }

    public function active(BuyItem $buyItem): BuyItem
    {
        $buyItem->is_active = ! $buyItem->is_active;
        $buyItem->save();
        $buyItem->refresh();

        return $buyItem;
    }

    public function delete(BuyItem $buyItem): bool
    {
        return $buyItem->delete();
    }

    public function deleteAll(array $buyItems = []): bool
    {
        return BuyItem::when($buyItems, fn ($q) => $q->whereIn('id', $buyItems))->delete();
    }

    public function restore(BuyItem $buyItem): bool
    {
        return $buyItem->restore();
    }

    public function restoreAll(array $buyItems = []): bool
    {
        return BuyItem::when($buyItems, fn ($q) => $q->whereIn('id', $buyItems))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyItem $buyItem): bool
    {
        return $buyItem->forceDelete();
    }

    public function deletePermanentAll(array $buyItems = []): bool
    {
        return BuyItem::when($buyItems, fn ($q) => $q->whereIn('id', $buyItems))->onlyTrashed()->forceDelete();
    }
}
