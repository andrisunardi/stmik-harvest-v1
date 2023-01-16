<?php

namespace Database\Factories;

use App\Enums\RegistrationGender;
use App\Enums\RegistrationType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class RegistrationFactory extends Factory
{
    public $table = 'registrations';

    public $slug = 'registration';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return [
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->freeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'gender' => fake()->randomElement(RegistrationGender::cases()),
            'school' => fake()->word(),
            'major' => fake()->word(),
            'city' => fake()->city(),
            'type' => fake()->randomElement(RegistrationType::cases()),
            'is_active' => fake()->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['is_active' => true]);
    }

    public function inActive()
    {
        return $this->state(fn ($attributes) => ['is_active' => false]);
    }

    public function man()
    {
        return $this->state(fn ($attributes) => ['gender' => RegistrationGender::Man]);
    }

    public function woman()
    {
        return $this->state(fn ($attributes) => ['gender' => RegistrationGender::Woman]);
    }

    public function morning()
    {
        return $this->state(fn ($attributes) => ['type' => RegistrationType::Morning]);
    }

    public function evening()
    {
        return $this->state(fn ($attributes) => ['type' => RegistrationType::Evening]);
    }
}
