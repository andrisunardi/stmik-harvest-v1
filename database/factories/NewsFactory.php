<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\News;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        $name = $this->faker->sentence();

        return [
            "name" => $name,
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "date" => $this->faker->date(),
            "image" => $this->faker->imageUrl(),
            "slug" => Str::slug($name),
            "active" => $this->faker->boolean(),
        ];
    }
}
