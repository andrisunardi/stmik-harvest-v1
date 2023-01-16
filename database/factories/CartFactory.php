<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CartFactory extends Factory
{
    public $table = 'carts';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        User::first() ?? User::factory()->create();

        Product::first() ?? Product::factory()->create();

        return [
            'user_id' => User::get()->random()->id,
            'product_id' => Product::get()->random()->id,
            'quantity' => fake()->numberBetween(0, 99),
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
