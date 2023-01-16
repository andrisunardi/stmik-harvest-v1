<?php

namespace Database\Factories;

use App\Enums\NewsletterType;
use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class NewsletterFactory extends Factory
{
    public $table = 'newsletters';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        Newsletter::first() ?? Newsletter::factory()->create();

        return [
            'value' => fake()->unique()->freeEmail(),
            'type' => fake()->randomElement(NewsletterType::cases()),
            'is_active' => fake()->boolean(),
        ];
    }

    public function email()
    {
        return $this->state(fn ($attributes) => ['value' => fake()->unique()->freeEmail(), 'type' => NewsletterType::Email]);
    }

    public function whatsapp()
    {
        return $this->state(fn ($attributes) => ['value' => fake()->unique()->phoneNumber(), 'type' => NewsletterType::Whatsapp]);
    }

    public function sms()
    {
        return $this->state(fn ($attributes) => ['value' => fake()->unique()->phoneNumber(), 'type' => NewsletterType::SMS]);
    }

    public function call()
    {
        return $this->state(fn ($attributes) => ['value' => fake()->unique()->phoneNumber(), 'type' => NewsletterType::Call]);
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['is_active' => true]);
    }

    public function inActive()
    {
        return $this->state(fn ($attributes) => ['is_active' => false]);
    }
}
