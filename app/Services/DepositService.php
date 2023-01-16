<?php

namespace App\Services;

use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DepositService
{
    public $table = 'deposits';

    public $slug = 'deposit';

    public function add(array $data = []): Deposit
    {
        $data['code'] = Str::code('DEPOSIT', $this->table, $data['date'], 2);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Deposit::create($data);
    }

    public function clone(array $data, Deposit $deposit): Deposit
    {
        $data['code'] = Str::code('DEPOSIT', $this->table, $data['date'], 2);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($deposit->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $deposit->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$deposit->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Deposit::create($data);
    }

    public function edit(Deposit $deposit, $data): Deposit
    {
        if ($deposit->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('DEPOSIT', $this->table, $data['date'], 2);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $deposit->deleteImage();

            $data['image'] = "{$deposit->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $deposit->update($data);
        $deposit->refresh();

        return $deposit;
    }

    public function active(Deposit $deposit): Deposit
    {
        $deposit->is_active = ! $deposit->is_active;
        $deposit->save();
        $deposit->refresh();

        return $deposit;
    }

    public function delete(Deposit $deposit): bool
    {
        return $deposit->delete();
    }

    public function deleteAll(array $deposits = []): bool
    {
        return Deposit::when($deposits, fn ($q) => $q->whereIn('id', $deposits))->delete();
    }

    public function restore(Deposit $deposit): bool
    {
        return $deposit->restore();
    }

    public function restoreAll(array $deposits = []): bool
    {
        return Deposit::when($deposits, fn ($q) => $q->whereIn('id', $deposits))->onlyTrashed()->restore();
    }

    public function deletePermanent(Deposit $deposit): bool
    {
        $deposit->deleteImage();

        return $deposit->forceDelete();
    }

    public function deletePermanentAll(array $deposits = []): bool
    {
        $deposits = Deposit::when($deposits, fn ($q) => $q->whereIn('id', $deposits))->onlyTrashed()->get();

        foreach ($deposits as $deposit) {
            $deposit->deleteImage();
            $deposit->forceDelete();
        }

        return true;
    }
}
