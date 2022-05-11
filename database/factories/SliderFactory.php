<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Slider;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition()
    {
        return [
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "sub" => $this->faker->sentence(),
            "sub_id" => $this->faker->sentence(),
            "button_name_1" => $this->faker->sentence(),
            "button_name_1_id" => $this->faker->sentence(),
            "button_link_1" => $this->faker->url(),
            "button_name_2" => $this->faker->sentence(),
            "button_name_2_id" => $this->faker->sentence(),
            "button_link_2" => $this->faker->url(),
            "image" => $this->faker->imageUrl(),
            "active" => $this->faker->boolean(),
        ];
    }
}
