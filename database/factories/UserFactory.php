<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public $table = 'users';

    public $slug = 'user';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $name = fake()->unique()->name();

        $image = Str::slug($name).'.png';

        File::copy(
            public_path('images/image.png'),
            public_path("images/{$this->slug}/{$image}"),
        );

        return [
            'name' => $name,
            'email' => fake()->unique()->freeEmail(),
            'password' => Hash::make(12345678),
            'image' => $image,
            'remember_token' => Str::random(10),
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
