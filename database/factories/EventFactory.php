<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Event;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        $name = $this->faker->sentence();

        return [
            "name" => $name,
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "location" => $this->faker->address(),
            "start" => $this->faker->dateTime(),
            "end" => $this->faker->dateTime(),
            "image" => $this->faker->imageUrl(),
            "slug" => Str::slug($name),
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
}
