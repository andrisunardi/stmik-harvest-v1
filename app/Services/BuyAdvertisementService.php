<?php

namespace App\Services;

use App\Models\BuyAdvertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyAdvertisementService
{
    public $table = 'buy_advertisements';

    public function add(array $data = []): BuyAdvertisement
    {
        $data['code'] = Str::code('BUYADS', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyAdvertisement::create($data);
    }

    public function clone(array $data, BuyAdvertisement $buyAdvertisement): BuyAdvertisement
    {
        $data['code'] = Str::code('BUYADS', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BuyAdvertisement::create($data);
    }

    public function edit(BuyAdvertisement $buyAdvertisement, $data): BuyAdvertisement
    {
        if ($buyAdvertisement->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('BUYADS', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $buyAdvertisement->update($data);
        $buyAdvertisement->refresh();

        return $buyAdvertisement;
    }

    public function active(BuyAdvertisement $buyAdvertisement): BuyAdvertisement
    {
        $buyAdvertisement->is_active = ! $buyAdvertisement->is_active;
        $buyAdvertisement->save();
        $buyAdvertisement->refresh();

        return $buyAdvertisement;
    }

    public function delete(BuyAdvertisement $buyAdvertisement): bool
    {
        return $buyAdvertisement->delete();
    }

    public function deleteAll(array $buyAdvertisements = []): bool
    {
        return BuyAdvertisement::when($buyAdvertisements, fn ($q) => $q->whereIn('id', $buyAdvertisements))->delete();
    }

    public function restore(BuyAdvertisement $buyAdvertisement): bool
    {
        return $buyAdvertisement->restore();
    }

    public function restoreAll(array $buyAdvertisements = []): bool
    {
        return BuyAdvertisement::when($buyAdvertisements, fn ($q) => $q->whereIn('id', $buyAdvertisements))->onlyTrashed()->restore();
    }

    public function deletePermanent(BuyAdvertisement $buyAdvertisement): bool
    {
        return $buyAdvertisement->forceDelete();
    }

    public function deletePermanentAll(array $buyAdvertisements = []): bool
    {
        return BuyAdvertisement::when($buyAdvertisements, fn ($q) => $q->whereIn('id', $buyAdvertisements))->onlyTrashed()->forceDelete();
    }
}
