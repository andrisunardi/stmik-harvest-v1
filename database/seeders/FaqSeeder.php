<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $data = new Faq();
        $data->faq_category_id = 1;
        $data->name = "How do I register to study at HITS?";
        $data->name_id = "Bagaimana cara mendaftar kuliah di HITS?";
        $data->description = "- Purchase the Registration Form<br>- Collecting Documents such as :<br>- (Certificates, Transcripts, Ktp, Kk, Baptism Letters, Proof of Health, 3x4 and 4x6 sized passport photos.<br>- TOEFL Certificate (For S2 & S3 Registrants)<br>- Doing Written Test & Interview<br>- Announcement of Entrance Test Passing Results<br>- Make Tuition Payments.";
        $data->description_id = "- Membeli Formulir Pendaftaran<br>- Mengumpulkan Dokumen Kelengkapan Seperti :<br>- (Ijasah, Transkrip Nilai, Ktp, Kk, Surat Baptis, Surat Bukti Kesehatan, Pas Foto Ukuran 3x4 Dan 4x6.<br>- Sertifikat Toefl (Bagi Pendaftar S2 & S3)<br>- Melakukan Test Tertulis & Wawancara<br>- Pengumuman Hasil Kelulusan Ujian Test Masuk<br>- Melakukan Pembayaran Uang Kuliah.";
        $data->save();

        $data = new Faq();
        $data->faq_category_id = 2;
        $data->name = "What are the majors at HITS?";
        $data->name_id = "Apa saja jurusan yang ada di HITS?";
        $data->description = "- Bachelor degree :<br>Theology (S.Th) , Christian Religion Teacher Education (S.Pd) , and Church Music (S.Sn)<br><br>- Bachelor of Theology in Christian Leadership<br><br>- Bachelor of Doctor of Theology in Leadership and Transformational<br><br>*Classes offered are Morning Class (Regular) & Evening Class (Executive/Employee)";
        $data->description_id = "- Sarjana S1 :<br>Teologi (S.Th) , Pendidikan Guru Agama Kristen (S.Pd) , dan Musik Gerejawi (S.Sn)<br><br>- Sarjana Master of Theology in Christian Leadership<br><br>- Sarjana S3 Doctor of Theology in Leadership and Transformational<br><br>*Kelas yang ditawarkan ada Kelas Pagi (Reguler) & Kelas Malam (Eksekutif/Karyawan)";
        $data->save();

        $data = new Faq();
        $data->faq_category_id = 3;
        $data->name = "Why Should You Choose to Study at HITS?";
        $data->name_id = "Mengapa harus memilih kuliah di HITS?";
        $data->description = "1) International Curriculum<br>- Partnering with Christian Universities overseas to create the most advanced international curriculum.<br><br>2) Professional Lecturers<br>- Our lecturer are highly professional and top leaders in their ministry, churches, business, etc.<br><br>3) Living Witness<br>- Our Alumni has becoming top Christian Mucisians, Leaders, or Pastors in their Church.";
        $data->description_id = "1) International Curriculum<br>- Partnering with Christian Universities overseas to create the most advanced international curriculum.<br><br>2) Professional Lecturers<br>- Our lecturer are highly professional and top leaders in their ministry, churches, business, etc.<br><br>3) Living Witness<br>- Our Alumni has becoming top Christian Mucisians, Leaders, or Pastors in their Church.";
        $data->save();

        $data = new Faq();
        $data->faq_category_id = 4;
        $data->name = "What are the Career Prospects for Bachelor of Theology (S.Th)?";
        $data->name_id = "Apa sih Prospek Karir Sarjana Teologi (S.Th)?";
        $data->description = "- Priest<br>
        - Educators serving in various Denominations, Foundations at home and abroad.";
        $data->description_id = "- Pendeta<br>- Pendidik yang melayani di berbagai Denominasi, Yayasan dalam dan luar negeri.";
        $data->save();

        $data = new Faq();
        $data->faq_category_id = 4;
        $data->name = "What are the Career Prospects of a Bachelor of Christian Religious Education (S.Pd)?";
        $data->name_id = "Apa sih Prospek Karir Sarjana Pendidikan Agama Kristen (S.Pd)?";
        $data->description = "- Christian Religious Education teacher at school<br>- Counselor/Teacher BP<br>- Priest<br>- Educator in church/community";
        $data->description_id = "- Guru Pendidikan Agama Kristen di sekolah<br>- Konselor/Guru BP<br>- Pendeta<br>- Pendidik di gereja/komunitas";
        $data->save();

        $data = new Faq();
        $data->faq_category_id = 4;
        $data->name = "What are the Career Prospects of a Bachelor in Ecclesiastical Music (S.Sn)?";
        $data->name_id = "Apa sih Prospek Karir Sarjana Musik Gerejawi (S.Sn)?";
        $data->description = "- Professional Instrument<br>- Art Director<br>- Church Music Director<br>- Music Composer<br>- Music Arranger";
        $data->description_id = "- Instrumen Professional<br>- Art Director<br>- Church Music Director<br>- Music Composer<br>- Music Arranger";
        $data->save();
    }
}
