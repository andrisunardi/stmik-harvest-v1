<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Team;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "job" => $this->faker->word(),
            "facebook" => $this->faker->url(),
            "twitter" => $this->faker->url(),
            "instagram" => $this->faker->url(),
            "linkedin" => $this->faker->url(),
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
