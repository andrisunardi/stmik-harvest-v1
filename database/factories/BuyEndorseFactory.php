<?php

namespace Database\Factories;

use App\Enums\BuyEndorseStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuyEndorseFactory extends Factory
{
    public $table = 'buy_endorses';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        User::first() ?? User::factory()->create();

        $dateTime = fake()->dateTime();

        $code = Str::code('ENDORSE', $this->table, $dateTime, 3);

        $image = $code.'.png';

        $screenshot = $code.'-SCREENSHOT.png';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$screenshot),
        );

        return [
            'code' => $code,
            'user_id' => User::get()->random()->id,
            'status' => fake()->randomElement(BuyEndorseStatus::cases()),
            'social_media' => fake()->url(),
            'link' => fake()->url(),
            'screenshot' => $screenshot,
            'post_at' => fake()->dateTime(),
            'account_number' => fake()->numberBetween(),
            'account_name' => fake()->name(),
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
