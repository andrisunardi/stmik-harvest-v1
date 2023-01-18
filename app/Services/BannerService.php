<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerService
{
    public $table = 'banners';

    public $slug = 'banner';

    public function add(array $data = []): Banner
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Banner::create($data);
    }

    public function clone(array $data, Banner $banner): Banner
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($banner->checkImage()) {
                $data['image'] = "{$imageName}.".explode('.', $banner->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$banner->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Banner::create($data);
    }

    public function edit(Banner $banner, $data): Banner
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $banner->deleteImage();

            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $banner->update($data);
        $banner->refresh();

        return $banner;
    }

    public function active(Banner $banner): Banner
    {
        $banner->is_active = ! $banner->is_active;
        $banner->save();
        $banner->refresh();

        return $banner;
    }

    public function delete(Banner $banner): bool
    {
        return $banner->delete();
    }

    public function deleteAll(array $banners = []): bool
    {
        return Banner::when($banners, fn ($q) => $q->whereIn('id', $banners))->delete();
    }

    public function restore(Banner $banner): bool
    {
        return $banner->restore();
    }

    public function restoreAll(array $banners = []): bool
    {
        return Banner::when($banners, fn ($q) => $q->whereIn('id', $banners))->onlyTrashed()->restore();
    }

    public function deletePermanent(Banner $banner): bool
    {
        $banner->deleteFile();

        return $banner->forceDelete();
    }

    public function deletePermanentAll(array $banners = []): bool
    {
        $banners = Banner::when($banners, fn ($q) => $q->whereIn('id', $banners))->onlyTrashed()->get();

        foreach ($banners as $banner) {
            $banner->deleteFile();
            $banner->forceDelete();
        }

        return true;
    }
}
