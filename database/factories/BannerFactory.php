<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerFactory extends Factory
{
    public $table = 'banners';

    public $slug = 'banner';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $name = fake()->unique()->sentence();

        $image = Str::slug($name).'.png';

        File::copy(
            public_path('images/image.png'),
            public_path("images/{$this->slug}/{$image}"),
        );

        return [
            'name' => $name,
            'name_idn' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'description_idn' => fake()->paragraph(),
            'image' => $image,
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
