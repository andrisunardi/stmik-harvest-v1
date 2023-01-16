<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoryFactory extends Factory
{
    public $table = 'blog_categories';

    public $slug = 'blog-category';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $name = fake()->unique()->sentence();

        $slug = Str::slug($name);

        return [
            'name' => $name,
            'name_idn' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'description_idn' => fake()->paragraph(),
            'slug' => $slug,
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
