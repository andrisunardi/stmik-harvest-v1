<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Lecturer;

class LecturerSeeder extends Seeder
{
    public function run()
    {
        $data = new Lecturer();
        $data->name = "Dr. Jimmy Boaz Oentoro";
        $data->description = "Jimmy Boaz Oentoro is the Founder and the Senior Pastor of International Full Gospel Fellowship (IFGF), whom has been serving in more than 30 different countries in the world. He is also the Founder and Chairman of World Harvest, a non profit mission organization that reaches through community ministry, education, and media. Currently the Chairman of Harvest International Theological Seminary, he is a dynamic speaker, who preached in front of many leaders in Europe, America, Australia, Asia and many more cities in Indonesia. His heart longs to see many leaders maximize the potential inside them.";
        $data->job = "Chairman";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/jimmyoentoro";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Frans H.M Silalahi, M.H.";
        $data->description = null;
        $data->job = "Director of Post Graduate Program";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = null;
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Daniel E. Runtuwene, M.SC.";
        $data->description = "- S1 : Bachelor Of Science, Oklahoma State University Stillwater. 1990 (Industrial Engineering & Management)<br>
        - S2 : Magister Of Science, Oklahoma State University, Stillwater. 1992 (Industrial Engineering & Management)<br>
        - S3 : Doctor Of Theology, Stt International Harvest Tangerang. 2018";
        $data->job = "Vice Chairman 1";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/danielruntuwene";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Valeria Sonata, S.Si., M.M., M.Th.";
        $data->description = null;
        $data->job = "Vice Chariman 2";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = null;
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Linda Arih Ersada";
        $data->description = "S1<br>DRA IN ENGLISH LITERATURE, UNIVERSITAS SUMATERA UTARA, 1988<br>S2<br>M.TH IN CHRISTIAN LEADERSHIP, HARVEST INTERNATIONAL THEOLOGICAL SEMINARY, 2007<br>S3<br>D.TH IN THEOLOGY, HARVEST INTERNATIONAL THEOLOGICAL SEMINARY, 2015";
        $data->job = "Head of Master Degree Program";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/lindasitepu";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Hengki Bonifacius Tompo, S.Sn, M.Si";
        $data->description = "Mengajar Ilmu Harmoni dan Solfegio serta Sosiologi Musik disamping juga mengajar praktek musik untuk Guitar dan Piano.S1<br>S.SN IN MUSIC, INSTITUT SENI INDONESIA, YOGYAKARTA, 1994<br>S2<br>M.SI IN SOCIOLOGY, UNIVERSITAS INDONESIA, 2008.";
        $data->job = "Head of Church Music Program";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/hengkyto";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Herman Poroe, M.Th";
        $data->description = "Ahli dalam Pendidikan Agama Kristen, Teologi Perjanjian Baru, sebagai fasilitator dan pembicara dalam seminar dan workshop Lead Like Jesus, pengkhotbah di berbagai denominnasi gereja, Trainer Church Planting di berbagai denominnasi gereja, Gembala Sidang GPdI Efata Moderen Land, Tangerang, dan pengajar di berbagai STT di Indonesia.<br><br>S1<br>S.TH IN THEOLOGY, SEKOLAH TINGGI TEOLOGI PARAKLETOS, 2001<br>S2<br>M.TH IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 2007.
        ";
        $data->job = "Head of Christian Education Program";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/hermanporoe01";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Cicilia Gunawan";
        $data->description = null;
        $data->job = "Lecturer";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/ciciliag";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Arnold Tindas";
        $data->description = "Pakar bidang Teologi Sistematika; Penulis buku teologi sistematika best seller “Inerrancy: Ketaksalahan Alitab”. Pengalaman dalam Kepemimpinan, Pendidikan, Pelayanan dan Pembicara Nasional dan Internasional. Pengalaman Kepemimpinan sebagai Ketua Sinode Gereja 16 tahun; Pengurus Nasional Persekutuan Gereja-gereja dan Lembaga-lembaga Injili di Indonesia (PGLII); Pengrurus Nasional Persekutuan Sekolah Tinggi Teologi Injili di Indonesia (PASTI) ; Pengurus Badan Konsorsium Teologi dan Tim Penjaminan Mutu PTT/AK Kementerian Agama RI; Pimpinan STT dan Fakultas Agama di Manado, Yogyakarta dan Jakarta. Pengalaman Pelayanan sebagai Gembala Jemaat Lokal 20 tahun; pengkhotbah di berbagai Gereja seluruh daerah di Indonesia dan beberapa negara, seperti Australia dan Malaysia. Pembicara nasional Simposium Teologi di PGLII dan PASTI; bedah buku di Indonesia dan Korea; Presentasi penelitian di Konferensi ilmiah Malaysia dan Singapura. Pembicara Seminar Teologi Sistematika, Teologi Kontemporer dan Teologi Kepemimpinan Kristen.<br><br>S1<br>S.TH IN THEOLOGY, SEKOLAH TINGGI ALKITAB TIRANUS BANDUNG, 1986<br>S2<br>M.DIV IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 1988M.TH IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 2009<br>S3<br>D.MIN IN THEOLOGY, SEKOLAH TINGGI TEOLOGI INJILI INDONESIA, 2000D.TH IN THEOLOGY, SEKOLAH TEOLOGI BAPTIS INDONESIA, 2006<br>";
        $data->job = "Lecturer";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/arnoldtindas";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Esther Idayanti BSC, M.A.";
        $data->description = null;
        $data->job = "Lecturer";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = null;
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Prof.Ir. Vicky VJ Panelewen, M.Sc., Ph.D.";
        $data->description = "Education:<br>S1<br>S.H BACHELOR OF LAW, UNIVERSITAS INDONESIA, 1989<br>S2<br>M.M IN FINANCIAL MANAGEMENT, STT MANAJEMEN PPM, 2002<br>M.H IN BUSINESS LAW, UNIVERSITAS PADJAJARAN, 2009<br>S3<br>D.TH IN THEOLOGY, HARVEST INTERNATIONAL THEOLOGICAL SEMINARY, 2016.";
        $data->job = "Lecturer";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = "https://www.instagram.com/joniariesbangun";
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Dr. Joni Aries Bangun, M.H.";
        $data->description = null;
        $data->job = "Lecturer";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = null;
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Lecturer();
        $data->name = "Novika De Velas, S.Sos, M.Th.";
        $data->description = null;
        $data->job = "SPMI";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = null;
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->active = false; // Update
        $data->save();

        $data = new Lecturer();
        $data->name = "Prof. Dr. Margaretha A Liwoso, Su.";
        $data->description = null;
        $data->job = "Lecturer";
        $data->phone = null;
        $data->email = null;
        $data->facebook = null;
        $data->twitter = null;
        $data->instagram = null;
        $data->linkedin = null;
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
