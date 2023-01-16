<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NetworkFactory extends Factory
{
    public $table = 'networks';

    public $slug = 'network';

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
            'description' => fake()->paragraph(),
            'link' => fake()->url(),
            'image' => $image,
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
