<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Registration;

class RegistrationFactory extends Factory
{
    protected $model = Registration::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "phone" => $this->faker->phoneNumber(),
            "gender" => $this->faker->numberBetween(1, 2),
            "school" => $this->faker->word(),
            "major" => $this->faker->word(),
            "city" => $this->faker->city(),
            "type" => $this->faker->numberBetween(1, 2),
            "active" => $this->faker->boolean(),
        ];
    }
}
