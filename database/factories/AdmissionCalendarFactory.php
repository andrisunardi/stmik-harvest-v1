<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\AdmissionCalendar;

class AdmissionCalendarFactory extends Factory
{
    protected $model = AdmissionCalendar::class;

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

    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                "active" => true,
            ];
        });
    }
}
