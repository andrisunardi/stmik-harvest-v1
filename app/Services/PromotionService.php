<?php

namespace App\Services;

use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PromotionService
{
    public $table = 'promotions';

    public $slug = 'promotion';

    public function add(array $data = []): Promotion
    {
        $data['code'] = Str::code('PROMOTION', $this->table, null, 6);
        $data['start'] = "{$data['start_date']} {$data['start_time']}";
        $data['end'] = "{$data['end_date']} {$data['end_time']}";
        $data['slug'] = Str::slug($data['name']);

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Promotion::create($data);
    }

    public function clone(array $data, Promotion $promotion): Promotion
    {
        $data['code'] = Str::code('PROMOTION', $this->table, null, 6);
        $data['start'] = "{$data['start_date']} {$data['start_time']}";
        $data['end'] = "{$data['end_date']} {$data['end_time']}";
        $data['slug'] = Str::slug($data['name']);

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($promotion->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $promotion->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$promotion->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Promotion::create($data);
    }

    public function edit(Promotion $promotion, $data): Promotion
    {
        $data['start'] = "{$data['start_date']} {$data['start_time']}";
        $data['end'] = "{$data['end_date']} {$data['end_time']}";
        $data['slug'] = Str::slug($data['name']);

        $image = $data['image'];

        if ($image) {
            $promotion->deleteImage();

            $data['image'] = "{$promotion->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $promotion->update($data);
        $promotion->refresh();

        return $promotion;
    }

    public function active(Promotion $promotion): Promotion
    {
        $promotion->is_active = ! $promotion->is_active;
        $promotion->save();
        $promotion->refresh();

        return $promotion;
    }

    public function delete(Promotion $promotion): bool
    {
        return $promotion->delete();
    }

    public function deleteAll(array $promotions = []): bool
    {
        return Promotion::when($promotions, fn ($q) => $q->whereIn('id', $promotions))->delete();
    }

    public function restore(Promotion $promotion): bool
    {
        return $promotion->restore();
    }

    public function restoreAll(array $promotions = []): bool
    {
        return Promotion::when($promotions, fn ($q) => $q->whereIn('id', $promotions))->onlyTrashed()->restore();
    }

    public function deletePermanent(Promotion $promotion): bool
    {
        return $promotion->forceDelete();
    }

    public function deletePermanentAll(array $promotions = []): bool
    {
        return Promotion::when($promotions, fn ($q) => $q->whereIn('id', $promotions))->onlyTrashed()->forceDelete();
    }
}
