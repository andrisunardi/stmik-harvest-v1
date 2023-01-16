<?php

namespace App\Services;

use App\Models\PortfolioLike;
use Illuminate\Support\Facades\DB;

class PortfolioLikeService
{
    public $table = 'portfolio_likes';

    public function add(array $data = []): PortfolioLike
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioLike::create($data);
    }

    public function clone(array $data, PortfolioLike $portfolioLike): PortfolioLike
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioLike::create($data);
    }

    public function edit(PortfolioLike $portfolioLike, $data): PortfolioLike
    {
        $portfolioLike->update($data);
        $portfolioLike->refresh();

        return $portfolioLike;
    }

    public function active(PortfolioLike $portfolioLike): PortfolioLike
    {
        $portfolioLike->is_active = ! $portfolioLike->is_active;
        $portfolioLike->save();
        $portfolioLike->refresh();

        return $portfolioLike;
    }

    public function delete(PortfolioLike $portfolioLike): bool
    {
        return $portfolioLike->delete();
    }

    public function deleteAll(array $portfolioLikes = []): bool
    {
        return PortfolioLike::when($portfolioLikes, fn ($q) => $q->whereIn('id', $portfolioLikes))->delete();
    }

    public function restore(PortfolioLike $portfolioLike): bool
    {
        return $portfolioLike->restore();
    }

    public function restoreAll(array $portfolioLikes = []): bool
    {
        return PortfolioLike::when($portfolioLikes, fn ($q) => $q->whereIn('id', $portfolioLikes))->onlyTrashed()->restore();
    }

    public function deletePermanent(PortfolioLike $portfolioLike): bool
    {
        return $portfolioLike->forceDelete();
    }

    public function deletePermanentAll(array $portfolioLikes = []): bool
    {
        return PortfolioLike::when($portfolioLikes, fn ($q) => $q->whereIn('id', $portfolioLikes))->onlyTrashed()->forceDelete();
    }
}
