<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Offer;

class OfferFactory extends Factory
{
    protected $model = Offer::class;

    public function definition()
    {
        return [
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "button_name" => $this->faker->sentence(),
            "button_name_id" => $this->faker->sentence(),
            "button_link" => $this->faker->url(),
            "active" => $this->faker->boolean(),
        ];
    }
}
