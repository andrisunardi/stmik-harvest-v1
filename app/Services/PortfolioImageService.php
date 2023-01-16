<?php

namespace App\Services;

use App\Models\PortfolioImage;
use Illuminate\Support\Facades\DB;

class PortfolioImageService
{
    public $table = 'portfolio_images';

    public function add(array $data = []): PortfolioImage
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioImage::create($data);
    }

    public function clone(array $data, PortfolioImage $portfolioImage): PortfolioImage
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PortfolioImage::create($data);
    }

    public function edit(PortfolioImage $portfolioImage, $data): PortfolioImage
    {
        $portfolioImage->update($data);
        $portfolioImage->refresh();

        return $portfolioImage;
    }

    public function active(PortfolioImage $portfolioImage): PortfolioImage
    {
        $portfolioImage->is_active = ! $portfolioImage->is_active;
        $portfolioImage->save();
        $portfolioImage->refresh();

        return $portfolioImage;
    }

    public function delete(PortfolioImage $portfolioImage): bool
    {
        return $portfolioImage->delete();
    }

    public function deleteAll(array $portfolioImages = []): bool
    {
        return PortfolioImage::when($portfolioImages, fn ($q) => $q->whereIn('id', $portfolioImages))->delete();
    }

    public function restore(PortfolioImage $portfolioImage): bool
    {
        return $portfolioImage->restore();
    }

    public function restoreAll(array $portfolioImages = []): bool
    {
        return PortfolioImage::when($portfolioImages, fn ($q) => $q->whereIn('id', $portfolioImages))->onlyTrashed()->restore();
    }

    public function deletePermanent(PortfolioImage $portfolioImage): bool
    {
        return $portfolioImage->forceDelete();
    }

    public function deletePermanentAll(array $portfolioImages = []): bool
    {
        return PortfolioImage::when($portfolioImages, fn ($q) => $q->whereIn('id', $portfolioImages))->onlyTrashed()->forceDelete();
    }
}
