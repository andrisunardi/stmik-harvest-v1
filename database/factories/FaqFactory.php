<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class FaqFactory extends Factory
{
    public $table = 'faqs';

    public $slug = 'faq';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return [
            'question' => fake()->sentence(),
            'question_idn' => fake()->sentence(),
            'answer' => fake()->paragraph(),
            'answer_idn' => fake()->paragraph(),
            'is_active' => fake()->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['is_active' => true]);
    }

    public function inActive()
    {
        return $this->state(fn ($attributes) => ['is_active' => false]);
    }
}
