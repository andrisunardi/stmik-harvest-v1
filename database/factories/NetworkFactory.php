<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Network;

class NetworkFactory extends Factory
{
    protected $model = Network::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "description" => $this->faker->paragraph(),
            "link" => $this->faker->url(),
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
