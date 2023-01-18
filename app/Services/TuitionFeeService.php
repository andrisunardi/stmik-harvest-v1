<?php

namespace App\Services;

use App\Models\TuitionFee;
use Illuminate\Support\Facades\DB;

class TuitionFeeService
{
    public $table = 'tuition_fees';

    public $slug = 'tuition-fee';

    public function add(array $data = []): TuitionFee
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return TuitionFee::create($data);
    }

    public function clone(array $data, TuitionFee $tuitionFee): TuitionFee
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return TuitionFee::create($data);
    }

    public function edit(TuitionFee $tuitionFee, $data): TuitionFee
    {
        $tuitionFee->update($data);
        $tuitionFee->refresh();

        return $tuitionFee;
    }

    public function active(TuitionFee $tuitionFee): TuitionFee
    {
        $tuitionFee->is_active = ! $tuitionFee->is_active;
        $tuitionFee->save();
        $tuitionFee->refresh();

        return $tuitionFee;
    }

    public function delete(TuitionFee $tuitionFee): bool
    {
        return $tuitionFee->delete();
    }

    public function deleteAll(array $tuitionFees = []): bool
    {
        return TuitionFee::when($tuitionFees, fn ($q) => $q->whereIn('id', $tuitionFees))->delete();
    }

    public function restore(TuitionFee $tuitionFee): bool
    {
        return $tuitionFee->restore();
    }

    public function restoreAll(array $tuitionFees = []): bool
    {
        return TuitionFee::when($tuitionFees, fn ($q) => $q->whereIn('id', $tuitionFees))->onlyTrashed()->restore();
    }

    public function deletePermanent(TuitionFee $tuitionFee): bool
    {
        return $tuitionFee->forceDelete();
    }

    public function deletePermanentAll(array $tuitionFees = []): bool
    {
        return TuitionFee::when($tuitionFees, fn ($q) => $q->whereIn('id', $tuitionFees))->onlyTrashed()->forceDelete();
    }
}
