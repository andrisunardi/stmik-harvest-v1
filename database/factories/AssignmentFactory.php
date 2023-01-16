<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssignmentFactory extends Factory
{
    public $table = 'assignments';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        User::first() ?? User::factory()->create();

        $date = fake()->date();

        return [
            'code' => Str::code('ASSIGNMENT', $this->table, $date, 1),
            'user_id' => User::get()->random()->id,
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'date' => $date,
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
