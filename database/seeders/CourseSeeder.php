<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // BACHELOR THEOLOGY
            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-1001";
            $data->name = "Kepemimpinan Kristen 1 (Dasar-dasar Kepemimpinan, Building Leadership Within You)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-1002";
            $data->name = "Inggris I (Introduction to General English)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-1003";
            $data->name = "Discipleship";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-1001";
            $data->name = "Teologi Sistematika 1 (Prolegomen - Hamartologi)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-1001";
            $data->name = "Pengantar PL";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-1002";
            $data->name = "Pengantar PB";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-1003";
            $data->name = "Teologi PB (Christ, Church & Holy Spirit)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-1003";
            $data->name = "Psikologi Umum";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-G-1001";
            $data->name = "Introduction to Comp. & Information Technology";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-G-1001";
            $data->name = "Leadership Seminar I (IFGF Conf. + Come)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-1001";
            $data->name = "Sejarah Gereja Umum";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-2001";
            $data->name = "Pendidikan Kewarganegaraan";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-G-2001";
            $data->name = "Inggris II (Reading, Listening, Speaking, & Writing)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-T-2001";
            $data->name = "Pengantar Musik Gereja";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-2001";
            $data->name = "Teologi Sistematika 2 (Kristologi Eskatologi)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-2001";
            $data->name = "Eksposisi PL 1 (Kejadian - Ulangan)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-2002";
            $data->name = "Eksposisi PB 1 (Matius - Kisah Para Rasul)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-2002";
            $data->name = "Hermeneutika 1";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-2001";
            $data->name = "Bahasa Yunani 1";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-T-2002";
            $data->name = "Teologi PL (Covenant Theology, Tabernacle)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-T-2001";
            $data->name = "Islamologi";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-2003";
            $data->name = "Pengetahuan Multikultural";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-6002";
            $data->name = "Bahasa Indonesia";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-G-3001";
            $data->name = "Inggris III (English Preaching)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-T-3001";
            $data->name = "Liturgika";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-3002";
            $data->name = "Hermeneutika 2";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-G-3001";
            $data->name = "Homiletika";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-3002";
            $data->name = "Eksposisi PL 2 (Yosua - 2 Tawarikh)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-3003";
            $data->name = "Eksposisi PB 2 (Roma - Filemon)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-3001";
            $data->name = "Bahasa Yunani 2";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-PP-3003";
            $data->name = "Psikologi Perkembangan";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-G-3002";
            $data->name = "Kempemimpinan Kristen 2 (Building Leadership Around You)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-3001";
            $data->name = "Leadership Seminar II (IFGF Conf. + Grow)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "-";
            $data->name = "Children Ministry (MK Baru)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-G-4001";
            $data->name = "Leadership Impact (Com. Development)";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "BB-T-4001";
            $data->name = "Church Planting";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-T-4002";
            $data->name = "Manajemen Gereja";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-2002";
            $data->name = "Sejarah Gereja Indonesia";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-4002";
            $data->name = "Eksposisi PL 3 (Ezra - Maleakhi)";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-T-4001";
            $data->name = "Teologi Kontemporer";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-T-4002";
            $data->name = "Bahasa Ibrani I";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-4004";
            $data->name = "Bimbingan Konseling";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "BB-TP-4001";
            $data->name = "Etika Kristen";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-4001";
            $data->name = "Sosiologi";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-4001";
            $data->name = "Academic Writing";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "-";
            $data->name = "Youth Ministry (MK Baru)";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-5001";
            $data->name = "Dogmatika Teologi";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-T-5001";
            $data->name = "Bahasa Ibrani 2";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-G-5001";
            $data->name = "Leadership Seminar III (IFGF Conf. + Serve";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-T-5001";
            $data->name = "Kotbah Ekspositori";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-5003";
            $data->name = "Metodologi penelitian";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-T-5001";
            $data->name = "Paduan Suara";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-TP-5001";
            $data->name = "Creative Teaching";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "BB-TP-5001";
            $data->name = "Entrepreneurship (Pastorpreneurship) (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "BB-G-5001";
            $data->name = "Praktik Pengalaman Lapangan I (Mission Trip)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "-";
            $data->name = "Marriage & Family (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "-";
            $data->name = "Pastoral Ministry (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-T-6001";
            $data->name = "Media Pembelajaran Berbasis IT";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-T-6002";
            $data->name = "Hermeneutika 3";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-TP-6001";
            $data->name = "Okultisme";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-T-6001";
            $data->name = "Pengantar Filsafat";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-6001";
            $data->name = "Apologetika";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-TP-6002";
            $data->name = "Komunikasi";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KK-TP-6002";
            $data->name = "Pengantar Statistika";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PK-G-2003";
            $data->name = "Harvest Theology";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-T-7002";
            $data->name = "Pembinaan Warga Gereja";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "KB-TP-5002";
            $data->name = "Eksposisi PB 3 (Ibrani - Wahyu)";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "-";
            $data->name = "Adult Ministry (MK Baru)";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "PB-G-7001";
            $data->name = "Proposal dan Skripsi";
            $data->sks = 6;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "BB-G-7001";
            $data->name = "Praktik Pengalaman Lapangan 2";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 1;
            $data->code = "BB-TP-7001";
            $data->name = "Leadership Seminar IV (IFGF Conf. + Lead)";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();
        // BACHELOR THEOLOGY

        // BACHELOR CHRISTIAN EDUCATION
            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-1001";
            $data->name = "Kepemimpinan Kristen 1 (Dasar-dasar Kepemimpinan, Building Leadership Within You)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-1002";
            $data->name = "Inggris I (Indroduction to General English)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-1003";
            $data->name = "Discipleship";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-G-1001";
            $data->name = "Leadership Seminar I (IFGF Conf. + Come)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-1001";
            $data->name = "Teologi Sistematika 1 (Prolegomena - Hamartologi)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-1001";
            $data->name = "Pengantar PL";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-1002";
            $data->name = "Pengantar PB";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-1003";
            $data->name = "Teologi PB (Christ, Church, & Holy Spirit)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-G-1001";
            $data->name = "Introduction to Comp. & Information Technology";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-1003";
            $data->name = "Psikologi Umum";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-1001";
            $data->name = "Pembimbing PAK 1";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-1001";
            $data->name = "Sejarah Gereja Umum";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-2001";
            $data->name = "Pendidikan Kewarganegaraan";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-G-2001";
            $data->name = "Inggris II (Reading, Listening, Speaking, & Writing)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-T-2001";
            $data->name = "Pengantar Musik Gereja (Seminar)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-2002";
            $data->name = "Hermeneutika I (Seminar)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-4001";
            $data->name = "Academic Writing";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-PM-2001";
            $data->name = "Psikologi Pendidikan";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-2001";
            $data->name = "Eksposisi Kitab Kejadian - Ulangan";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-2002";
            $data->name = "Eksposisi Matius - Kisah Para Rasul";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-2001";
            $data->name = "Teologi Sistematika 2 (Kristologi - Eskatologi)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-2001";
            $data->name = "Bahasa Yunani 1";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-T-2002";
            $data->name = "Teologi PL (Covenant Theology, Tabernacle)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-2003";
            $data->name = "Pengetahuan Multikultural";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-P-3001";
            $data->name = "Homiletika 2";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-G-3001";
            $data->name = "Inggris III (English Preaching)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-3002";
            $data->name = "Hermeneutika II";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-3002";
            $data->name = "Eksposisi Yosua - 2 Tawarikh";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-3003";
            $data->name = "Eksposisi Roma – Filemon";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-P-3001";
            $data->name = "Psikologi Perkembangan";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-G-3002";
            $data->name = "Kepemimpinan Kristen 2 (Building Leadership Around You)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-P-3002";
            $data->name = "Bahasa Yunani 2";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-P-3003";
            $data->name = "Leadership Seminar II (IFGF Conf. + Grow)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-3002";
            $data->name = "Teori-Teori Belajar";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-G-4001";
            $data->name = "Children Ministry";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-P-4001";
            $data->name = "Filsafat Pendidikan";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-P-4001";
            $data->name = "Leadership Impact (Com. Development)";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-4001";
            $data->name = "Strategi Pembelajaran PAK";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "BB-TP-4001";
            $data->name = "Etika Kristen";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-4001";
            $data->name = "Manajemen Pendidikan";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-4003";
            $data->name = "Youth Ministry";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-4004";
            $data->name = "Bimbingan Konseling";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-2002";
            $data->name = "Sejarah Pendidikan Kristen";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-4002";
            $data->name = "Eksposisi Ezra – Maleakhi";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-TP-4001";
            $data->name = "Sosiologi";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-T-4002";
            $data->name = "Bahasa Ibrani 1";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-5001";
            $data->name = "Kurikulum PAK";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-G-3001";
            $data->name = "Bahasa Ibrani 2";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-5003";
            $data->name = "Metodologi Penelitian";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-TP-5001";
            $data->name = "Creative Teaching";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-5001";
            $data->name = "Paduan Suara";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-TP-5002";
            $data->name = "Leadership Seminar III (IFGF Conf. + Serve)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "BB-G-5001";
            $data->name = "Praktik Pengalaman Lapangan 1 (Mission Trip)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-TP-5003";
            $data->name = "Digital Learning";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "-";
            $data->name = "Marriage & Family (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "-";
            $data->name = "Edu-Preneurship (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-6001";
            $data->name = "Apologetika";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-P-6001";
            $data->name = "Adult Ministry";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-6001";
            $data->name = "Pengantar Statistika";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KK-TP-6002";
            $data->name = "Komunikasi";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-TP-6001";
            $data->name = "Evaluasi PAK";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-TP-6002";
            $data->name = "Media Pembelajaran Berbasis IT";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-6002";
            $data->name = "Harvest Theology";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-P-6003";
            $data->name = "Bahasa Indonesia";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "KB-G-5001";
            $data->name = "Eksposisi Ibrani-Wahyu";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-TP-5002";
            $data->name = "Teknologi Pendidikan";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "BB-G-7001";
            $data->name = "Micro Teaching";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PB-G-7001";
            $data->name = "Proposal dan Skripsi";
            $data->sks = 6;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "BB-TP-7001";
            $data->name = "Leadership Seminar IV (IFGF Conf. + Lead)";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 2;
            $data->code = "PK-G-2002";
            $data->name = "Praktik Pengalaman Lapangan 2 (Praktek Mengajar)";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();
        // BACHELOR CHRISTIAN EDUCATION

        // BACHELOR CHURCH MUSIC
            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-1001";
            $data->name = "Teori Musik I";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-1001";
            $data->name = "Paduan Suara";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-1002";
            $data->name = "Solfegio I";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-1001";
            $data->name = "Praktek Individual Mayor I";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-G-1001";
            $data->name = "Leadership Seminar I (IFGF Conf. + Come)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-1001";
            $data->name = "Kepemimpinan Kristen 1 (Dasar-dasar Kepemimpinan, Building Leadership Within You)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-1002";
            $data->name = "Inggris I (Introduction to General English)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-G-1001";
            $data->name = "Introduction to Comp. & Information Technology";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-1003";
            $data->name = "Pengembangan Karakter";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-1002";
            $data->name = "Pengantar PL";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-1003";
            $data->name = "Pengantar PB";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-TP-1001";
            $data->name = "Teologi Sistematika 1 (Prolegomena - Hamartologi)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-2005 ";
            $data->name = "Teori Musik II";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-2004";
            $data->name = "Pengantar Hymnologi";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-2002";
            $data->name = "Solfegio II";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-2001";
            $data->name = "Praktek Individual Mayor II";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "BB-TP-4001";
            $data->name = "Etika Kristen";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-T-2001";
            $data->name = "Pengantar Musik Gereja";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-2001";
            $data->name = "Pendidikan Kewarganegaraan";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-G-2001";
            $data->name = "Inggris II (Reading & Listening, Speaking, & Writing)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-2001";
            $data->name = "Teologi Sistematika 2 (Kristologi - Eskatologi)";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-TP-4001";
            $data->name = "Academic Writing";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-4001";
            $data->name = "Psikologi Musik";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-3001";
            $data->name = "Harmoni I";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-3001";
            $data->name = "Praktek Individual Mayor III";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-3002";
            $data->name = "Direksi I";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-3003 / KB-M-3007";
            $data->name = "Piano Wajib I/ Minor Wajib 1";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-3001";
            $data->name = "Sejarah Musik I";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-G-3002";
            $data->name = "Kepemimpinan Kristen 2 (Building Leadership Around You)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-3004";
            $data->name = "Ansamble I";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-1001";
            $data->name = "Ibadah dan Liturgika";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-3001";
            $data->name = "Hermeneutika";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-3005";
            $data->name = "Primavista Vocal 1";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-3001";
            $data->name = "Leadership Seminar II (IFGF Conf. + Grow)";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-4001/ KB-M-4006";
            $data->name = "Piano Wajib II / Minor Wajib 2";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-4002";
            $data->name = "Harmoni II";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-4001";
            $data->name = "Primavista Vocal 2";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-4002";
            $data->name = "Praktek Individual Mayor IV";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-4003";
            $data->name = "Aransemen Musik Anak";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-4001";
            $data->name = "Sejarah Musik II";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-4004";
            $data->name = "Direksi II";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-4005";
            $data->name = "Ansamble II";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-4002";
            $data->name = "Manajemen Seni Pertunjukan";
            $data->sks = 2;
            $data->semester = 4;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-5003";
            $data->name = "Kontrapung";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-5002";
            $data->name = "Harmoni Manual I";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-5001";
            $data->name = "Metode Musik Anak";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-5002";
            $data->name = "Aransemen I";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-5001";
            $data->name = "Ilmu Bentuk dan Analisa I";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-G-3001";
            $data->name = "Homiletika";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-5002";
            $data->name = "Metode Penelitian Musik";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-3006";
            $data->name = "Kritik Musik";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "BB-G-5001";
            $data->name = "Praktik Pengalaman Lapangan 1";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-G-5001";
            $data->name = "Leadership Seminar III (IFGF Conf. + Serve)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "-";
            $data->name = "Marriage & Family (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "-";
            $data->name = "Praktik Pujian dan Penyembahan (MK Baru)";
            $data->sks = 2;
            $data->semester = 5;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-6001";
            $data->name = "Harmoni Manual II";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-6002";
            $data->name = "Ilmu Bentuk dan Analisa II";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-6003";
            $data->name = "Aransemen II";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-M-6001";
            $data->name = "Etnomusikologi";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-M-6001";
            $data->name = "Sosiologi Musik";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-6001";
            $data->name = "Praktek Instrumen Etnik Nusantara";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KB-M-6004";
            $data->name = "Komposisi Dasar";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-2002";
            $data->name = "Bahasa Indonesia";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PK-G-2003";
            $data->name = "Harvest Theology";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-K-1002";
            $data->name = "Digital Music Production 1";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-2001";
            $data->name = "Estetika Musik Gereja";
            $data->sks = 2;
            $data->semester = 6;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-M-7001";
            $data->name = "Komposisi Lanjutan";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "PB-G-7001";
            $data->name = "Skripsi dan Resital";
            $data->sks = 6;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "BB-G-7001";
            $data->name = "Praktik Pengalaman Lapangan 2";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "KK-K-1003";
            $data->name = "Digital Music Production 2";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "BB-TP-7001";
            $data->name = "Leadership Seminar IV (IFGF Conf. + Lead)";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();

            $data = new Course();
            $data->study_program_id = 3;
            $data->code = "-";
            $data->name = "Music-Preneurship (MK Baru)";
            $data->sks = 2;
            $data->semester = 7;
            $data->save();
        // BACHELOR CHURCH MUSIC

        // MASTER
            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 5001";
            $data->name = "Teologi Kontemporer";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKB 5003";
            $data->name = "Dinamika Perubahan";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MPK 5006";
            $data->name = "Teologi kepemimpinan Kristen";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MBB 6002";
            $data->name = "The Church to the Modern Era (Smart Church)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 6004";
            $data->name = "Teknik Penulisan Ilmiah Untuk Jurnal";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 6005";
            $data->name = "Research Metodology and data Analysis";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 5002";
            $data->name = "Sistematika Teologi";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MPB 5004";
            $data->name = "Harvest Theology";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MPB 5005";
            $data->name = "Spirit Entrepreneural Leadership";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MPK 5007";
            $data->name = "Post Modern Transformational Leadership";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKB 5008";
            $data->name = "Analisis Masalah-masalah Manajemen & Adm Gereja Kontemporer";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MPB 6001";
            $data->name = "Pastoral Konseling";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MBB 6003";
            $data->name = "Leadership Multiplication in the Digital Era";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MBB 6006";
            $data->name = "Leading Community Transformational";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKB 6007";
            $data->name = "Proposal Tesis (Bab I - III )";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKB 6008";
            $data->name = "Sidang Tesis (Bab I - V )";
            $data->sks = 6;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 6523";
            $data->name = "Bahasa Ibrani";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 6533";
            $data->name = "Bahasa Yunani";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKB 6612";
            $data->name = "Pengantar Perjanjian Lama";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MPB 6753";
            $data->name = "Pengantar Perjanjian Baru";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKB 6623";
            $data->name = "Eksegesis Alkitab";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 4;
            $data->code = "MKK 4001";
            $data->name = "Homiletika";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();
        // MASTER

        // DOCTORAL
            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 7001";
            $data->name = "Colloquium Theologicum";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MBB 7002";
            $data->name = "The Church to the Modern Era (Smart Church)";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 7003";
            $data->name = "Research Metodology and data Analysis";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKB 7004";
            $data->name = "Public Policies and Law";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MBB 7005";
            $data->name = "Engaging Global Reality";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 7006";
            $data->name = "Colloquium Didacticum";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 7007";
            $data->name = "Academic Writing for Journal";
            $data->sks = 2;
            $data->semester = 1;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPB 8001";
            $data->name = "Harvest Theology";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 8002";
            $data->name = "Colloquium Biblicum";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MBB 8003";
            $data->name = "Developing NGO Globally";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPK 8004";
            $data->name = "Post Modern Transformational Leadership";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPB 8005";
            $data->name = "Spirit Entrepreneurial Leadership";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPB 8006";
            $data->name = "Leadership Multiplication in the Digital Era";
            $data->sks = 2;
            $data->semester = 2;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKB 8006";
            $data->name = "Dissertation Proposal (Chapt .I )";
            $data->sks = 2;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKB 8007";
            $data->name = "Dissertation Proposal Seminar (Chapt .I-III )";
            $data->sks = 5;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKB 8008";
            $data->name = "Final Dissertation Exam";
            $data->sks = 9;
            $data->semester = 3;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 4001";
            $data->name = "Hebrew";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 4002";
            $data->name = "Greek";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPK 4003";
            $data->name = "Intro to OT";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPK 4004";
            $data->name = "Intro to NT";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKB 4005";
            $data->name = "Biblical Exegesis";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MPB 4006";
            $data->name = "Expository Preaching";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();

            $data = new Course();
            $data->study_program_id = 5;
            $data->code = "MKK 4007";
            $data->name = "Systematic Theology";
            $data->sks = 2;
            $data->semester = 0;
            $data->save();
        // DOCTORAL
    }
}
