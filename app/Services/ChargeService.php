<?php

namespace App\Services;

use App\Models\Charge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ChargeService
{
    public $table = 'charges';

    public $slug = 'charge';

    public function add(array $data = []): Charge
    {
        $data['code'] = Str::code('CHARGE', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        if (! $data['payment_id']) {
            unset($data['payment_id']);
        }

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Charge::create($data);
    }

    public function clone(array $data, Charge $charge): Charge
    {
        $data['code'] = Str::code('CHARGE', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        if (! $data['payment_id']) {
            unset($data['payment_id']);
        }

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($charge->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $charge->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$charge->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Charge::create($data);
    }

    public function edit(Charge $charge, $data): Charge
    {
        if ($charge->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('CHARGE', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        if (! $data['payment_id']) {
            unset($data['payment_id']);
        }

        $image = $data['image'];

        if ($image) {
            $charge->deleteImage();

            $data['image'] = "{$charge->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $charge->update($data);
        $charge->refresh();

        return $charge;
    }

    public function active(Charge $charge): Charge
    {
        $charge->is_active = ! $charge->is_active;
        $charge->save();
        $charge->refresh();

        return $charge;
    }

    public function delete(Charge $charge): bool
    {
        return $charge->delete();
    }

    public function deleteAll(array $charges = []): bool
    {
        return Charge::when($charges, fn ($q) => $q->whereIn('id', $charges))->delete();
    }

    public function restore(Charge $charge): bool
    {
        return $charge->restore();
    }

    public function restoreAll(array $charges = []): bool
    {
        return Charge::when($charges, fn ($q) => $q->whereIn('id', $charges))->onlyTrashed()->restore();
    }

    public function deletePermanent(Charge $charge): bool
    {
        return $charge->forceDelete();
    }

    public function deletePermanentAll(array $charges = []): bool
    {
        return Charge::when($charges, fn ($q) => $q->whereIn('id', $charges))->onlyTrashed()->forceDelete();
    }
}
