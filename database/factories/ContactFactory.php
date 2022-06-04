<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "phone" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "company" => $this->faker->name(),
            "message" => $this->faker->paragraph(),
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
