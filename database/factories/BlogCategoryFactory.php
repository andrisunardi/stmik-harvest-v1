<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogCategoryFactory extends Factory
{
    protected $model = BlogCategory::class;

    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'name_id' => $this->faker->unique()->sentence(),
            'description' => $this->faker->paragraph(),
            'description_id' => $this->faker->paragraph(),
            'slug' => Str::slug($name),
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
