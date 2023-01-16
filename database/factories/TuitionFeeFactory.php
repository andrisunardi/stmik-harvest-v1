<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TuitionFeeFactory extends Factory
{
    public $table = 'tuition_fees';

    public $slug = 'tuition-fee';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return [
            'name' => fake()->sentence(),
            'name_idn' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'description_idn' => fake()->paragraph(),
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
