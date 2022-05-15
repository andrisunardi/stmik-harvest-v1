<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Procedure;

class ProcedureFactory extends Factory
{
    protected $model = Procedure::class;

    public function definition()
    {
        return [
            "name" => $this->faker->sentence(),
            "name_id" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "active" => $this->faker->boolean(),
        ];
    }
}
