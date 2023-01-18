<?php

namespace Database\Factories;

use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    public $table = 'events';

    public $slug = 'event';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        EventCategory::first() ?? EventCategory::factory()->create();

        $title = fake()->unique()->sentence();

        $slug = Str::slug($title);

        $image = "{$slug}.png";

        File::copy(
            public_path('images/image.png'),
            public_path("images/{$this->slug}/{$image}"),
        );

        return [
            'event_category_id' => EventCategory::get()->random()->id,
            'title' => $title,
            'title_idn' => $title,
            'short_body' => fake()->paragraph(2),
            'short_body_idn' => fake()->paragraph(2),
            'body' => fake()->paragraph(),
            'body_idn' => fake()->paragraph(),
            'location' => fake()->address(),
            'start' => fake()->dateTime(),
            'end' => fake()->dateTime(),
            'tag' => fake()->word(),
            'tag_idn' => fake()->word(),
            'image' => $image,
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
