<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioService
{
    public $table = 'portfolio';

    public function add(array $data = []): Portfolio
    {
        $data['code'] = Str::code('PORTFOLIO', $this->table, null, 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Portfolio::create($data);
    }

    public function clone(array $data, Portfolio $portfolio): Portfolio
    {
        $data['code'] = Str::code('PORTFOLIO', $this->table, null, 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Portfolio::create($data);
    }

    public function edit(Portfolio $portfolio, $data): Portfolio
    {
        $portfolio->update($data);
        $portfolio->refresh();

        return $portfolio;
    }

    public function active(Portfolio $portfolio): Portfolio
    {
        $portfolio->is_active = ! $portfolio->is_active;
        $portfolio->save();
        $portfolio->refresh();

        return $portfolio;
    }

    public function delete(Portfolio $portfolio): bool
    {
        return $portfolio->delete();
    }

    public function deleteAll(array $portfolios = []): bool
    {
        return Portfolio::when($portfolios, fn ($q) => $q->whereIn('id', $portfolios))->delete();
    }

    public function restore(Portfolio $portfolio): bool
    {
        return $portfolio->restore();
    }

    public function restoreAll(array $portfolios = []): bool
    {
        return Portfolio::when($portfolios, fn ($q) => $q->whereIn('id', $portfolios))->onlyTrashed()->restore();
    }

    public function deletePermanent(Portfolio $portfolio): bool
    {
        return $portfolio->forceDelete();
    }

    public function deletePermanentAll(array $portfolios = []): bool
    {
        return Portfolio::when($portfolios, fn ($q) => $q->whereIn('id', $portfolios))->onlyTrashed()->forceDelete();
    }
}
