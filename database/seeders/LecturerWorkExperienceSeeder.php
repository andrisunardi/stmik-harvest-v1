<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\LecturerWorkExperience;
use App\Models\Lecturer;

class LecturerWorkExperienceSeeder extends Seeder
{
    public function run()
    {
        $data_lecturer = Lecturer::all();

        foreach ($data_lecturer as $lecturer) {
            $data = new LecturerWorkExperience();
            $data->lecturer_id = $lecturer->id;
            $data->name = "September 2009 - Lecturer";
            $data->name_id = "September 2009 - Dosen";
            $data->description = "HITS Jakarta";
            $data->description_id = "HITS Jakarta";
            $data->save();

            $data = new LecturerWorkExperience();
            $data->lecturer_id = $lecturer->id;
            $data->name = "December 2012 - Head of Lecturer";
            $data->name_id = "December 2012 - Head of Lecturer";
            $data->description = "HITS Jakarta";
            $data->description_id = "HITS Jakarta";
            $data->save();
        }
    }
}
