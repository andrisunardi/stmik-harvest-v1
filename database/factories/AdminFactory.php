<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Access;
use App\Models\Admin;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        Access::first() ?? Access::factory()->create();

        return [
            "access_id" => Access::get()->random()->id,
            "name" => $this->faker->name(),
            "email" => $this->faker->unique()->safeEmail(),
            "username" => $this->faker->username(),
            "password" => $this->faker->password(),
            "image" => $this->faker->imageUrl(),
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
