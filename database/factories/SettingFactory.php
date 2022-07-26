<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'sms' => 0 .$this->faker->numberBetween(80000000000, 89999999999),
            'call' => 0 .$this->faker->numberBetween(80000000000, 89999999999),
            'fax' => 0 .$this->faker->numberBetween(80000000000, 89999999999),
            'whatsapp' => 0 .$this->faker->numberBetween(80000000000, 89999999999),
            'email' => $this->faker->unique()->email(),
            'address' => $this->faker->unique()->address(),
            'google_maps' => $this->faker->url(),
            'google_maps_iframe' => $this->faker->url(),
            'about_us' => $this->faker->paragraph(),
            'about_us_id' => $this->faker->paragraph(),
            'vision' => $this->faker->paragraph(),
            'vision_id' => $this->faker->paragraph(),
            'mission' => $this->faker->paragraph(),
            'mission_id' => $this->faker->paragraph(),
            'history' => $this->faker->paragraph(),
            'history_id' => $this->faker->paragraph(),
            'active' => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['active' => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ['active' => false]);
    }
}
