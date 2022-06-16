<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        MenuCategory::first() ?? MenuCategory::factory()->create();

        return [
            "admin_id" => MenuCategory::get()->random()->id,
            "name" => $this->faker->unique()->sentence(),
            "name_id" => $this->faker->unique()->sentence(),
            "icon" => "bi bi-" . $this->faker->word(),
            "sort" => $this->faker->randomNumber(1, 999999999),
            "active" => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ["active" => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ["active" => false]);
    }
}
