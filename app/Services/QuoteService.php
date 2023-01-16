<?php

namespace App\Services;

use App\Models\Quote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuoteService
{
    public $table = 'quotes';

    public function add(array $data = []): Quote
    {
        $data['code'] = Str::code('QUOTE', $this->table, null, 5);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Quote::create($data);
    }

    public function clone(array $data, Quote $quote): Quote
    {
        $data['code'] = Str::code('QUOTE', $this->table, null, 5);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Quote::create($data);
    }

    public function edit(Quote $quote, $data): Quote
    {
        $quote->update($data);
        $quote->refresh();

        return $quote;
    }

    public function active(Quote $quote): Quote
    {
        $quote->is_active = ! $quote->is_active;
        $quote->save();
        $quote->refresh();

        return $quote;
    }

    public function delete(Quote $quote): bool
    {
        return $quote->delete();
    }

    public function deleteAll(array $quotes = []): bool
    {
        return Quote::when($quotes, fn ($q) => $q->whereIn('id', $quotes))->delete();
    }

    public function restore(Quote $quote): bool
    {
        return $quote->restore();
    }

    public function restoreAll(array $quotes = []): bool
    {
        return Quote::when($quotes, fn ($q) => $q->whereIn('id', $quotes))->onlyTrashed()->restore();
    }

    public function deletePermanent(Quote $quote): bool
    {
        return $quote->forceDelete();
    }

    public function deletePermanentAll(array $quotes = []): bool
    {
        return Quote::when($quotes, fn ($q) => $q->whereIn('id', $quotes))->onlyTrashed()->forceDelete();
    }
}
