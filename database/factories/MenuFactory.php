<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Menu;
use App\Models\MenuCategory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        MenuCategory::first() ?? MenuCategory::factory()->create();

        return [
            "admin_id" => MenuCategory::get()->random()->id,
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "icon" => $this->faker->name(),
            "sort" => $this->faker->randomNumber(),
            "active" => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                "active" => true,
            ];
        });
    }
}
