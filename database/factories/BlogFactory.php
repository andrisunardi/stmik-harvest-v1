<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    public $table = 'blogs';

    public $slug = 'blog';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        BlogCategory::first() ?? BlogCategory::factory()->create();

        $title = fake()->unique()->sentence();

        $slug = Str::slug($title);

        $image = "{$slug}.png";

        File::copy(
            public_path('images/image.png'),
            public_path("images/{$this->slug}/{$image}"),
        );

        return [
            'blog_category_id' => BlogCategory::get()->random()->id,
            'title' => $title,
            'title_idn' => $title,
            'short_body' => fake()->paragraph(2),
            'short_body_idn' => fake()->paragraph(2),
            'body' => fake()->paragraph(),
            'body_idn' => fake()->paragraph(),
            'image' => $image,
            'date' => fake()->date(),
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
