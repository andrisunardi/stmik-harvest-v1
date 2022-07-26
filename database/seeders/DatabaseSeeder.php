<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);

        Schema::disableForeignKeyConstraints();

        $this->call([
            MenuCategorySeeder::class,
            MenuSeeder::class,

            RoleSeeder::class,
            AccessSeeder::class,
            AccessMenuSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,

            SettingSeeder::class,
            LogSeeder::class,

            RegistrationSeeder::class,
            ContactSeeder::class,
            NewsletterSeeder::class,

            BlogCategorySeeder::class,
            BlogSeeder::class,

            EventCategorySeeder::class,
            EventSeeder::class,

            AdmissionCalendarSeeder::class,
            BannerSeeder::class,
            FaqSeeder::class,
            GallerySeeder::class,
            NetworkSeeder::class,
            OfferSeeder::class,
            ProcedureSeeder::class,
            SliderSeeder::class,
            TestimonySeeder::class,
            TuitionFeeSeeder::class,
            ValueSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
