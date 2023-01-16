<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuyPlnTokenFactory extends Factory
{
    public $table = 'buy_pln_tokens';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $dateTime = fake()->dateTime();

        $code = Str::code('PLNTOKEN', $this->table, $dateTime, 1);

        $image = $code.'.png';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        return [
            'code' => $code,
            'no_meter' => fake()->numberBetween(0, 9999999999),
            'no_token' => fake()->numberBetween(0, 9999999999),
            'amount' => fake()->numberBetween(0, 9999999999),
            'image' => $image,
            'datetime' => $dateTime,
            'notes' => fake()->paragraph(),
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
