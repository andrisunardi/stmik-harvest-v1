<?php

namespace Database\Factories;

use App\Enums\PortfolioStatus;
use App\Models\PortfolioCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfolioFactory extends Factory
{
    public $table = 'portfolios';

    public function definition()
    {
        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        PortfolioCategory::first() ?? PortfolioCategory::factory()->create();

        User::first() ?? User::factory()->create();

        $code = Str::code('PORTFOLIO', $this->table, null, 6);

        $name = fake()->sentence();

        $slug = Str::slug($name);

        $logo = 'logo-'.$slug.'.png';

        // $image1 = $code.'-1.png';

        // $image2 = $code.'-2.png';

        // $image3 = $code.'-3.png';

        // $image4 = $code.'-4.png';

        // $image5 = $code.'-5.png';

        File::copy(
            public_path('images/image.png'),
            public_path('images/'.Str::singular(Str::slug($this->table)).'/logo/'.$logo),
        );

        // File::copy(
        //     public_path('images/image.png'),
        //     public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image1),
        // );

        // File::copy(
        //     public_path('images/image.png'),
        //     public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image2),
        // );

        // File::copy(
        //     public_path('images/image.png'),
        //     public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image3),
        // );

        // File::copy(
        //     public_path('images/image.png'),
        //     public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image4),
        // );

        // File::copy(
        //     public_path('images/image.png'),
        //     public_path('images/'.Str::singular(Str::slug($this->table)).'/'.$image5),
        // );

        return [
            'code' => $code,
            'portfolio_category_id' => PortfolioCategory::get()->random()->id,
            'user_id' => User::get()->random()->id,
            'username_cpanel' => fake()->username(),
            'password_cpanel' => fake()->password(),
            'status' => fake()->randomElement(PortfolioStatus::cases()),
            'name' => $name,
            'description' => fake()->paragraph(),
            'link' => fake()->url(),
            'price' => fake()->numberBetween(0, 9999999999),
            'logo' => $logo,
            // 'image_1' => $image1,
            // 'image_2' => $image2,
            // 'image_3' => $image3,
            // 'image_4' => $image4,
            // 'image_5' => $image5,
            'testimonial' => fake()->paragraph(),
            'source_testimonial' => fake()->paragraph(),
            'datetime' => fake()->dateTime(),
            'expired' => fake()->dateTime(),
            'slug' => $slug,
            'notes' => fake()->paragraph(),
            'is_publish' => fake()->boolean(),
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

    public function publish()
    {
        return $this->state(fn ($attributes) => ['is_publish' => true]);
    }

    public function notPublish()
    {
        return $this->state(fn ($attributes) => ['is_publish' => false]);
    }
}
