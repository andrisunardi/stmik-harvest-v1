<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    public $table = 'blogs';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        BlogCategory::first() ?? BlogCategory::factory()->create();

        User::first() ?? User::factory()->create();

        $title = fake()->unique()->sentence();

        $image = Str::slug($title).'.png';

        $dateTime = fake()->dateTime();

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        return [
            'code' => Str::code('BLOG', $this->table, $dateTime, 5),
            'blog_category_id' => BlogCategory::get()->random()->id,
            'title' => $title,
            'title_idn' => $title,
            'short_body' => fake()->paragraph(2),
            'short_body_idn' => fake()->paragraph(2),
            'body' => fake()->paragraph(),
            'body_idn' => fake()->paragraph(),
            'image' => $image,
            'datetime' => $dateTime,
            'is_active' => fake()->boolean(),
            'slug' => Str::slug($title),
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
