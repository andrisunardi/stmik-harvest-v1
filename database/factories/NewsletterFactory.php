<?php

namespace Database\Factories;

use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsletterFactory extends Factory
{
    protected $model = Newsletter::class;

    public function definition()
    {
        return [
            "email" => $this->faker->unique()->email(),
            "active" => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ["active" => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ["active" => false]);
    }
}
