<?php

namespace App\Services;

use App\Models\Testimony;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonyService
{
    public $table = 'testimonies';

    public $slug = 'testimony';

    public function add(array $data = []): Testimony
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Testimony::create($data);
    }

    public function clone(array $data, Testimony $testimony): Testimony
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($testimony->checkImage()) {
                $data['image'] = "{$imageName}.".File::extension($testimony->image);

                File::copy(
                    public_path("images/{$this->slug}/{$testimony->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Testimony::create($data);
    }

    public function edit(Testimony $testimony, $data): Testimony
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $testimony->deleteImage();

            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($testimony->checkImage()) {
                $data['image'] = "{$imageName}.".File::extension($testimony->image);

                File::move(
                    public_path("images/{$this->slug}/{$testimony->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        $testimony->update($data);
        $testimony->refresh();

        return $testimony;
    }

    public function active(Testimony $testimony): Testimony
    {
        $testimony->is_active = ! $testimony->is_active;
        $testimony->save();
        $testimony->refresh();

        return $testimony;
    }

    public function deleteImage(Testimony $testimony)
    {
        $testimony->deleteImage();

        $testimony->image = null;
        $testimony->save();
        $testimony->refresh();

        return $testimony;
    }

    public function delete(Testimony $testimony): bool
    {
        return $testimony->delete();
    }

    public function deleteAll(array $testimonies = []): bool
    {
        return Testimony::when($testimonies, fn ($q) => $q->whereIn('id', $testimonies))->delete();
    }

    public function restore(Testimony $testimony): bool
    {
        return $testimony->restore();
    }

    public function restoreAll(array $testimonies = []): bool
    {
        return Testimony::when($testimonies, fn ($q) => $q->whereIn('id', $testimonies))->onlyTrashed()->restore();
    }

    public function deletePermanent(Testimony $testimony): bool
    {
        $testimony->deleteImage();

        return $testimony->forceDelete();
    }

    public function deletePermanentAll(array $testimonies = []): bool
    {
        $testimonies = Testimony::when($testimonies, fn ($q) => $q->whereIn('id', $testimonies))->onlyTrashed()->get();

        foreach ($testimonies as $testimony) {
            $testimony->deleteImage();
            $testimony->forceDelete();
        }

        return true;
    }
}
