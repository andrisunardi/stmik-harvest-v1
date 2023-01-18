<?php

namespace Database\Factories;

use App\Enums\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    public $table = 'events';

    public $slug = 'event';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $name = fake()->unique()->sentence();

        $image = Str::slug($name).'.png';

        File::copy(
            public_path('images/image.png'),
            public_path("images/{$this->slug}/{$image}"),
        );

        return [
            'category' => GalleryCategory::Image,
            'name' => $name,
            'name_idn' => $name,
            'description' => fake()->paragraph(),
            'description_idn' => fake()->paragraph(),
            'tag' => fake()->word(),
            'tag_idn' => fake()->word(),
            'image' => $image,
            'is_active' => fake()->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['is_active' => true]);
    }

    public function inActive()
    {
        return $this->state(fn ($attributes) => ['is_active' => false]);
    }

    public function image()
    {
        return $this->state(fn ($attributes) => ['category' => GalleryCategory::Image]);
    }

    public function video()
    {
        return $this->state(function (array $attributes) {
            $video = Str::slug($attributes['name']).'.mp4';

            File::copy(
                public_path('videos/video.mp4'),
                public_path("videos/{$this->slug}/{$video}"),
            );

            return [
                'category' => GalleryCategory::Video,
                'video' => $video,
            ];
        });
    }

    public function youtube()
    {
        return $this->state(fn ($attributes) => [
            'category' => GalleryCategory::Youtube,
            'youtube' => 'https://www.youtube.com/'.fake()->word(),
        ]);
    }
}
