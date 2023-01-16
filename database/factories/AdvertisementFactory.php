<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdvertisementFactory extends Factory
{
    public $table = 'advertisements';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        User::first() ?? User::factory()->create();

        $date = fake()->date();

        $code = Str::code('ADS', $this->table, $date, 3);

        $image = "{$code}.png";

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        return [
            'code' => $code,
            'user_id' => User::get()->random()->id,
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'link' => fake()->url(),
            'image' => $image,
            'date' => $date,
            'duration' => fake()->numberBetween(0, 999),
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
}
