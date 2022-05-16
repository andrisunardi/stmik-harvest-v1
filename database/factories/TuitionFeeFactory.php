<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\TuitionFee;

class TuitionFeeFactory extends Factory
{
    protected $model = TuitionFee::class;

    public function definition()
    {
        return [
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "active" => $this->faker->boolean(),
        ];
    }
}
