<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Gallery;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        return [
            "category" => $this->faker->numberBetween(1, 3),
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "tag" => $this->faker->sentence(),
            "tag_id" => $this->faker->sentence(),
            "image" => $this->faker->imageUrl(),
            "video" => $this->faker->imageUrl(),
            "youtube" => $this->faker->imageUrl(),
            "active" => $this->faker->boolean(),
        ];
    }
}
