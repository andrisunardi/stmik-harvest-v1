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
            "active" => $this->faker->boolean(),
        ];
    }
}
