<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\StudyProgram;

class StudyProgramSeeder extends Seeder
{
    public function run()
    {
        $data = new StudyProgram();
        $data->study_program_category_id = 1;
        $data->name = "Bachelor of Theology";
        $data->name_id = "Sarjana Teologi";
        $data->description = "Dalam kamus Bahasa Indonesia W.J.S. Poerwardamita arti kata teologi pengetahuan tentang Tuhan, dasar-dasar kepercayaan kepada Tuhan dan agama berdasarkan pada kitab-kitab Suci. Selanjutnya dalam kamus filsafat di sebutkan teologi secara sederhana yaitu suatu studi engenai pertayaan tentang Tuhan dan hubungannya dengan dunia realitas. Dalam pengertian yang lebih luas, teologi merupkan salah satu cabang dari filsafat atau bidang khusus inquiri filosofi tentnag Tuhan.";
        $data->description_id = "Dalam kamus Bahasa Indonesia W.J.S. Poerwardamita arti kata teologi pengetahuan tentang Tuhan, dasar-dasar kepercayaan kepada Tuhan dan agama berdasarkan pada kitab-kitab Suci. Selanjutnya dalam kamus filsafat di sebutkan teologi secara sederhana yaitu suatu studi engenai pertayaan tentang Tuhan dan hubungannya dengan dunia realitas. Dalam pengertian yang lebih luas, teologi merupkan salah satu cabang dari filsafat atau bidang khusus inquiri filosofi tentnag Tuhan.";
        $data->vision = "Terwujudnya program studi teologi kependetaan yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.";
        $data->vision_id = "Terwujudnya program studi teologi kependetaan yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.";
        $data->mission = "A. Mewujudkan pendidikan teologi kependetaan yang unggul dalam berteologi.<br>B. Meningkatkan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas.<br>C. Membina Mahasiswa dalam melayani gereja dan masyarakat.";
        $data->mission_id = "A.Mewujudkan pendidikan teologi kependetaan yang unggul dalam berteologi.<br>B.Meningkatkan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas.<br>C. Membina Mahasiswa dalam melayani gereja dan masyarakat.";
        $data->degree = "S.Th";
        $data->duration = 8;
        $data->price = "Only Rp. 399.000/month*";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new StudyProgram();
        $data->study_program_category_id = 1;
        $data->name = "Bachelor of Christian Education";
        $data->name_id = "Sarjana Pendidikan Kristen";
        $data->description = null;
        $data->description_id = null;
        $data->vision = "Terwujudnya program studi PAK yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.";
        $data->vision_id = "Terwujudnya program studi PAK yang unggul dalam menghasilkan teolog, misionaris, pendeta dan pemimpin transformastif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi terbaik di Asia Tenggara tahun 2030.";
        $data->mission = "Menyelenggarakan Pendidikan Agama Kristen yang transformative dalam perspektif Alkitabiah untuk menghasilkan tenaga pendidik agama Kristen yang berkarakter ilahi, berkompeten dan mampu merespon tantangan pendidikan masa depan.<br>Melakukan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat global.<br>Melaksanakan kegiatan pengabdian yang membawa perubahan positif di gereja dan masyarakat.";
        $data->mission_id = "Menyelenggarakan Pendidikan Agama Kristen yang transformative dalam perspektif Alkitabiah untuk menghasilkan tenaga pendidik agama Kristen yang berkarakter ilahi, berkompeten dan mampu merespon tantangan pendidikan masa depan.<br>Melakukan kegiatan penelitian sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat global.<br>Melaksanakan kegiatan pengabdian yang membawa perubahan positif di gereja dan masyarakat.";
        $data->degree = "S.Pd";
        $data->duration = 8;
        $data->price = "Only Rp. 399.000/month*";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new StudyProgram();
        $data->study_program_category_id = 1;
        $data->name = "Bachelor of Church Music";
        $data->name_id = "Sarjana Musik Gereja";
        $data->description = null;
        $data->description_id = null;
        $data->vision = "Terwujudnya program studi music Gerejawi yang unggul dalam bidang musical dan ekstramusikal di Indonesia tahun 2015 dan Asia Tenggara tahun 2030.";
        $data->vision_id = "Terwujudnya program studi music Gerejawi yang unggul dalam bidang musical dan ekstramusikal di Indonesia tahun 2015 dan Asia Tenggara tahun 2030.";
        $data->mission = "Menyelenggarakan pendidikan dengan konsentrasi pada music gerejawi yang memadukan music tradisional dan modern.<br>Menyelenggarakan penelitian dan pengembangan music gerejawi dalam rangka berkontribusi terhadap pengembangan masyarakat.<br>Menyelenggarakan pengabdian di gereja dan masyarakat dalam lingkup nasional dan internasional melalui music gerejawi yang transformastif";
        $data->mission_id = "Menyelenggarakan pendidikan dengan konsentrasi pada music gerejawi yang memadukan music tradisional dan modern.<br>Menyelenggarakan penelitian dan pengembangan music gerejawi dalam rangka berkontribusi terhadap pengembangan masyarakat.<br>Menyelenggarakan pengabdian di gereja dan masyarakat dalam lingkup nasional dan internasional melalui music gerejawi yang transformastif";
        $data->degree = "S.Sn";
        $data->duration = 8;
        $data->price = "Only Rp. 399.000/month*";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new StudyProgram();
        $data->study_program_category_id = 2;
        $data->name = "Master of Theology in Christian Leadership";
        $data->name_id = "Magister Teologi dalam Kepemimpinan Kristen";
        // $data->description = "Mempersiapkan pemimpin yang memiliki semangat dan jiwa transformasi melalui pendidikan.<br>Master of Arts (M.A) in Christian Leadership.<br>Master of Theology (M.Th) in Christian Leadership.";
        // $data->description_id = "Mempersiapkan pemimpin yang memiliki semangat dan jiwa transformasi melalui pendidikan.<br>Master of Arts (M.A) in Christian Leadership.<br>Master of Theology (M.Th) in Christian Leadership.";
        $data->description = "Mempersiapkan pemimpin yang memiliki semangat dan jiwa transformasi melalui pendidikan.<br>Master of Theology (M.Th) in Christian Leadership.";
        $data->description_id = "Mempersiapkan pemimpin yang memiliki semangat dan jiwa transformasi melalui pendidikan.<br>Master of Theology (M.Th) in Christian Leadership.";
        $data->vision = "The achievement of the leading Christian Leadership Study Program, in producing transformative, Biblical and global Christian theologians and leaders in Indonesia in 2030 and becoming one of the best Christian Leadership Study Programs in Southeast Asia by 2050.";
        $data->vision_id = "Tercapainya Program Studi Kepemimpinan Kristen yang terdepan, dalam menghasilkan teolog dan pemimpin Kristen yang transformative, berwawasan Alkitabiah dan global di Indonesia tahun 2030 dan menjadi salah satu Program Studi Kepemimpinan Kristen yang terbaik di Asia Tenggara tahun 2050.";
        $data->mission = "1. Organizing a transformative learning process in the field of Christian Leadership with a Biblical perspective to produce Christian leaders with divine character, competent and able to respond to various challenges in society in the future.<br><br>2. Conduct research activities in the field of transformative leadership, so as to create quality research results that are beneficial to the Indonesian people and globally.<br><br>3. Carry out community service activities that bring positive changes in the midst of the church and Indonesian society.";
        $data->mission_id = "1. Menyelenggarakan proses pembelajaran yang transformatif dalam bidang Kepemimpinan Kristen dengan perspektif Alkitabiah untuk menghasilkan pemimpin Kristen yang berkarakter Ilahi, berkompeten dan mampu merespon berbagai tantangan dalam masyarakat di masa depan.<br><br>2. Melakukan kegiatan penelitian dalam bidang kepemimpinan transformatif, sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat Indonesia dan global.<br><br>3. Melaksanakan kegiatan pengabdian pada masyarakat yang membawa perubahan positif di tengah-tengah gereja dan masyarakat Indonesia.";
        $data->degree = "M.Th";
        $data->duration = 3;
        $data->price = "Only Rp. 1.299.000/month*";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new StudyProgram();
        $data->study_program_category_id = 3;
        $data->name = "Doctor of Theology in Transformation Leadership";
        $data->name_id = "Doktor Teologi dalam Kepemimpinan Transformasi";
        // $data->description = "Gelar : Doctor of Ministry (D.Min) in Leadership & Transformation<br>Doctor of Theology (D.Th) in Leadership & Transformation";
        // $data->description_id = "Gelar : Doctor of Ministry (D.Min) in Leadership & Transformation<br>Doctor of Theology (D.Th) in Leadership & Transformation";
        $data->description = "Gelar : Doctor of Theology (D.Th) in Leadership & Transformation";
        $data->description_id = "Gelar : Doctor of Theology (D.Th) in Leadership & Transformation";
        // $data->vision = "Terciptanya program studi Doktor Teologi Kepemimpinan Kristen yang terdepan dalam menghasilkan teolog dan pemimpin transformatif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi salah satu dari 10 Program Studi Doktor Teologi yang terbaik di Asia Tenggara tahun 2030.";
        // $data->vision_id = "Terciptanya program studi Doktor Teologi Kepemimpinan Kristen yang terdepan dalam menghasilkan teolog dan pemimpin transformatif yang berwawasan Alkitabiah dan global di Indonesia tahun 2015 dan menjadi salah satu dari 10 Program Studi Doktor Teologi yang terbaik di Asia Tenggara tahun 2030.";
        // $data->mission = "Menyelenggarakan proses pembelajaran yang transformatif dalam bidang kepemimpinan Kristen dengan perspektif Alkitabiah untuk menghasilkan pemimpin Kristen yang berkarakter Ilahi, berkompeten dan mampu merespon berbagai tantangan  dalam masyarakat di masa depan.<br>Melakukan kegiatan penelitian dalam bidang kepemimpinan transformatif, sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat Indonesia dan global.<br>Melaksanakan kegiatan pengabdian pada masyarakat yang membawa perubahan positif di tengah-tengah gereja dan masyarakat Indonesia";
        // $data->mission_id = "Menyelenggarakan proses pembelajaran yang transformatif dalam bidang kepemimpinan Kristen dengan perspektif Alkitabiah untuk menghasilkan pemimpin Kristen yang berkarakter Ilahi, berkompeten dan mampu merespon berbagai tantangan  dalam masyarakat di masa depan.<br>Melakukan kegiatan penelitian dalam bidang kepemimpinan transformatif, sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat Indonesia dan global.<br>Melaksanakan kegiatan pengabdian pada masyarakat yang membawa perubahan positif di tengah-tengah gereja dan masyarakat Indonesia";
        $data->vision = "The achievement of the Theology Doctoral Study Program in the field of Christian Leadership which is at the forefront, in producing theologians and transformative leaders with Biblical and global perspectives in Indonesia in 2030 and becoming one of the best Theology Doctoral Study Programs in Leadership in Southeast Asia in 2050.";
        $data->vision_id = "Tercapainya Program Studi Doktor Teologi dalam bidang Kepemimpinan Kristen yang terdepan, dalam menghasilkan teolog dan pemimpin transformatif yang berwawasan Alkitabiah dan global di Indonesia tahun 2030 dan menjadi salah satu Program Studi Doktor Teologi bidang Kepemimpinan yang terbaik di Asia Tenggara tahun 2050.";
        $data->mission = "1. Organizing a transformative learning process in the field of Christian Leadership with a Biblical perspective to produce Christian leaders with divine character, competent and able to respond to various challenges in society in the future.<br><br>2. Conduct research activities in the field of transformative leadership, so as to create quality research results that are beneficial to the Indonesian people and globally.<br><br>3. Carry out community service activities that bring positive changes in the midst of the church and Indonesian society.";
        $data->mission_id = "1. Menyelenggarakan proses pembelajaran yang transformatif dalam bidang Kepemimpinan Kristen dengan perspektif Alkitabiah untuk menghasilkan pemimpin Kristen yang berkarakter Ilahi, berkompeten dan mampu merespon berbagai tantangan dalam masyarakat di masa depan.<br><br>2. Melakukan kegiatan penelitian dalam bidang kepemimpinan transformatif, sehingga tercipta hasil penelitian yang berkualitas dan bermanfaat bagi masyarakat Indonesia dan global.<br><br>3. Melaksanakan kegiatan pengabdian pada masyarakat yang membawa perubahan positif di tengah-tengah gereja dan masyarakat Indonesia.";
        $data->degree = "D.Th";
        $data->duration = 3;
        $data->price = "Only Rp. 2.599.000/month*";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
