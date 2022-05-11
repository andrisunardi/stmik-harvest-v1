<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CourseLecturer;

class CourseLecturerSeeder extends Seeder
{
    public function run()
    {
        // Dr. Jimmy Boaz Oentoro
            $data = new CourseLecturer();
            $data->course_id = 247;
            $data->lecturer_id = 1;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 245;
            $data->lecturer_id = 1;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 217;
            $data->lecturer_id = 1;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 237;
            $data->lecturer_id = 1;
            $data->save();
        // Dr. Jimmy Boaz Oentoro

        // Dr. Frans H.M Silalahi, M.H.
            $data = new CourseLecturer();
            $data->course_id = 65;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 134;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 205;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 221;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 243;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 239;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 226;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 248;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 257;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 236;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 244;
            $data->lecturer_id = 2;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 256;
            $data->lecturer_id = 2;
            $data->save();
        // Dr. Frans H.M Silalahi, M.H.

        // Dr. Arnold Tindas
            $data = new CourseLecturer();
            $data->course_id = 253;
            $data->lecturer_id = 9;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 252;
            $data->lecturer_id = 9;
            $data->save();
        // Dr. Arnold Tindas

        // Prof.Ir. Vicky VJ Panelewen, M.Sc., Ph.D.
            $data = new CourseLecturer();
            $data->course_id = 219;
            $data->lecturer_id = 11;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 238;
            $data->lecturer_id = 11;
            $data->save();
        // Prof.Ir. Vicky VJ Panelewen, M.Sc., Ph.D.

        // Prof. Dr. Margaretha A Liwoso, Su.
            $data = new CourseLecturer();
            $data->course_id = 242;
            $data->lecturer_id = 14;
            $data->save();
        // Prof. Dr. Margaretha A Liwoso, Su.

        // Dr. Cicilia Gunawan
            $data = new CourseLecturer();
            $data->course_id = 241;
            $data->lecturer_id = 8;
            $data->save();
        // Dr. Cicilia Gunawan

        // Dr. Joni Aries Bangun, M.H.
            $data = new CourseLecturer();
            $data->course_id = 223;
            $data->lecturer_id = 12;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 246;
            $data->lecturer_id = 12;
            $data->save();

            $data = new CourseLecturer();
            $data->course_id = 240;
            $data->lecturer_id = 12;
            $data->save();
        // Dr. Joni Aries Bangun, M.H.
    }
}
