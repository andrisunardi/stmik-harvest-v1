<?php

namespace Database\Factories;

use App\Enums\CareerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CareerFactory extends Factory
{
    public $table = 'careers';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return [
            'code' => Str::code('CAREER', $this->table, null, 4),
            'status' => fake()->randomElement(CareerStatus::cases()),
            'name' => fake()->sentence(),
            'name_idn' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'description_idn' => fake()->paragraph(),
            'location' => fake()->address(),
            'location_idn' => fake()->address(),
            'department' => fake()->jobTitle(),
            'department_idn' => fake()->jobTitle(),
            'datetime' => fake()->dateTime(),
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
