<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsentFactory extends Factory
{
    public $table = 'absents';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        User::first() ?? User::factory()->create();

        $dateTime = fake()->dateTime();

        return [
            'code' => Str::code('ABSENT', $this->table, $dateTime, 3),
            'user_id' => User::get()->random()->id,
            'name' => fake()->sentence(),
            'datetime' => $dateTime,
            'duration' => fake()->numberBetween(0, 999),
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
