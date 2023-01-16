<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BankInterestFactory extends Factory
{
    public $table = 'bank_interests';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        Bank::first() ?? Bank::factory()->create();

        return [
            'code' => Str::code('BNKINT', $this->table, null, 4),
            'bank_id' => Bank::get()->random()->id,
            'amount' => fake()->numberBetween(0, 9999999999),
            'tax' => fake()->numberBetween(0, 9999999999),
            'date' => fake()->date(),
            'notes' => fake()->paragraph(),
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
