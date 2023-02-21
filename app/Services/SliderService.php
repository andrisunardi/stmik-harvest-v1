<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderService
{
    public $table = 'sliders';

    public $slug = 'slider';

    public function add(array $data = []): Slider
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Slider::create($data);
    }

    public function clone(array $data, Slider $slider): Slider
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($slider->checkImage()) {
                $data['image'] = "{$imageName}.".explode('.', $slider->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$slider->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Slider::create($data);
    }

    public function edit(Slider $slider, $data): Slider
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $slider->deleteImage();

            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $slider->update($data);
        $slider->refresh();

        return $slider;
    }

    public function active(Slider $slider): Slider
    {
        $slider->is_active = ! $slider->is_active;
        $slider->save();
        $slider->refresh();

        return $slider;
    }

    public function deleteImage(Slider $slider)
    {
        $slider->deleteImage();

        $slider->image = null;
        $slider->save();
        $slider->refresh();

        return $slider;
    }

    public function delete(Slider $slider): bool
    {
        return $slider->delete();
    }

    public function deleteAll(array $sliders = []): bool
    {
        return Slider::when($sliders, fn ($q) => $q->whereIn('id', $sliders))->delete();
    }

    public function restore(Slider $slider): bool
    {
        return $slider->restore();
    }

    public function restoreAll(array $sliders = []): bool
    {
        return Slider::when($sliders, fn ($q) => $q->whereIn('id', $sliders))->onlyTrashed()->restore();
    }

    public function deletePermanent(Slider $slider): bool
    {
        $slider->deleteImage();

        return $slider->forceDelete();
    }

    public function deletePermanentAll(array $sliders = []): bool
    {
        $sliders = Slider::when($sliders, fn ($q) => $q->whereIn('id', $sliders))->onlyTrashed()->get();

        foreach ($sliders as $slider) {
            $slider->deleteImage();
            $slider->forceDelete();
        }

        return true;
    }
}
