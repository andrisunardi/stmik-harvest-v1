<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Newsletter;

class NewsletterFactory extends Factory
{
    protected $model = Newsletter::class;

    public function definition()
    {
        return [
            "email" => $this->faker->unique()->safeEmail(),
            "active" => $this->faker->boolean(),
        ];
    }
}
