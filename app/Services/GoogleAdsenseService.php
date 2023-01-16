<?php

namespace App\Services;

use App\Models\GoogleAdsense;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GoogleAdsenseService
{
    public $table = 'google_adsenses';

    public function add(array $data = []): GoogleAdsense
    {
        $data['code'] = Str::code('ADSENSE', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return GoogleAdsense::create($data);
    }

    public function clone(array $data, GoogleAdsense $googleAdsense): GoogleAdsense
    {
        $data['code'] = Str::code('ADSENSE', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return GoogleAdsense::create($data);
    }

    public function edit(GoogleAdsense $googleAdsense, $data): GoogleAdsense
    {
        $googleAdsense->update($data);
        $googleAdsense->refresh();

        return $googleAdsense;
    }

    public function active(GoogleAdsense $googleAdsense): GoogleAdsense
    {
        $googleAdsense->is_active = ! $googleAdsense->is_active;
        $googleAdsense->save();
        $googleAdsense->refresh();

        return $googleAdsense;
    }

    public function delete(GoogleAdsense $googleAdsense): bool
    {
        return $googleAdsense->delete();
    }

    public function deleteAll(array $googleAdsenses = []): bool
    {
        return GoogleAdsense::when($googleAdsenses, fn ($q) => $q->whereIn('id', $googleAdsenses))->delete();
    }

    public function restore(GoogleAdsense $googleAdsense): bool
    {
        return $googleAdsense->restore();
    }

    public function restoreAll(array $googleAdsenses = []): bool
    {
        return GoogleAdsense::when($googleAdsenses, fn ($q) => $q->whereIn('id', $googleAdsenses))->onlyTrashed()->restore();
    }

    public function deletePermanent(GoogleAdsense $googleAdsense): bool
    {
        return $googleAdsense->forceDelete();
    }

    public function deletePermanentAll(array $googleAdsenses = []): bool
    {
        return GoogleAdsense::when($googleAdsenses, fn ($q) => $q->whereIn('id', $googleAdsenses))->onlyTrashed()->forceDelete();
    }
}
