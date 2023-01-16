<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\InternetProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuyInternetFactory extends Factory
{
    public $table = 'buy_internets';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        InternetProvider::first() ?? InternetProvider::factory()->create();

        Bank::first() ?? Bank::factory()->create();

        $code = Str::code('BUYINTERNET', $this->table, null, 4);

        $image = $code.'.png';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        return [
            'code' => $code,
            'internet_provider_id' => InternetProvider::get()->random()->id,
            'bank_id' => Bank::get()->random()->id,
            'account_number' => fake()->numberBetween(),
            'account_name' => fake()->name(),
            'amount' => fake()->numberBetween(0, 9999999999),
            'image' => $image,
            'datetime' => fake()->dateTime(),
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
