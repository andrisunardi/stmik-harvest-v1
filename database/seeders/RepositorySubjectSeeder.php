<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\RepositorySubject;
use App\Models\Repository;
use App\Models\RepositoryFile;
use App\Models\RepositoryContributor;

class RepositorySubjectSeeder extends Seeder
{
    public function run()
    {
        $data = new RepositorySubject();
        $data->repository_subject_id = null;
        $data->name = "Library of Congress Subject Areas";
        $data->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "B Philosophy. Psychology. Religion";
            $data_1->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "BF Psychology";
                $data_2->save();

                $repository = new Repository();
                $repository->repository_subject_id = $data_2->id;
                $repository->study_program_id = 5;
                $repository->user_id = null;
                $repository->status = 1;
                $repository->title = "The Influence of Javanese-Japanese Musical Idiom in the Arrangement of Keroncong Song Bengawan Solo Towards the Audience's Subjective Wellbeing";
                $repository->first_name = "Avi";
                $repository->last_name = "Christian";
                $repository->corporate_author = null;
                $repository->publisher = "Harvest International Theological Seminary";
                $repository->year = 2019;
                $repository->abstract = "Disertasi yang berjudul “Keterlibatan Gereja dalam Pemuridan Mahasiswa di Indonesia diawali dengan kenyataan bahwa mahasiswa merupakan bagian penting dari perkembangan bangsa Indonesia. Pentingnya peran mahasiswa ini seharusnya menjadi fokus bagi pelayanan gereja yang ingin memenangkan dunia bagi Kristus. Gereja perlu menjadi yang terdepan dalam memuridkan mahasiswa di Indonesia.";
                $repository->url = env("APP_URL") . "/repository/" . Str::slug($repository->title);
                $repository->keyword = "kata kunci";
                $repository->page = 238;
                $repository->scholar = null;
                $repository->image = Str::slug($repository->title) . ".png";
                $repository->created_by = 3;
                $repository->updated_by = 3;
                $repository->created_at = "2022-03-25 02:57:00";
                $repository->updated_at = "2022-03-25 02:57:00";
                $repository->slug = Str::slug($repository->title);
                $repository->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "BJ Ethics";
                $data_2->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "BL Religion";
                $data_2->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "BR Christianity";
                $data_2->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "BS The Bible";
                $data_2->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "BV Practical Theology";
                $data_2->save();

                    $data_3 = new RepositorySubject();
                    $data_3->repository_subject_id = $data_2->id;
                    $data_3->name = "BV1460 Religious Education";
                    $data_3->save();

                    $repository = new Repository();
                    $repository->repository_subject_id = $data_3->id;
                    $repository->study_program_id = 5;
                    $repository->user_id = null;
                    $repository->status = 1;
                    $repository->title = "Keterlibatan Gereja Dalam Pemuridan Mahasiswa Di Indonesia";
                    $repository->first_name = "Avi";
                    $repository->last_name = "Christian";
                    $repository->corporate_author = null;
                    $repository->publisher = "Harvest International Theological Seminary";
                    $repository->year = 2019;
                    $repository->abstract = "Disertasi yang berjudul “Keterlibatan Gereja dalam Pemuridan Mahasiswa di Indonesia diawali dengan kenyataan bahwa mahasiswa merupakan bagian penting dari perkembangan bangsa Indonesia. Pentingnya peran mahasiswa ini seharusnya menjadi fokus bagi pelayanan gereja yang ingin memenangkan dunia bagi Kristus. Gereja perlu menjadi yang terdepan dalam memuridkan mahasiswa di Indonesia.";
                    $repository->url = env("APP_URL") . "/repository/" . Str::slug($repository->title);
                    $repository->keyword = "kata kunci";
                    $repository->page = 238;
                    $repository->scholar = null;
                    $repository->image = Str::slug($repository->title) . ".png";
                    $repository->created_by = 3;
                    $repository->updated_by = 3;
                    $repository->created_at = "2022-03-25 02:57:00";
                    $repository->updated_at = "2022-03-25 02:57:00";
                    $repository->slug = Str::slug($repository->title);
                    $repository->save();

                    $data = new RepositoryContributor();
                    $data->repository_id = $repository->id;
                    $data->lecturer_id = 3;
                    $data->code = "Unspecified";
                    $data->role = "Consultant";
                    $data->name = "Runtuwene, Daniel E.";
                    $data->email = "Unspecified";
                    $data->save();

                    $data = new RepositoryContributor();
                    $data->repository_id = $repository->id;
                    $data->lecturer_id = 1;
                    $data->code = "Unspecified";
                    $data->role = "Consultant";
                    $data->name = "Oentoro, Jimmy Boaz";
                    $data->email = "Unspecified";
                    $data->save();

                    $data = new RepositoryContributor();
                    $data->repository_id = $repository->id;
                    $data->lecturer_id = 5;
                    $data->code = "Unspecified";
                    $data->role = "Thesis Advisor";
                    $data->name = "Ersada, Linda Arih";
                    $data->email = "Unspecified";
                    $data->save();

                    $data = new RepositoryContributor();
                    $data->repository_id = $repository->id;
                    $data->lecturer_id = 9;
                    $data->code = "Unspecified";
                    $data->role = "Thesis Advisor";
                    $data->name = "Tindas, Arnold";
                    $data->email = "Unspecified";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Cover, Pengesahan, Abstrak, Daftar Isi, Daftar Pustaka";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Bab I";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Bab II";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Bab III";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Bab IV";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Bab V";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                    $data = new RepositoryFile();
                    $data->repository_id = $repository->id;
                    $data->name = "Lampiran";
                    $data->description = "Available under License Creative Commons Attribution Non-commercial.";
                    $data->public = true;
                    $data->file = Str::slug($data->name) . ".pdf";
                    $data->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data->id;
                $data_2->name = "BX Christian Denominations";
                $data_2->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "K Kepemimpinan";
            $data_1->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "KK Kepemimpinan Kristen";
                $data_2->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "L Education";
            $data_1->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "L Education (General)";
                $data_2->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "M Music and Books on Music";
            $data_1->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "M Music";
                $data_2->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "MT Musical instruction and study";
                $data_2->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "Musik Gerejawi";
            $data_1->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "Pendidikan Agama Kristen";
            $data_1->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "Theology";
            $data_1->save();

            $data_1 = new RepositorySubject();
            $data_1->repository_subject_id = $data->id;
            $data_1->name = "Z Bibliography. Library Science. Information Resources";
            $data_1->save();

                $data_2 = new RepositorySubject();
                $data_2->repository_subject_id = $data_1->id;
                $data_2->name = "ZA Information resources";
                $data_2->save();

                    $data_3 = new RepositorySubject();
                    $data_3->repository_subject_id = $data_2->id;
                    $data_3->name = "ZA4050 Electronic information resources";
                    $data_3->save();
    }
}
