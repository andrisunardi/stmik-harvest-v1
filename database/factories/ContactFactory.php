<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'phone' => 0 .$this->faker->unique()->numberBetween(80000000000, 89999999999),
            'email' => $this->faker->unique()->email(),
            'company' => $this->faker->unique()->company(),
            'message' => $this->faker->paragraph(),
            'active' => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['active' => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ['active' => false]);
    }
}
