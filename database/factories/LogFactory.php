<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    protected $model = Log::class;

    public function definition()
    {
        Admin::first() ?? Admin::factory()->create();

        Menu::first() ?? Menu::factory()->create();

        return [
            "admin_id" => Admin::get()->random()->id,
            "menu_id" => Menu::get()->random()->id,
            "row" => null,
            "activity" => null,
            "active" => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ["active" => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ["active" => false]);
    }

    public function created()
    {
        return $this->state(fn ($attributes) => ["activity" => 1]);
    }

    public function updated()
    {
        return $this->state(fn ($attributes) => ["activity" => 2]);
    }

    public function deleted()
    {
        return $this->state(fn ($attributes) => ["activity" => 3]);
    }

    public function restored()
    {
        return $this->state(fn ($attributes) => ["activity" => 4]);
    }

    public function deletePermanent()
    {
        return $this->state(fn ($attributes) => ["activity" => 5]);
    }
}
