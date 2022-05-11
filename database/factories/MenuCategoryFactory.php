<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\MenuCategory;

class MenuCategoryFactory extends Factory
{
    protected $model = MenuCategory::class;

    public function definition()
    {
        return [
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "icon" => $this->faker->name(),
            "sort" => $this->faker->randomNumber(),
            "active" => $this->faker->boolean(),
        ];
    }
}
