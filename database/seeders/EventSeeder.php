<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run()
    {
        $data = new Event();
        $data->event_category_id = 1;
        $data->name = 'New Student Orientation 2015/2016';
        $data->name_id = 'Orientasi Mahasiswa Baru 2015/2016';
        $data->description = '
        <p>New Student Orientation for STMIK Harvest Information System students for the 2015/2016 Academic Year took place on 19 September 2015.</p>
        <p>Welcoming new students who join STMIK Harvest and providing supplies that are deemed necessary for future lectures.</p>
        <p><b>This student orientation is carried out with a series of activities, including :</b></p>
        <ul>
            <li>1. Introduction of the departments and personnel in STMIK Harvest.</li>
            <li>2. Games.</li>
            <li>3. Updated skills and strategies.</li>
        </ul>
        <p><b>Seminar series such as:</b></p>
        <ul>
            <li>1. Vision & Mission Presentation.</li>
            <li>2. Leadership training.</li>
            <li>3. Life Goals & Setting.</li>
            <li>4. How to study.</li>
            <li>5. Academic Overview.</li>
        </ul>
        ';
        $data->description_id = '
        <p>Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2015/2016 berlangsung pada tanggal 19 Sept 2015.</p>
        <p>Menyambut mahasiswa baru yang bergabung dengan STMIK Harvest dan memberikan pembekalan yang dirasa perlu untuk perkuliahan nantinya.</p>
        <p><b>Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain :</b></p>
        <ul>
            <li>1. Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest.</li>
            <li>2. Games.</li>
            <li>3. Keterampilan dan strategi yang diperbarui.</li>
        </ul>
        <p><b>Rangkaian Seminar seperti:</b></p>
        <ul>
            <li>1. Pemaparan Visi & Misi.</li>
            <li>2. Leadership training.</li>
            <li>3. Life Goal & Setting.</li>
            <li>4. How to Study.</li>
            <li>5. Academic Overview.</li>
        </ul>
        ';
        $data->location = 'Gedung World Harvest Center, International Room.';
        $data->start = '2015-09-19 08:00:00';
        $data->end = '2015-09-19 17:00:00';
        $data->tag = 'Orientation';
        $data->tag_id = 'Orientasi';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 2;
        $data->name = 'Community Service Wahana Harapan Kampung Melayu School';
        $data->name_id = 'Pengabdian Kepada Masyarakat Sekolah Wahana Harapan Kampung Melayu';
        $data->description = "
        <p>Community Service (PKM) which is held to carry out the tridharma of higher education by presenting a seminar with the theme 'Social Media 101'.</p>
        <p>Give parents and teachers an idea of how social media is in our midst, and parents are encouraged to understand their children's activities.</p>
        <p><b>What We Do :</b></p>
        <ul>
            <li>1. Seminar on Social Media 101 is a seminar that aims to provide a basic overview for parents or teachers who do not really understand about the internet and social media. The team from STMIK Harvest gave an explanation and also an explanation of the functions, advantages and disadvantages of the internet and social media, as well as what social media is already in the midst of our children today.</li>
            <li>2. The seminar was also continued with additional explanations about child psychology which aims to make parents or teachers understand how children behave.</li>
        </ul>
        ";
        $data->description_id = "
        <p>Pengabdian Kepada Masyarakat (PKM) yang diselenggarakan untuk menjalankan tridarma perguruan tinggi dengan membawakan seminar bertema 'Social Media 101'.</p>
        <p>Memberikan gambaran kepada orang tua dan guru tentang bagaimana social media sudah ada ditengah-tengah kita, dan orang-tua dihimbau untuk bisa memahami kegiatan anak-anak mereka.</p>
        <p><b>Apa Yang Kita Lakukan :</b></p>
        <ul>
            <li>1. Seminar Social Media 101 adalah seminar yang bertujuan untuk memberikan gambaran dasar bagi para orang tua ataupun guru yang belum begitu memahami tentang internet dan social media. Tim dari STMIK Harvest memberikan pemaparan dan juga penjelasan mengenai fungsi, kelebihan dan kekurangan dari internet dan social media, serta social media apa saja yang sudah ada di tengah-tengah anak-anak kita saat ini.</li>
            <li>2. Seminar dilanjutkan juga dengan penjelasan tambahan mengenai psikologi anak yang bertujuan agar para orang tua ataupun guru dapat memahami bagaimana perilaku dari pada anak-anak.</li>
        </ul>
        ";
        $data->location = 'Sekolah Wahana Harapan Kampung Melayu';
        $data->start = '2015-09-01 09:00:00';
        $data->end = '2015-09-01 17:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 3;
        $data->name = 'Seminar Computational Thinking';
        $data->name_id = 'Seminar Computational Thinking';
        $data->description = '
        <p>Held a seminar with the theme of Computational Thinking by inviting experts from the industry.</p>
        <p>Giving students insight into what computational thinking is and how it can be useful in everyday life.</p>
        <p><b>What We Do :</b></p>
        <ul>
            <li>This Computational Thinking seminar was presented by Mr. Indra Charismiadji as the President Director of Eduspec Indonesia. IT company in Indonesia which is engaged in educational technology.</li>
            <li>He explained that to be able to think computationally, there are several elements that must be understood.</li>
            <li>Computational thinking can ultimately be applied in any field of science, in any activity, and becomes a good soft skill for every student at STMIK Harvest.</li>
            <li>This seminar is carried out with seminars and interesting games so that students can understand better.</li>
        </ul>
        ';
        $data->description_id = '
        <p>Mengadakan seminar dengan tema Computational Thinking dengan mengundang pakar dari industry.</p>
        <p>Memberikan pandangan kepada mahasiswa tentang apa itu computational thinking dan bagaimana bisa berguna dalam kehidupan sehari-hari.</p>
        <p><b>Apa Yang Kita Lakukan :</b></p>
        <ul>
            <li>Seminar Computational Thinking ini dibawakan oleh Bpk Indra Charismiadji selaku Presiden Direktur dari Eduspec Indonesia. Perusahaan IT di Indonesia yang bergerak di bidang educational technology.</li>
            <li>Beliau memaparkan untuk bisa berpikir secara komputasi, ada beberapa elemen yang harus dipahami.</li>
            <li>Computational thinking ini pada akhirnya dapat diterapkan dalam bidang ilmu apapun, dalam kegiatan apapun juga, dan menjadi soft skill yang baik untuk dimiliki setiap mahasiswa di STMIK Harvest.</li>
            <li>Seminar ini dibawakan dengan seminar dan juga games menarik agar para mahasiswa dapat mengerti dengan lebih baik.</li>
        </ul>
        ';
        $data->location = 'STMIK Harvest, Harvest Square Room';
        $data->start = '2015-11-01 08:00:00';
        $data->end = '2015-11-01 17:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 2;
        $data->name = 'Community Service Wahana Harapan Tegal Angus School';
        $data->name_id = 'Pengabdian Kepada Masyarakat Sekolah Wahana Harapan Tegal Angus';
        $data->description = "
        <p>Community Service (PKM) which was held in collaboration with World Teach Indonesia with the theme 'Social Media and Me'.</p>
        <p>Give an overview to the students of SMP Wahana Harapan about how we should have goals and ideals, understanding that there are many distractions in life. Internet and Social media can be one of these distractions, but they can also be overcome if we use them wisely.</p>
        <p><b>What's new :</b></p>
        <ul>
            <li>The Social Media and Me Seminar is divided into two parts. The first part is presented by World Teach Indonesia which provides an illustration that each of the existing students must be able to identify themselves. They must have goals, be serious about life, and not play around too much. This first part is expected to inspire the students to get to know themselves and also to make good use of their time.</li>
            <li>The second part of this seminar was presented by STMIK Harvest where STMIK Harvest explained that the internet and social media can help us to be smarter or better but also can make us waste our time doing things that are not too important. For this reason, STMIK Harvest provides exposure on how to use social media with good ethics.</li>
        </ul>
        ";
        $data->description_id = "
        <p>Pengabdian Kepada Masyarakat (PKM) yang diselenggarakan bekerjasama dengan World Teach Indonesia dengan tema 'Social Media and Me'.</p>
        <p>Memberikan gambaran kepada para murid SMP Wahana Harapan tentang bagaimana kita harus memiliki target dan cita-cita, memahami bahwa ada banyak gangguan dalam hidup. Internet dan Social media bisa menjadi salah satu gangguan tersebut, tapi juga bisa diatasi jika kita menggunakannya dengan bijak.</p>
        <p><b>Apa yang baru :</b></p>
        <ul>
            <li>Seminar Social Media and Me dibagi menjadi dua bagian. Bagian pertama dibawakan oleh World Teach Indonesia yang memberikan gambaran bahwa setiap dari murid yang ada harus bisa mengenali diri mereka sendiri. Mereka harus memiliki target, serius dalam menjalani hidup, dan tidak terlalu banyak main-main. Bagian pertama ini diharapkan dapat membangkitkan semangat para murid untuk bisa mengenal diri mereka sendiri dan juga memanfaatkan waktu-waktu mereka dengan baik.</li>
            <li>Bagian kedua seminar ini dibawakan oleh STMIK Harvest dimana STMIK Harvest menjelaskan bahwa internet dan social media bisa membantu kita untuk kita bisa semakin pintar ataupun semakin baik tapi juga bisa membuat kita membuang waktu kita melakukan hal yang tidak terlalu penting. Untuk itulah STMIK Harvest memberikan paparan bagimana menggunakan social media dengan etika yang baik.</li>
        </ul>
        ";
        $data->location = 'Sekolah Wahana Harapan Tegal Angus';
        $data->start = '2016-01-26 09:00:00';
        $data->end = '2016-01-26 17:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 3;
        $data->name = 'Seminar Social Media And Me';
        $data->name_id = 'Seminar Social Media And Me';
        $data->description = "
        <p>Seminar in collaboration with World Teach Indonesia with the theme 'Social Media and Me'.</p>
        <p>Providing insight into what social media are currently developing and how much they are growing. We all have dreams or aspirations, but don't let the internet and social media become a barrier for us so that our time is not effective. for that STMIK Harvest provides direction on how to use social media well.</p>
        <p><b>What's new :</b></p>
        <ul>
            <li>The Social Media and Me Seminar is divided into two parts. The first part is presented by World Teach Indonesia which provides an illustration that each of the existing students must be able to identify themselves. They must have goals, be serious about life, and not play around too much. This first part is expected to inspire the students to get to know themselves and also to make good use of their time.</li>
            <li>The second part of this seminar was presented by STMIK Harvest where STMIK Harvest explained that the internet and social media can help us to be smarter or better but also can make us waste our time doing things that are not too important. For this reason, STMIK Harvest provides exposure on how to use social media with good ethics.</li>
        </ul>
        ";
        $data->description_id = "
        <p>Seminar yang bekerjasama dengan World Teach Indonesia dengan tema 'Social Media and Me'.</p>
        <p>Memberikan wawasan mengenai apa saja media sosial yang sedang berkembang dan seberapa besar pertumbuhannya. kita semua memiliki mimpi ataupun cita-cita, tapi janganlah internet dan sosial media menjadi penghalang bagi kita sehingga waktu-waktu kita tidak efektif. untuk itu STMIK Harvest memberikan arahan bagaimana menggunakan sosial media dengan baik.</p>
        <p><b>Apa yang baru :</b></p>
        <ul>
            <li>Seminar Social Media and Me dibagi menjadi dua bagian. Bagian pertama dibawakan oleh World Teach Indonesia yang memberikan gambaran bahwa setiap dari murid yang ada harus bisa mengenali diri mereka sendiri. Mereka harus memiliki target, serius dalam menjalani hidup, dan tidak terlalu banyak main-main. Bagian pertama ini diharapkan dapat membangkitkan semangat para murid untuk bisa mengenal diri mereka sendiri dan juga memanfaatkan waktu-waktu mereka dengan baik.</li>
            <li>Bagian kedua seminar ini dibawakan oleh STMIK Harvest dimana STMIK Harvest menjelaskan bahwa internet dan social media bisa membantu kita untuk kita bisa semakin pintar ataupun semakin baik tapi juga bisa membuat kita membuang waktu kita melakukan hal yang tidak terlalu penting. Untuk itulah STMIK Harvest memberikan paparan bagimana menggunakan social media dengan etika yang baik.</li>
        </ul>
        ";
        $data->location = 'SMAN 23 Tomang Jakarta Barat';
        $data->start = '2016-05-11 13:00:00';
        $data->end = '2016-05-11 15:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 2;
        $data->name = 'Community Service at Immanuel Elementary School, West Jakarta';
        $data->name_id = 'Pengabdian Kepada Masyarakat SD Immanuel Jakarta Barat';
        $data->description = "
        <p>Community Service (PKM) which was held in collaboration with World Teach Indonesia with the theme 'Social Media and Me'.</p>
        <p>gives an idea to Immanuel Elementary School students to be able to make better use of their cellphones and not just spend time playing games.</p>
        <p><b>What's new :</b></p>
        <ul>
            <li>The Social Media and Me Seminar is divided into two parts. The first part is presented by World Teach Indonesia which provides an illustration that each of the existing students must be able to identify themselves. This first part is expected to inspire the students to get to know themselves and also to make good use of their time.</li>
            <li>The second part of this seminar was presented by STMIK Harvest where STMIK Harvest explained that the internet and social media and games can help us to be smarter or better but also can make us waste our time doing things that are not too important. For this reason, STMIK Harvest provides an explanation of how students can reduce playing time and learn more.</li>
        </ul>
        ";
        $data->description_id = "
        <p>Pengabdian Kepada Masyarakat (PKM) yang diselenggarakan bekerjasama dengan World Teach Indonesia dengan tema 'Social Media and Me'.</p>
        <p>memberikan gambaran kepada murid-murid SD Immanuel untuk bisa lebih memanfaatkan handphone dengan lebih baik dan tidak menghabiskan waktu untuk bermain saja.</p>
        <p><b>Apa yang baru :</b></p>
        <ul>
            <li>Seminar Social Media and Me dibagi menjadi dua bagian. Bagian pertama dibawakan oleh World Teach Indonesia yang memberikan gambaran bahwa setiap dari murid yang ada harus bisa mengenali diri mereka sendiri. Bagian pertama ini diharapkan dapat membangkitkan semangat para murid untuk bisa mengenal diri mereka sendiri dan juga memanfaatkan waktu-waktu mereka dengan baik.</li>
            <li>Bagian kedua seminar ini dibawakan oleh STMIK Harvest dimana STMIK Harvest menjelaskan bahwa internet dan social media dan game bisa membantu kita untuk kita bisa semakin pintar ataupun semakin baik tapi juga bisa membuat kita membuang waktu kita melakukan hal yang tidak terlalu penting. Untuk itulah STMIK Harvest memberikan paparan bagimana untuk bisa para murid mengurangi waktu bermain dan lebih memperbanyak belajar.</li>
        </ul>
        ";
        $data->location = 'SD Immanuel Jakarta Barat';
        $data->start = '2016-06-22 10:00:00';
        $data->end = '2016-06-22 11:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 1;
        $data->name = 'New Student Orientation 2016/2017';
        $data->name_id = 'Orientasi Mahasiswa Baru 2016/2017';
        $data->description = '
        <p>New Student Orientation for STMIK Harvest Information System students for 2016/2017 Academic Year will take place on 17 September 2016.</p>
         <p>Welcoming new students who join STMIK Harvest and providing briefing and motivation.</p>
         <p><b>This student orientation is carried out with a series of activities, including:</b></p>
         <ul>
             <li>Introduction of the departments and personnel in STMIK Harvest.</li>
             <li>Games by BEM STMIK Harvest.</li>
             <li>Sharing and motivation from alumni.</li>
         </ul>
         <p><b>Seminar series such as:</b></p>
         <ul>
             <li>“A Good Habit Starts from a Good Character” by Mr Yohanes Sumarno.</li>
             <li>“Technopreneur” by Mr. Beny Saputro, CEO of Nataproperty (Nataproperty.com).</li>
         </ul>
        ';
        $data->description_id = '
        <p>Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2016/2017 berlangsung pada tanggal 17 Sept 2016.</p>
        <p>Menyambut mahasiswa baru yang bergabung dengan STMIK Harvest dan memberikan pembekalan dan juga motivasi.</p>
        <p><b>Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain:</b></p>
        <ul>
            <li>Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest.</li>
            <li>Games oleh BEM STMIK Harvest.</li>
            <li>Sharing dan motivasi dari alumni.</li>
        </ul>
        <p><b>Rangkaian Seminar seperti:</b></p>
        <ul>
            <li>“A Good Habit Starts from a Good Character” oleh Bpk Yohanes Sumarno.</li>
            <li>“Technopreneur” oleh Bpk Beny Saputro, CEO Nataproperty (Nataproperty.com).</li>
        </ul>
        ';
        $data->location = 'STMIK Harvest';
        $data->start = '2016-09-17 08:00:00';
        $data->end = '2016-09-17 19:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 3;
        $data->name = 'Citra Berkat High School Citra Raya Tangerang Seminar';
        $data->name_id = 'Seminar SMA Citra Berkat Citra Raya';
        $data->description = "
        <p>Sexuality & Pornography Seminar for Citra Berkat Citra Raya Tangerang High School students took place on February 14, 2017.</p>
        <p>In the context of Valentine's Day, which is widely celebrated by young people, Citra Berkat School holds a Sexuality & Pornography seminar, so that students at Citra Berkat High School can become more mature individuals in the face of the times.</p>
        <p><b>This seminar is carried out with a series of activities, including:</b></p>
        <ul>
            <li>Separate sexuality seminar for men & women.</li>
            <li>A joint seminar on the dangers of pornography.</li>
            <li>Responses and impressions of messages from students.</li>
        </ul>
        <p><b>Seminar hosted by:</b></p>
        <ul>
            <li>Mr Charlton from World Teach Indonesia.</li>
            <li>Yasinta Indrianti, M.Psi, Psychologist from STMIK Harvest.</li>
        </ul>
        ";
        $data->description_id = '
        <p>Seminar Seksualitas & Pornografi untuk siswa/i SMA Citra Berkat Citra Raya Tangerang berlangsung pada tanggal 14 Februari 2017.</p>
        <p>Dalam rangka acara hari Valentine yang dirayakan secara luas oleh anak muda, sekolah Citra Berkat mengadakan seminar Seksualitas & Pornografi, agar siswa siswi di SMA Citra Berkat bisa menjadi pribadi yang lebih dewasa dalam menghadapi perkembangan jaman.</p>
        <p><b>Seminar ini dilaksanakan dengan serangkaian kegiatan antara lain:</b></p>
        <ul>
            <li>Seminar seksualitas terpisah untuk laki-laki & perempuan.</li>
            <li>Seminar gabungan mengenai bahaya pornografi.</li>
            <li>Tanggapan dan kesan pesan dari para murid.</li>
        </ul>
        <p><b>Seminar dibawakan oleh:</b></p>
        <ul>
            <li>Bpk Charlton dari World Teach Indonesia.</li>
            <li>Yasinta Indrianti, M.Psi, Psikolog dari STMIK Harvest.</li>
        </ul>
        ';
        $data->location = 'SMA Citra Berkat, Citra Raya, Tangerang';
        $data->start = '2017-02-14 10:30:00';
        $data->end = '2017-02-14 14:30:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 3;
        $data->name = 'PGRI 1 Tangerang Vocational High School Motivation Seminar';
        $data->name_id = 'Seminar Motivasi SMK PGRI 1 Tangerang';
        $data->description = '
        <p>The motivational seminar for new students at SMK PGRI 1 Tangerang will take place on July 21, 2017.</p>
        <p>In a series of new student orientations at SMK PGRI 1 Tangerang, STMIK Harvest brought a motivational material to 10th graders who had just joined. This motivational seminar aims to make the existing students more enthusiastic about entering a new chapter in their education and not to never give up for the future.</p>
        <p><b>Some points in this seminar:</b></p>
        <ul>
            <li>Believe in yourself.</li>
            <li>Be more wise with the time you have.</li>
            <li>Strive and try to improve yourself every day.</li>
        </ul>
        <p><b>Seminar hosted by:</b></p>
        <ul>
            <li>Yoas Arnest Sutopo, S.Inf, M.M, Marketing Manager of STMIK Harvest.</li>
        </ul>
        ';
        $data->description_id = '
        <p>Seminar Motivasi untuk siswa/i baru di SMK PGRI 1 Tangerang berlangsung pada tanggal 21 Juli 2017.</p>
        <p>Dalam rangkaian orientasi murid baru di SMK PGRI 1 Tangerang, STMIK Harvest membawakan sebuah materi motivasi kepada murid-murid kelas 10 yang baru saja bergabung. Seminar Motivasi ini bertujuan agar para siswa/i yang ada dapat lebih semangat memasuki babak baru dalam pendidikan mereka dan tidak pantang menyerah untuk keadaan yang akan datang.</p>
        <p><b>Beberapa poin dalam seminar ini:</b></p>
        <ul>
            <li>Percaya pada kemampuan diri sendiri.</li>
            <li>Lebih Bijaksama menggunakan waktu yang ada.</li>
            <li>Berjuang dan berusaha memperbaiki diri setiap harinya.</li>
        </ul>
        <p><b>Seminar dibawakan oleh:</b></p>
        <ul>
            <li>Yoas Arnest Sutopo, S.Inf, M.M, Marketing Manager STMIK Harvest.</li>
        </ul>
        ';
        $data->location = 'SMK PGRI 1 Tangerang';
        $data->start = '2017-07-21 08:00:00';
        $data->end = '2017-07-21 10:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 1;
        $data->name = 'New Student Orientation 2017/2018';
        $data->name_id = 'Orientasi Mahasiswa Baru 2017/2018';
        $data->description = '
        <p>New Student Orientation for STMIK Harvest Information System students for the 2017/2018 academic year took place on 9 September 2017.</p>
        <p>STMIK Harvest provides a series of motivational seminars, briefings, and introductions about campus.</p>
        <p><b>This student orientation is carried out with a series of activities, including:</b></p>
        <ul>
            <li>1. Matriculation to support students who still need additional lessons.</li>
            <li>2. Introduction of the departments and personnel in STMIK Harvest.</li>
            <li>3. Games to strengthen new students.</li>
        </ul>
        <p><b>Seminar series such as:</b></p>
        <ul>
            <li>1. Seminar on character.</li>
            <li>2. Seminar on creative thinking and beyond.</li>
            <li>3. Seminar to dare to fail.</li>
            <li>4. Seminar to dare to try new things.</li>
        </ul>
        ';
        $data->description_id = '
        <p>Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2017/2018 berlangsung pada tanggal 9 Sept 2017.</p>
        <p>STMIK Harvest memberikan serangkaian seminar motivasi, pembekalan, serta pengenalan tentang kampus.</p>
        <p><b>Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain:</b></p>
        <ul>
            <li>1. Matrikulasi untuk menunjang para mahasiswa yang masih memerlukan pelajaran tambahan.</li>
            <li>2. Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest.</li>
            <li>3. Games untuk mempererat mahasiswa baru.</li>
        </ul>
        <p><b>Rangkaian Seminar seperti:</b></p>
        <ul>
            <li>1. Seminar mengenai karakter.</li>
            <li>2. Seminar mengenai berpikir kreatif dan diluar batasan.</li>
            <li>3. Seminar untuk berani gagal.</li>
            <li>4. Seminar untuk berani mencoba hal-hal baru.</li>
        </ul>
        ';
        $data->location = 'STMIK Harvest, Gedung World Harvest Center, International Room';
        $data->start = '2017-09-09 08:00:00';
        $data->end = '2017-09-10 17:00:00';
        $data->tag = 'Orientation';
        $data->tag_id = 'Orientasi';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 1;
        $data->name = 'IP Activator Program';
        $data->name_id = 'IP Activator Program';
        $data->description = '
        <p>IP Activator Program at STMIK Harvest.</p>
        <p>IP Activator is an entrepreneurship program to encourage students to have ideas and learn how to become entrepreneurs quickly.</p>
        <p><b>The IP Activator program consists of:</b></p>
        <ul>
            <li>Mentoring session with Practitioners (CEO, COO, CFO, Director, VP, etc) / Entrepreneur (http://www.ipactivator.com/mentor) levels.</li>
            <li>Pitching Ideas: everyone is required to have an idea, and make it a reality.</li>
            <li>Interesting learning methods that make lectures more fun.</li>
        </ul>
        <p><b>Results from this program:</b></p>
        <ul>
            <li>Opportunity to meet with Business Mentors & Investors.</li>
            <li>The best 5 people will get seed funding of Rp. 100,000,000 (One Hundred Million Rupiah) to actually run their business.</li>
            <li>Get a chance to meet great people and the potential to get a job as an IT Professional
            <li>Lectures are more interesting and dynamic.</li>
        </ul>
        ';
        $data->description_id = '
        <p>Program IP Activator di STMIK Harvest.</p>
        <p>IP Activator adalah program enterpreneurship untuk mendorong para mahasiswa memiliki ide dan mempelajari bagaimana menjadi pengusaha dalam waktu yang cepat.</p>
        <p><b>Rangkaian program IP Activator terdiri dari:</b></p>
        <ul>
            <li>Mentoring session dengan Praktisi (Level CEO, COO, CFO, Direktur, VP, dll) / Pengusaha (http://www.ipactivator.com/mentor).</li>
            <li>Pitching Ideas: setiap orang dituntut untuk meiliki ide, dan menjadikan ide tersebut hingga bisa dijalankan.</li>
            <li>Metode pembelajaran yang menarik yang menjadikan perkuliahan menjadi lebih menyenangkan.</li>
        </ul>
        <p><b>Hasil yang didapatkan dari Program ini:</b></p>
        <ul>
            <li>Berkesempatan untuk bertemu dengan Mentor Bisnis & Investor.</li>
            <li>5 orang terbaik akan mendapatkan seed funding sebesar Rp. 100.000.000 (Seratus Juta Rupiah) untuk betul-betul menjalankan usaha / bisnis mereka.</li>
            <li>Mendapatkan kesempatan bertemu dengan orang-orang hebat dan potensi mendapatkan pekerjaan sebagai IT Professional
            <li>Perkuliahan yang lebih menarik dan dinamis.</li>
        </ul>
        ';
        $data->location = 'Plaza Semanggi 5th Floor, Jakarta';
        $data->start = '2018-03-05 19:00:00';
        $data->end = '2018-07-16 19:00:00';
        $data->image = Str::slug($data->name).'.png';
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
