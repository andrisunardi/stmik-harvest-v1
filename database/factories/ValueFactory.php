<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Value;

class ValueFactory extends Factory
{
    protected $model = Value::class;

    public function definition()
    {
        return [
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "icon" => $this->faker->word(),
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
