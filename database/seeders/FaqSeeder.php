<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $data = new Faq();
        $data->question = 'How do I register to study at STMIK Harvest?';
        $data->question_idn = 'Bagaimana cara mendaftar kuliah di STMIK Harvest?';
        $data->answer = '- Purchase the Registration Form<br>- Collecting Documents such as :<br>- (Certificates, Transcripts, Ktp, Kk, Baptism Letters, Proof of Health, 3x4 and 4x6 sized passport photos.<br>- TOEFL Certificate (For S2 & S3 Registrants)<br>- Doing Written Test & Interview<br>- Announcement of Entrance Test Passing Results<br>- Make Tuition Payments.';
        $data->answer_idn = '- Membeli Formulir Pendaftaran<br>- Mengumpulkan Dokumen Kelengkapan Seperti :<br>- (Ijasah, Transkrip Nilai, Ktp, Kk, Surat Baptis, Surat Bukti Kesehatan, Pas Foto Ukuran 3x4 Dan 4x6.<br>- Sertifikat Toefl (Bagi Pendaftar S2 & S3)<br>- Melakukan Test Tertulis & Wawancara<br>- Pengumuman Hasil Kelulusan Ujian Test Masuk<br>- Melakukan Pembayaran Uang Kuliah.';
        $data->save();
    }
}
