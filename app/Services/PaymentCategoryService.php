<?php

namespace App\Services;

use App\Models\PaymentCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentCategoryService
{
    public $table = 'payment_categories';

    public function add(array $data = []): PaymentCategory
    {
        $data['code'] = Str::code('PC', $this->table, null, 8);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PaymentCategory::create($data);
    }

    public function clone(array $data, PaymentCategory $paymentCategory): PaymentCategory
    {
        $data['code'] = Str::code('PC', $this->table, null, 8);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return PaymentCategory::create($data);
    }

    public function edit(PaymentCategory $paymentCategory, $data): PaymentCategory
    {
        $paymentCategory->update($data);
        $paymentCategory->refresh();

        return $paymentCategory;
    }

    public function active(PaymentCategory $paymentCategory): PaymentCategory
    {
        $paymentCategory->is_active = ! $paymentCategory->is_active;
        $paymentCategory->save();
        $paymentCategory->refresh();

        return $paymentCategory;
    }

    public function delete(PaymentCategory $paymentCategory): bool
    {
        return $paymentCategory->delete();
    }

    public function deleteAll(array $paymentCategories = []): bool
    {
        return PaymentCategory::when($paymentCategories, fn ($q) => $q->whereIn('id', $paymentCategories))->delete();
    }

    public function restore(PaymentCategory $paymentCategory): bool
    {
        return $paymentCategory->restore();
    }

    public function restoreAll(array $paymentCategories = []): bool
    {
        return PaymentCategory::when($paymentCategories, fn ($q) => $q->whereIn('id', $paymentCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(PaymentCategory $paymentCategory): bool
    {
        return $paymentCategory->forceDelete();
    }

    public function deletePermanentAll(array $paymentCategories = []): bool
    {
        return PaymentCategory::when($paymentCategories, fn ($q) => $q->whereIn('id', $paymentCategories))->onlyTrashed()->forceDelete();
    }
}
