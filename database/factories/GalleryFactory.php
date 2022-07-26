<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::kebab(Str::substr($this->model, 11)).'/'.Str::slug($name).'.png'),
        );

        return [
            'name' => $name,
            'name_id' => $this->faker->unique()->sentence(),
            'description' => $this->faker->paragraph(),
            'description_id' => $this->faker->paragraph(),
            'tag' => $this->faker->sentence(),
            'tag_id' => $this->faker->sentence(),
            'image' => Str::slug($name).'.png',
            'active' => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['active' => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ['active' => false]);
    }

    public function image()
    {
        return $this->state(fn ($attributes) => ['category' => 1]);
    }

    public function video()
    {
        return $this->state(function (array $attributes) {
            File::copy(
                public_path('videos/video.mp4'),
                public_path('videos/'.Str::kebab(Str::substr($this->model, 11)).'/'.Str::slug($attributes['name']).'.mp4'),
            );

            return [
                'category' => 2,
                'video' => Str::slug($attributes['name']).'.mp4',
            ];
        });
    }

    public function youtube()
    {
        return $this->state(fn ($attributes) => [
            'category' => 3,
            'youtube' => 'https://www.youtube.com/'.$this->faker->word(),
        ]);
    }
}
