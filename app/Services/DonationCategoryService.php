<?php

namespace App\Services;

use App\Models\DonationCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DonationCategoryService
{
    public $table = 'donation_categories';

    public function add(array $data = []): DonationCategory
    {
        $data['code'] = Str::code('DNCAT', $this->table, null, 5);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return DonationCategory::create($data);
    }

    public function clone(array $data, DonationCategory $donationCategory): DonationCategory
    {
        $data['code'] = Str::code('DNCAT', $this->table, null, 5);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return DonationCategory::create($data);
    }

    public function edit(DonationCategory $donationCategory, $data): DonationCategory
    {
        $donationCategory->update($data);
        $donationCategory->refresh();

        return $donationCategory;
    }

    public function active(DonationCategory $donationCategory): DonationCategory
    {
        $donationCategory->is_active = ! $donationCategory->is_active;
        $donationCategory->save();
        $donationCategory->refresh();

        return $donationCategory;
    }

    public function delete(DonationCategory $donationCategory): bool
    {
        return $donationCategory->delete();
    }

    public function deleteAll(array $donationCategories = []): bool
    {
        return DonationCategory::when($donationCategories, fn ($q) => $q->whereIn('id', $donationCategories))->delete();
    }

    public function restore(DonationCategory $donationCategory): bool
    {
        return $donationCategory->restore();
    }

    public function restoreAll(array $donationCategories = []): bool
    {
        return DonationCategory::when($donationCategories, fn ($q) => $q->whereIn('id', $donationCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(DonationCategory $donationCategory): bool
    {
        return $donationCategory->forceDelete();
    }

    public function deletePermanentAll(array $donationCategories = []): bool
    {
        return DonationCategory::when($donationCategories, fn ($q) => $q->whereIn('id', $donationCategories))->onlyTrashed()->forceDelete();
    }
}
