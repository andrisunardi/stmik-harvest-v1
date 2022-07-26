<?php

namespace Database\Factories;

use App\Models\Access;
use App\Models\AccessMenu;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessMenuFactory extends Factory
{
    protected $model = AccessMenu::class;

    public function definition()
    {
        Access::first() ?? Access::factory()->create();

        Menu::first() ?? Menu::factory()->create();

        return [
            'access_id' => Access::get()->random()->id,
            'menu_id' => Menu::get()->random()->id,
            'view' => $this->faker->boolean(),
            'add' => $this->faker->boolean(),
            'edit' => $this->faker->boolean(),
            'delete' => $this->faker->boolean(),
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

    public function addTrue()
    {
        return $this->state(fn ($attributes) => ['add' => true]);
    }

    public function addFalse()
    {
        return $this->state(fn ($attributes) => ['add' => false]);
    }

    public function editTrue()
    {
        return $this->state(fn ($attributes) => ['edit' => true]);
    }

    public function editFalse()
    {
        return $this->state(fn ($attributes) => ['edit' => false]);
    }

    public function deleteTrue()
    {
        return $this->state(fn ($attributes) => ['delete' => true]);
    }

    public function deleteFalse()
    {
        return $this->state(fn ($attributes) => ['delete' => false]);
    }
}
