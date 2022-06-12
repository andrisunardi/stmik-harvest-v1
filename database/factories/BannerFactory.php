<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition()
    {
        $name = $this->faker->unique()->name();

        File::copy(
            public_path() . "/images/image.png",
            public_path() . "/images/" . Str::kebab(Str::substr($this->model, 11)) . "/" . Str::slug($name) . ".png",
        );

        return [
            "name" => $name,
            "name_id" => $this->faker->name(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
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
