<?php

namespace Database\Factories;

use App\Models\AdvertisementProvider;
use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuyAdvertisementFactory extends Factory
{
    public $table = 'buy_advertisements';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        AdvertisementProvider::first() ?? AdvertisementProvider::factory()->create();

        Bank::first() ?? Bank::factory()->create();

        $dateTime = fake()->dateTime();

        $code = Str::code('BUYADS', $this->table, $dateTime, 3);

        $image = $code.'.png';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        return [
            'code' => $code,
            'advertisement_provider_id' => AdvertisementProvider::get()->random()->id,
            'bank_id' => Bank::get()->random()->id,
            'account_number' => fake()->numberBetween(),
            'account_name' => fake()->name(),
            'amount' => fake()->numberBetween(0, 9999999999),
            'image' => $image,
            'datetime' => $dateTime,
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
