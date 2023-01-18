<?php

namespace App\Services;

use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferService
{
    public $table = 'offers';

    public $slug = 'offer';

    public function add(array $data = []): Offer
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Offer::create($data);
    }

    public function clone(array $data, Offer $offer): Offer
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Offer::create($data);
    }

    public function edit(Offer $offer, $data): Offer
    {
        $offer->update($data);
        $offer->refresh();

        return $offer;
    }

    public function active(Offer $offer): Offer
    {
        $offer->is_active = ! $offer->is_active;
        $offer->save();
        $offer->refresh();

        return $offer;
    }

    public function delete(Offer $offer): bool
    {
        return $offer->delete();
    }

    public function deleteAll(array $offers = []): bool
    {
        return Offer::when($offers, fn ($q) => $q->whereIn('id', $offers))->delete();
    }

    public function restore(Offer $offer): bool
    {
        return $offer->restore();
    }

    public function restoreAll(array $offers = []): bool
    {
        return Offer::when($offers, fn ($q) => $q->whereIn('id', $offers))->onlyTrashed()->restore();
    }

    public function deletePermanent(Offer $offer): bool
    {
        return $offer->forceDelete();
    }

    public function deletePermanentAll(array $offers = []): bool
    {
        return Offer::when($offers, fn ($q) => $q->whereIn('id', $offers))->onlyTrashed()->forceDelete();
    }
}
