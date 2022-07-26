<?php

namespace Database\Factories;

use App\Models\Network;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NetworkFactory extends Factory
{
    protected $model = Network::class;

    public function definition()
    {
        $name = $this->faker->unique()->company();

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::kebab(Str::substr($this->model, 11)).'/'.Str::slug($name).'.png'),
        );

        return [
            'name' => $name,
            'description' => $this->faker->paragraph(),
            'link' => $this->faker->url(),
            'image' => Str::slug($name).'.png',
            'active' => $this->faker->boolean(),
        ];
    }

    public function active()
    {
        return $this->state(fn ($attributes) => ['active' => true]);
    }

    public function nonActive()
    {
        return $this->state(fn ($attributes) => ['active' => false]);
    }
}
