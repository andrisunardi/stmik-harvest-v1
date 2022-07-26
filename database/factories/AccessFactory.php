<?php

namespace Database\Factories;

use App\Models\Access;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessFactory extends Factory
{
    protected $model = Access::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->jobTitle(),
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
