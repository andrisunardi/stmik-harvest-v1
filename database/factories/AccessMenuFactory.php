<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\AccessMenu;
use App\Models\Access;
use App\Models\Menu;

class AccessMenuFactory extends Factory
{
    protected $model = AccessMenu::class;

    public function definition()
    {
        Access::first() ?? Access::factory()->create();

        Menu::first() ?? Menu::factory()->create();

        return [
            "access_id" => Access::get()->random()->id,
            "menu_id" => Menu::get()->random()->id,
            "view" => $this->faker->boolean(),
            "add" => $this->faker->boolean(),
            "edit" => $this->faker->boolean(),
            "delete" => $this->faker->boolean(),
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
