<?php

namespace App\Services;

use App\Models\PortfolioDislike;
use Illuminate\Support\Facades\DB;

class PortfolioDislikeService
{
    public $table = 'portfolio_dislikes';

    public function add(array $data = []): PortfolioDislike
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioDislike::create($data);
    }

    public function clone(array $data, PortfolioDislike $portfolioDislike): PortfolioDislike
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioDislike::create($data);
    }

    public function edit(PortfolioDislike $portfolioDislike, $data): PortfolioDislike
    {
        $portfolioDislike->update($data);
        $portfolioDislike->refresh();

        return $portfolioDislike;
    }

    public function active(PortfolioDislike $portfolioDislike): PortfolioDislike
    {
        $portfolioDislike->is_active = ! $portfolioDislike->is_active;
        $portfolioDislike->save();
        $portfolioDislike->refresh();

        return $portfolioDislike;
    }

    public function delete(PortfolioDislike $portfolioDislike): bool
    {
        return $portfolioDislike->delete();
    }

    public function deleteAll(array $portfolioDislikes = []): bool
    {
        return PortfolioDislike::when($portfolioDislikes, fn ($q) => $q->whereIn('id', $portfolioDislikes))->delete();
    }

    public function restore(PortfolioDislike $portfolioDislike): bool
    {
        return $portfolioDislike->restore();
    }

    public function restoreAll(array $portfolioDislikes = []): bool
    {
        return PortfolioDislike::when($portfolioDislikes, fn ($q) => $q->whereIn('id', $portfolioDislikes))->onlyTrashed()->restore();
    }

    public function deletePermanent(PortfolioDislike $portfolioDislike): bool
    {
        return $portfolioDislike->forceDelete();
    }

    public function deletePermanentAll(array $portfolioDislikes = []): bool
    {
        return PortfolioDislike::when($portfolioDislikes, fn ($q) => $q->whereIn('id', $portfolioDislikes))->onlyTrashed()->forceDelete();
    }
}
