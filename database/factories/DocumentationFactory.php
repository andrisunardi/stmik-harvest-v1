<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DocumentationFactory extends Factory
{
    public $table = 'documentations';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $code = Str::code('DOC', $this->table, null, 7);

        $image = Str::slug($code).'.png';

        $video = Str::slug($code).'.mp4';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        File::copy(
            public_path('videos/video.mp4'),
            public_path('videos/'.Str::singular(Str::slug($this->table)).'/'.$video),
        );

        return [
            'code' => $code,
            'name' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'at' => fake()->address(),
            'image' => $image,
            'video' => $video,
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
