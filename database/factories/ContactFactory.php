<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ContactFactory extends Factory
{
    public $table = 'contacts';

    public $slug = 'contact';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return [
            'name' => fake()->name(),
            'company' => fake()->company(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
            'subject' => fake()->sentence(),
            'message' => fake()->paragraph(),
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
