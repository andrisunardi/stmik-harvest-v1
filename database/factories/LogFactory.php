<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Log;
use App\Models\Admin;
use App\Models\Menu;

class LogFactory extends Factory
{
    protected $model = Log::class;

    public function definition()
    {
        Admin::first() ?? Admin::factory()->create();

        Menu::first() ?? Menu::factory()->create();

        return [
            "admin_id" => Admin::get()->random()->id,
            "menu_id" => Menu::get()->random()->id,
            "row" => null,
            "activity" => null,
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
