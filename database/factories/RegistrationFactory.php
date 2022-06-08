<?php

namespace Database\Factories;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    protected $model = Registration::class;

    public function definition()
    {
        return [
            "name" => $this->faker->unique()->name(),
            "email" => $this->faker->unique()->email(),
            "phone" => 0 . $this->faker->unique()->numberBetween(80000000000, 89999999999),
            "gender" => $this->faker->numberBetween(1, 2),
            "school" => $this->faker->word(),
            "major" => $this->faker->word(),
            "city" => $this->faker->city(),
            "type" => $this->faker->numberBetween(1, 2),
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

    public function nonActive()
    {
        return $this->state(function (array $attributes) {
            return [
                "active" => false,
            ];
        });
    }

    public function man()
    {
        return $this->state(function (array $attributes) {
            return [
                "gender" => 1,
            ];
        });
    }

    public function woman()
    {
        return $this->state(function (array $attributes) {
            return [
                "gender" => 2,
            ];
        });
    }

    public function typeOne()
    {
        return $this->state(function (array $attributes) {
            return [
                "type" => 1,
            ];
        });
    }

    public function typeTwo()
    {
        return $this->state(function (array $attributes) {
            return [
                "type" => 2,
            ];
        });
    }
}
