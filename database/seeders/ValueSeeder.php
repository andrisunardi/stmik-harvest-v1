<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Value;

class ValueSeeder extends Seeder
{
    public function run()
    {
        $data = new Value();
        $data->name = "Future Technology";
        $data->name_id = "Future Technology";
        $data->description = "Students will learn about cutting-edge technologies that are needed by the industry in the next 5-10 years, such as Cloud Computing, Mobile Technology, Big Data, Internet of Things, Business Intelligence, etc.";
        $data->description_id = "Mahasiswa akan mempelajari teknologi terdepan yang sangat dibutuhkan industri pada 5-10 tahun mendatang, seperti Cloud Computing, Mobile Technology, Big Data, Internet of Things, Business Intelligence, dll.";
        $data->icon = "flaticon-student";
        $data->save();

        $data = new Value();
        $data->name = "Future Technopreneur";
        $data->name_id = "Future Technopreneur";
        $data->description = "Students will be equipped with the knowledge and skills to become technopreneurs or IT business leaders through the Harvest Start-up Center.";
        $data->description_id = "Mahasiswa akan dibekali dengan pengetahuan dan skill untuk menjadi technopreneur atau pemimpin bisnis TI melalui Harvest Start-up Center.";
        $data->icon = "flaticon-graduation-cap";
        $data->save();

        $data = new Value();
        $data->name = "21st Century Skills";
        $data->name_id = "21st Century Skills";
        $data->description = "Students will be equipped with soft skills that are indispensable for a career, namely Communication, Collaboration, Critical Thinking, Creativity and Innovation Skills.";
        $data->description_id = "Mahasiswa akan diperlengkapi dengan soft skills yang sangat diperlukan untuk berkarir, yaitu Communication, Collaboration, Critical Thinking, Creativity and Innovation Skills.";
        $data->icon = "flaticon-classroom";
        $data->save();

        $data = new Value();
        $data->name = "International Enrichment Program";
        $data->name_id = "International Enrichment Program";
        $data->description = "For students who excel, there are internship opportunities abroad such as in Singapore, Australia, South Korea and the United States.";
        $data->description_id = "Bagi mahasiswa yang berprestasi, tersedia kesempatan magang di luar negeri seperti di Singapore, Australia, Korea Selatan dan Amerika Serikat.";
        $data->icon = "flaticon-graduate-diploma";
        $data->save();
    }
}
