<?php

namespace App\Services;

use App\Models\PriceList;
use Illuminate\Support\Facades\DB;

class PriceListService
{
    public $table = 'price_lists';

    public function add(array $data = []): PriceList
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PriceList::create($data);
    }

    public function clone(array $data, PriceList $priceList): PriceList
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PriceList::create($data);
    }

    public function edit(PriceList $priceList, $data): PriceList
    {
        $priceList->update($data);
        $priceList->refresh();

        return $priceList;
    }

    public function active(PriceList $priceList): PriceList
    {
        $priceList->is_active = ! $priceList->is_active;
        $priceList->save();
        $priceList->refresh();

        return $priceList;
    }

    public function delete(PriceList $priceList): bool
    {
        return $priceList->delete();
    }

    public function deleteAll(array $priceLists = []): bool
    {
        return PriceList::when($priceLists, fn ($q) => $q->whereIn('id', $priceLists))->delete();
    }

    public function restore(PriceList $priceList): bool
    {
        return $priceList->restore();
    }

    public function restoreAll(array $priceLists = []): bool
    {
        return PriceList::when($priceLists, fn ($q) => $q->whereIn('id', $priceLists))->onlyTrashed()->restore();
    }

    public function deletePermanent(PriceList $priceList): bool
    {
        return $priceList->forceDelete();
    }

    public function deletePermanentAll(array $priceLists = []): bool
    {
        return PriceList::when($priceLists, fn ($q) => $q->whereIn('id', $priceLists))->onlyTrashed()->forceDelete();
    }
}
