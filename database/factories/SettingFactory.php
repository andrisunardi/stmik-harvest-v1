<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Setting;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            "sms" => $this->faker->phoneNumber(),
            "call" => $this->faker->phoneNumber(),
            "fax" => $this->faker->phoneNumber(),
            "whatsapp" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "address" => $this->faker->sentence(),
            "google_maps" => $this->faker->url(),
            "google_maps_iframe" => $this->faker->url(),
            "about_us" => $this->faker->paragraph(),
            "about_us_id" => $this->faker->paragraph(),
            "vision" => $this->faker->paragraph(),
            "vision_id" => $this->faker->paragraph(),
            "mission" => $this->faker->paragraph(),
            "mission_id" => $this->faker->paragraph(),
            "history" => $this->faker->paragraph(),
            "history_id" => $this->faker->paragraph(),
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
