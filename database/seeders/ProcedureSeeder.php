<?php

namespace Database\Seeders;

use App\Models\Procedure;
use Illuminate\Database\Seeder;

class ProcedureSeeder extends Seeder
{
    public function run()
    {
        $data = new Procedure();
        $data->name = 'Requirement';
        $data->name_id = 'Persyaratan';
        $data->description = '1. Photocopy of Identity (Student Card / KTP / SIM)<br>2. Legalized photocopy of grade 10 & 11 report cards (for those who are still in school)<br>3. Photocopy of high school diploma / equivalent (if any)<br>4. The latest 2 (two) size 3×4 photos<br>5. Other supporting documents (certificates, letters of recommendation, etc.) if any.';
        $data->description_id = '1. Fotokopi Identitas (Kartu Pelajar / KTP / SIM)<br>2. Fotokopi legalisir rapor kelas 10 & 11 (untuk yang masih berada di bangku sekolah)<br>3. Fotokopi ijasah SMA / sederajat (apabila sudah ada)<br>4. Foto ukuran 3×4 terbaru sebanyak 2(dua) buah<br>5. Dokumen pendukung lainnya (sertifikat, surat rekomendasi, dll) jika ada.';
        $data->save();

        $data = new Procedure();
        $data->name = 'How To (Onsite)';
        $data->name_id = 'Bagaimana Caranya (Onsite)';
        $data->description = '1. Purchase STMIK Harvest Form for Rp.150.000,-<br>2. Returning the Form and its Completeness<br>3. Take the entrance screening test in the form of an Interview Test (no written test)<br>4. Waiting for the results of acceptance / scholarship results<br>5. Making payments<br>6. Send proof of payment via email.';
        $data->description_id = '1. Membeli Formulir STMIK Harvest Sebesar Rp.150.000,-<br>2. Mengembalikan Formulir beserta Kelengkapannya<br>3. Mengikuti ujian saringan masuk berupa Tes Wawancara (tidak ada tes tertulis)<br>4. Menunggu hasil penerimaan / hasil beasiswa<br>5. Melakukan pembayaran<br>6. Mengirimkan bukti pembayaran melalui email.';
        $data->save();

        $data = new Procedure();
        $data->name = 'How To (Online)';
        $data->name_id = 'Bagaimana Caranya (Online)';
        $data->description = '1. Click on the online registration menu<br>2. Fill in the registration form.';
        $data->description_id = '1. Klik pada menu pendaftaran online<br>2. Isi formulir pendaftaran.';
        $data->save();
    }
}
