<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BankBcaFactory extends Factory
{
    public $table = 'bank_bcas';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        $code = Str::code('BANKBCA', $this->table, null, 3);

        $file = $code.'.pdf';

        File::copy(
            public_path('files/file.pdf'),
            public_path('files/'.Str::singular(Str::slug($this->table)).'/'.$file),
        );

        return [
            'code' => $code,
            'name' => fake()->sentence(),
            'file' => $file,
            'date' => fake()->date(),
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
