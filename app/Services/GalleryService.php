<?php

namespace App\Services;

use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryService
{
    public $table = 'galleries';

    public $slug = 'gallery';

    public function add(array $data = []): Gallery
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        if ($data['category'] == 1) {
            $data['video'] = null;
            $data['youtube'] = null;
        }

        if ($data['category'] == 2) {
            $video = $data['video'];
            $videoName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

            if ($video) {
                $data['video'] = "{$videoName}.{$video->getClientOriginalExtension()}";
                $video->storePubliclyAs($this->slug, $data['video'], 'videos');
            }

            $data['youtube'] = null;
        }

        if ($data['category'] == 3) {
            $data['video'] = null;
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Gallery::create($data);
    }

    public function clone(array $data, Gallery $gallery): Gallery
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($gallery->checkImage()) {
                $data['image'] = "{$imageName}.".explode('.', $gallery->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$gallery->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        if ($data['category'] == 1) {
            $data['video'] = null;
            $data['youtube'] = null;
        }

        if ($data['category'] == 2) {
            $video = $data['video'];
            $videoName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

            if ($video) {
                $data['video'] = "{$videoName}.{$video->getClientOriginalExtension()}";
                $video->storePubliclyAs($this->slug, $data['video'], 'videos');
            } else {
                if ($gallery->checkVideo()) {
                    $data['video'] = "{$videoName}.".explode('.', $gallery->video)[1];

                    File::copy(
                        public_path("videos/{$this->slug}/{$gallery->video}"),
                        public_path("videos/{$this->slug}/{$data['video']}"),
                    );
                }
            }

            $data['youtube'] = null;
        }

        if ($data['category'] == 3) {
            $data['video'] = null;
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Gallery::create($data);
    }

    public function edit(Gallery $gallery, $data): Gallery
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $gallery->deleteImage();

            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        if ($data['category'] == 1) {
            $gallery->deleteVideo();

            $data['video'] = null;
            $data['youtube'] = null;
        }

        if ($data['category'] == 2) {
            $video = $data['video'];
            $videoName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

            if ($video) {
                $gallery->deleteVideo();

                $data['video'] = "{$videoName}.{$video->getClientOriginalExtension()}";
                $video->storePubliclyAs($this->slug, $data['video'], 'videos');
            } else {
                unset($data['video']);
            }

            $data['youtube'] = null;
        }

        if ($data['category'] == 3) {
            $gallery->deleteVideo();

            $data['video'] = null;
        }

        $gallery->update($data);
        $gallery->refresh();

        return $gallery;
    }

    public function active(Gallery $gallery): Gallery
    {
        $gallery->is_active = ! $gallery->is_active;
        $gallery->save();
        $gallery->refresh();

        return $gallery;
    }

    public function deleteImage(Gallery $gallery)
    {
        $gallery->deleteImage();

        $gallery->image = null;
        $gallery->save();
        $gallery->refresh();

        return $gallery;
    }

    public function deleteVideo(Gallery $gallery)
    {
        $gallery->deleteVideo();

        $gallery->image = null;
        $gallery->save();
        $gallery->refresh();

        return $gallery;
    }

    public function delete(Gallery $gallery): bool
    {
        return $gallery->delete();
    }

    public function deleteAll(array $galleries = []): bool
    {
        return Gallery::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->delete();
    }

    public function restore(Gallery $gallery): bool
    {
        return $gallery->restore();
    }

    public function restoreAll(array $galleries = []): bool
    {
        return Gallery::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->restore();
    }

    public function deletePermanent(Gallery $gallery): bool
    {
        $gallery->deleteImage();
        $gallery->deleteVideo();

        return $gallery->forceDelete();
    }

    public function deletePermanentAll(array $galleries = []): bool
    {
        $galleries = Gallery::when($galleries, fn ($q) => $q->whereIn('id', $galleries))->onlyTrashed()->get();

        foreach ($galleries as $gallery) {
            $gallery->deleteImage();
            $gallery->deleteVideo();
            $gallery->forceDelete();
        }

        return true;
    }
}
