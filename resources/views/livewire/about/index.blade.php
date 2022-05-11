@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.About HITS") }}</h2>
                <p>{{ trans("general.HITS Profile & History") }}</p>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-6 col-xl-3 wow" data-wow-offset="150">
                    <figure class="block-reveal">
                        <div class="block-horizzontal"></div>
                        <img draggable="false" src="{{ asset("images/logo.png") }}" class="img-fluid w-100" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                    </figure>
                </div>
                <div class="col-lg-5 col-xl-8">
                    <p>
                        Sekolah Tinggi Teologi Internasional Harvest (STTIH) atau disebut juga Harvest International Theological Seminary merupakan bentuk Sekolah Tinggi yang mengemban tugas dan fungsi perguruan tinggi dalam upaya mencerdaskan kehidupan bangsa, khususnya dalam pendidikan Teologi yang mengacu pada Undang-Undang Nomor 2 Tahun 1989 dan Peraturan Pemerintah No. 30 Tahun 1990 tentang penyelenggaraan pendidikan tinggi teologi.<br>
                        <br>
                        HITS didirikan pada tanggal 05 Oktober 1998 oleh Dr. Jimmy Oentoro, merupakan sekolah tinggi teologi yang berada dalam pembinaan dan pengolaan Yayasan Tuaian Dunia serta akademis oleh Dirjen Bimas (Kristen) Protestan, Departemen Agama Republik Indonesia, dan diasuh oleh International Full Gospel Fellowsip (IFGF).<br>
                        <br>
                        HITS mempunyai komitmen untuk mempersiapkan pemimpin-pemimpin yang unggul, terampil dan berdedikasi tinggi untuk memenuhi tantangan-tantangan masyarakat abad 21. Oleh sebab itu, HITS mengutamakan pengembangan karakter, kedisiplinan, dan kehidupan doa dan kasih para mahasiswanya sehingga menjadi gaya hidup dan dasar kepemimpinan. HITS menawarkan Program Studi Sarjana Teologi, Program Studi Pendidikan Agama Kristen, Program Studi Musik Gerejawi, serta Program Studi Pasca Sarjana dan Doctoral di bidang kepemimpinan dan transformasi. Setiap program studi telah terakreditasi oleh BAN PT.
                    </p>
                    {{-- <p><em>Ps. Jimmy Oentoro</em></p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container margin_120_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>{{ trans("general.About HITS") }}</h2>
            <p>{{ trans("general.HITS Profile & History") }}</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a draggable="false" class="box_feat" href="javascript:;">
                    <i class="pe-7s-paper-plane"></i>
                    <h3>{{ trans("general.Our Vision") }}</h3>
                    <p>
                        Menjadi Perguruan Tinggi Teologi yang unggul dan terdepan dalam bidang Teologi, Pendidikan Agama Kristen, Musik Gerejawi, Kepemimpinan Kristen, sehingga menghasilkan para teolog yang Alkitabiah, guru agama Kristen yang berwawasan global, musisi yang unggul, pemimpin kristen yang transformatif baik maupun masyarakat pada tahun 2025 dan menjadi peringkat sepuluh besar Perguruan Tinggi Teologi terbaik di Asia Tenggara pada tahun 2030.
                    </p>
                </a>
            </div>
            <div class="col-md-6 col-lg-8">
                <a draggable="false" class="box_feat" href="javascript:;">
                    <i class="icon-graduation-cap"></i>
                    <h3>{{ trans("general.Our Mission") }}</h3>
                    <p>
                        Menyiapkan dan membangun mahasiswa untuk menjadi pemimpin dalam bidang Teologi, Pendidikan Agama Kristen, Musik Gerejawi dan Kepemimpinan Kristen yang memenuhi Tridarma Perguruan Tinggi, yakni:<br>
                        <br>
                        Pertama, melaksanakan pembelajaran sesuai dengan kompetensi yang dimiliki serta memiliki intelektual, berdisiplin tinggi, bersikap positif, unggul secara akademik dan kehidupan rohani yang dewasa.<br>
                        <br>
                        Kedua, mendidik dan meningkatkan kemampuan dalam meneliti, mengembangkan ilmu teologi, agama, musik gerejawi dan kepemimpinan sehingga tercipta inovasi baru yang bermutu.<br>
                        <br>
                        Ketiga, melaksanakan pengabdian masyarakat melalui pelayanan di gereja masyarakat dalam rangka pengabdian ilmu teologi, pendidikan agama Kristen, musik gerejawi, dan kepemimpinan Kristen.
                    </p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a draggable="false" class="box_feat" href="javascript:;">
                    <i class="pe-7s-paper-plane"></i>
                    <h3>{{ trans("general.Our DNA") }}</h3>
                    <p>Covenant, Great Comission, Compassion, Cutting Edge, Champion.</p>
                </a>
            </div>
            <div class="col-md-6 col-lg-9">
                <a draggable="false" class="box_feat" href="javascript:;">
                    <i class="pe-7s-paper-plane"></i>
                    <h3>{{ trans("general.Accredited By BAN-PT") }}</h3>
                    <p>
                        Undergraduate Program,Theology : 2312/SK/BAN-PT/Akred/S/VII/2017 tanggal 11 Juli 2017<br>
                        Christian Education : 2311/SK/BAN-PT/Akred/S/VII/2017 tanggal 11 Juli 2017<br>
                        Church Music : 2313/SK/BAN-PT/Akred/S/VII/2017 tanggal 11 Juli 2017<br>
                        Postgraduate ProgramMaster of Christian Leadership : 0063/SK/BAN-PT/Akred/M/II/2016 tanggal 4 Februari 2016<br>
                        Doctor of Theology : 470/SK/BAN-PT/Akred/D/XII/2014 tanggal 15 Desember 2014.
                    </p>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white">
        <div class="container margin_120_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.Our Lecturers") }}</h2>
                <p>{{ trans("general.Meet Our Professional Lecturers") }}</p>
            </div>
            <div id="carousel" class="owl-carousel owl-theme">
                @foreach ($data_lecturer as $lecturer)
                    <div class="item">
                        <a draggable="false" href="{{ route("lecturer.view", ["lecturer_slug" => $lecturer->slug]) }}">
                            <div class="title">
                                <h4>{{ $lecturer->name }}<em>{{ $lecturer->job }}</em></h4>
                            </div>
                            <img draggable="false" class="img-fluid w-100"
                                src="{{ $lecturer->assetImage() }}"
                                alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
