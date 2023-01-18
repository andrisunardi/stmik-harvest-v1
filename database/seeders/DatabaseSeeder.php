<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            AdmissionCalendarSeeder::class,
            BannerSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            ContactSeeder::class,
            EventCategorySeeder::class,
            EventSeeder::class,
            FaqSeeder::class,
            GallerySeeder::class,
            NetworkSeeder::class,
            NewsletterSeeder::class,
            OfferSeeder::class,
            ProcedureSeeder::class,
            RegistrationSeeder::class,
            SettingSeeder::class,
            SliderSeeder::class,
            TestimonySeeder::class,
            TuitionFeeSeeder::class,
            ValueSeeder::class,
        ]);
    }
}
