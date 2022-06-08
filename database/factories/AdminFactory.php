<?php

namespace Database\Factories;

use App\Models\Access;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        Access::first() ?? Access::factory()->create();

        $name = $this->faker->unique()->name();

        File::copy(
            public_path() . "/images/image.png",
            public_path() . "/images/" . Str::kebab(Str::substr($this->model, 11)) . "/" . Str::slug($name) . ".png",
        );

        return [
            "access_id" => Access::get()->random()->id,
            "name" => $name,
            "email" => $this->faker->unique()->email(),
            "username" => $this->faker->unique()->username(),
            "password" => $this->faker->password(),
            "image" => Str::slug($name) . ".png",
            "active" => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                "active" => true,
            ];
        });
    }

    public function nonActive()
    {
        return $this->state(function (array $attributes) {
            return [
                "active" => false,
            ];
        });
    }
}
