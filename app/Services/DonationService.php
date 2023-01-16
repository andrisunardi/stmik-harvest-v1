<?php

namespace App\Services;

use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DonationService
{
    public $table = 'donations';

    public $slug = 'donation';

    public function add(array $data = []): Donation
    {
        $data['code'] = Str::code('DN', $this->table, $data['date'], 5);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Donation::create($data);
    }

    public function clone(array $data, Donation $donation): Donation
    {
        $data['code'] = Str::code('DN', $this->table, $data['date'], 5);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($donation->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $donation->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$donation->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Donation::create($data);
    }

    public function edit(Donation $donation, $data): Donation
    {
        if ($donation->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('DN', $this->table, $data['date'], 5);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $donation->deleteImage();

            $data['image'] = "{$donation->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $donation->update($data);
        $donation->refresh();

        return $donation;
    }

    public function active(Donation $donation): Donation
    {
        $donation->is_active = ! $donation->is_active;
        $donation->save();
        $donation->refresh();

        return $donation;
    }

    public function delete(Donation $donation): bool
    {
        return $donation->delete();
    }

    public function deleteAll(array $donations = []): bool
    {
        return Donation::when($donations, fn ($q) => $q->whereIn('id', $donations))->delete();
    }

    public function restore(Donation $donation): bool
    {
        return $donation->restore();
    }

    public function restoreAll(array $donations = []): bool
    {
        return Donation::when($donations, fn ($q) => $q->whereIn('id', $donations))->onlyTrashed()->restore();
    }

    public function deletePermanent(Donation $donation): bool
    {
        $donation->deleteImage();

        return $donation->forceDelete();
    }

    public function deletePermanentAll(array $donations = []): bool
    {
        $donations = Donation::when($donations, fn ($q) => $q->whereIn('id', $donations))->onlyTrashed()->get();

        foreach ($donations as $donation) {
            $donation->deleteImage();
            $donation->forceDelete();
        }

        return true;
    }
}
