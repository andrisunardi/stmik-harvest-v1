<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdministrativeCostFactory extends Factory
{
    public $table = 'administrative_costs';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        Bank::first() ?? Bank::factory()->create();

        $code = Str::code('ADMCST', $this->table, null, 4);

        return [
            'code' => $code,
            'bank_id' => Bank::get()->random()->id,
            'amount' => fake()->numberBetween(),
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
