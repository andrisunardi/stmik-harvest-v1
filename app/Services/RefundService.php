<?php

namespace App\Services;

use App\Models\Refund;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RefundService
{
    public $table = 'refunds';

    public function add(array $data = []): Refund
    {
        $data['code'] = Str::code('REFUND', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Refund::create($data);
    }

    public function clone(array $data, Refund $refund): Refund
    {
        $data['code'] = Str::code('REFUND', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Refund::create($data);
    }

    public function edit(Refund $refund, $data): Refund
    {
        if ($refund->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('REFUND', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $refund->update($data);
        $refund->refresh();

        return $refund;
    }

    public function active(Refund $refund): Refund
    {
        $refund->is_active = ! $refund->is_active;
        $refund->save();
        $refund->refresh();

        return $refund;
    }

    public function delete(Refund $refund): bool
    {
        return $refund->delete();
    }

    public function deleteAll(array $refunds = []): bool
    {
        return Refund::when($refunds, fn ($q) => $q->whereIn('id', $refunds))->delete();
    }

    public function restore(Refund $refund): bool
    {
        return $refund->restore();
    }

    public function restoreAll(array $refunds = []): bool
    {
        return Refund::when($refunds, fn ($q) => $q->whereIn('id', $refunds))->onlyTrashed()->restore();
    }

    public function deletePermanent(Refund $refund): bool
    {
        return $refund->forceDelete();
    }

    public function deletePermanentAll(array $refunds = []): bool
    {
        return Refund::when($refunds, fn ($q) => $q->whereIn('id', $refunds))->onlyTrashed()->forceDelete();
    }
}
