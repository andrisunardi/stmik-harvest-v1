<?php

namespace Database\Factories;

use App\Models\MenuCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuCategoryFactory extends Factory
{
    protected $model = MenuCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'name_id' => $this->faker->unique()->sentence(),
            'icon' => 'bi bi-'.$this->faker->word(),
            'sort' => $this->faker->randomNumber(1, 99999999999),
            'active' => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['active' => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ['active' => false]);
    }
}
