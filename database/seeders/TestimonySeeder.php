<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Testimony;

class TestimonySeeder extends Seeder
{
    public function run()
    {
        $data = new Testimony();
        $data->study_program_id = 3;
        $data->name = "Adri Prematura Wicaksono";
        $data->description = "Di Harvest, saya diperkenankan untuk belajar dengan dan dari berbagi sumber, tidak terbatas hanya dalam gedung institusi namun juga di dalam praktek kontribusi lapangan dan masyarakat.";
        $data->graduate = "Program Studi Musik Gerejawi - S1 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Testimony();
        $data->study_program_id = 2;
        $data->name = "Rosy Renita Bunga";
        $data->description = "Di kampus ini saya sangat di bantu dalam mengenali dan mengembangkan potensi diri saya dan kemantapan hati dalam meresponi panggilan Tuhan, serta kami diberikan pengetahuan dan praktek mengenai Kepemimpinan dan Misi oleh para dosen-dosen yang berkualitas, sehingga ketika lulus kami siap untuk menjangkau jiwa-jiwa dan menjadi pemimpin di Indonesia dan sampai ke bangsa-bangsa.";
        $data->graduate = "Program Studi Pendidikan Agama Kristen - S1 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Testimony();
        $data->study_program_id = 1;
        $data->name = "Lorenzo Samuel Tahulending";
        $data->description = "HITS adalah kampus yang tepat untuk membentuk pemahaman teologi yang benar, nilai kebersaman dalam sebuah keluarga serta menumbuhkan karakter kepemimpinan yang baik dalam sebuah organisasi baik diluar maupun di dalam sebuah gereja.";
        $data->graduate = "Program Studi Teologi - S1 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Testimony();
        $data->study_program_id = 4;
        $data->name = "Bontot Tanka";
        $data->description = "Di STTI Harvest saya belajar bagaimana untuk menjadi hamba Tuhan, Pemimpin dan kawan sekerja Allah, dimana kami dipersiapkan juga untuk mengahadapi tantangan-tantangan yang akan dihadapi gereja di masa yang akan datang.";
        $data->graduate = "Program S2 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Testimony();
        $data->study_program_id = 4;
        $data->name = "Asima Rohana Nadeak";
        $data->description = "Para dosen di kampus HITS memperlengkapi kami bukan sekedar knowledge tetapi dengan spiritual juga dimana sebagi hamba Tuhan kami harus tetap memiliki relationship yang intim dengan Tuhan. Teman-teman di kampus dari berbagai interdenominasi menjadi berkat buat saya secara pribadi untuk belajar bersama dan saling support.";
        $data->graduate = "Program S2 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Testimony();
        $data->study_program_id = 5;
        $data->name = "Joni Aries Bangun";
        $data->description = "Karakter, ciri dan cara mengajar atau beradaptasi dosen-dosen, teman-teman di kelas, para staf pendukung serta materi yang diajarkan atau didiskusikan dan hal yang dibicarakan sangat memperkaya pemahaman dan pengalaman saya atas makna hidup ini yang pada akhirnya akan menjadi lembaran baru pengetahuan, kenangan dan sejarah hidup saya.";
        $data->graduate = "Program Doktoral - S3 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Testimony();
        $data->study_program_id = 5;
        $data->name = "Bangun Tobing";
        $data->description = "Di kampus ini sungguh menyenangkan dan memberkati pekerjan juga pelayanan saya dengan metode dan materi perkuliahan yang sesuai dengan kebutuhan saat ini, persaudaraan dan kepedulian antar mahasiswa terjalin dengan sangat baik serta didukung para dosen yang mau melayani dan mengajar dengan penuh kasih.";
        $data->graduate = "Program Doktoral - S3 HITS";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
    }
}
