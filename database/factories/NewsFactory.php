<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    public $table = 'news';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        NewsCategory::first() ?? NewsCategory::factory()->create();

        $title = fake()->unique()->sentence();

        $image = Str::slug($title).'.png';

        $video = Str::slug($title).'.mp4';

        $dateTime = fake()->dateTime();

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        File::copy(
            public_path('videos/video.mp4'),
            public_path('videos/'.Str::singular(Str::slug($this->table)).'/'.$video),
        );

        return [
            'code' => Str::code('NEWS', $this->table, $dateTime, 3),
            'news_category_id' => NewsCategory::get()->random()->id,
            'title' => $title,
            'title_idn' => $title,
            'short_body' => fake()->paragraph(2),
            'short_body_idn' => fake()->paragraph(2),
            'body' => fake()->paragraph(),
            'body_idn' => fake()->paragraph(),
            'image' => $image,
            'video' => $video,
            'link' => fake()->url(),
            'datetime' => $dateTime,
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
