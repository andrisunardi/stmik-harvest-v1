<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Access;

class AccessFactory extends Factory
{
    protected $model = Access::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name(),
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
