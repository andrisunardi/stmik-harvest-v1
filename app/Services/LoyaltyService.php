<?php

namespace App\Services;

use App\Models\Loyalty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LoyaltyService
{
    public $table = 'loyalties';

    public $slug = 'loyalty';

    public function add(array $data = []): Loyalty
    {
        $data['code'] = Str::code('LOYALTY', $this->table, $data['date'], 2);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Loyalty::create($data);
    }

    public function clone(array $data, Loyalty $loyalty): Loyalty
    {
        $data['code'] = Str::code('LOYALTY', $this->table, $data['date'], 2);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($loyalty->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $loyalty->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$loyalty->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Loyalty::create($data);
    }

    public function edit(Loyalty $loyalty, $data): Loyalty
    {
        if ($loyalty->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('LOYALTY', $this->table, $data['date'], 2);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $loyalty->deleteImage();

            $data['image'] = "{$loyalty->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $loyalty->update($data);
        $loyalty->refresh();

        return $loyalty;
    }

    public function active(Loyalty $loyalty): Loyalty
    {
        $loyalty->is_active = ! $loyalty->is_active;
        $loyalty->save();
        $loyalty->refresh();

        return $loyalty;
    }

    public function delete(Loyalty $loyalty): bool
    {
        $loyalty->deleteImage();

        return $loyalty->delete();
    }

    public function deleteAll(array $loyalties = []): bool
    {
        return Loyalty::when($loyalties, fn ($q) => $q->whereIn('id', $loyalties))->delete();
    }

    public function restore(Loyalty $loyalty): bool
    {
        return $loyalty->restore();
    }

    public function restoreAll(array $loyalties = []): bool
    {
        return Loyalty::when($loyalties, fn ($q) => $q->whereIn('id', $loyalties))->onlyTrashed()->restore();
    }

    public function deletePermanent(Loyalty $loyalty): bool
    {
        return $loyalty->forceDelete();
    }

    public function deletePermanentAll(array $loyalties = []): bool
    {
        $loyalties = Loyalty::when($loyalties, fn ($q) => $q->whereIn('id', $loyalties))->onlyTrashed()->get();

        foreach ($loyalties as $loyalty) {
            $loyalty->deleteImage();
            $loyalty->forceDelete();
        }

        return true;
    }
}
