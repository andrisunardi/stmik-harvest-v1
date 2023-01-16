<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\DomainHostingProvider;
use App\Models\Payment;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuyDomainHostingFactory extends Factory
{
    public $table = 'buy_domain_hostings';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        Portfolio::first() ?? Portfolio::factory()->create();

        DomainHostingProvider::first() ?? DomainHostingProvider::factory()->create();

        Payment::first() ?? Payment::factory()->create();

        Bank::first() ?? Bank::factory()->create();

        $dateTime = fake()->dateTime();

        $code = Str::code('BUYDOHO', $this->table, $dateTime, 3);

        $image = $code.'.png';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image),
        );

        return [
            'code' => $code,
            'portfolio_id' => Portfolio::get()->random()->id,
            'domain_hosting_provider_id' => DomainHostingProvider::get()->random()->id,
            'payment_id' => Payment::get()->random()->id,
            'bank_id' => Bank::get()->random()->id,
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
