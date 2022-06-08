<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        File::copy(
            public_path() . "/images/image.png",
            public_path() . "/images/" . Str::kebab(Str::substr($this->model, 11)) . "/" . Str::slug($name) . ".png",
        );

        return [
            "name" => $name,
            "name_id" => $this->faker->unique()->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "button_name" => $this->faker->sentence(),
            "button_name_id" => $this->faker->sentence(),
            "button_link" => $this->faker->url(),
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
