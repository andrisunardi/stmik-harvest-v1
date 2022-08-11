@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">
                            {{ trans("index.welcome_to") }}
                            {{ env("APP_NAME") }}
                        </h2>
                        <p>College for Future Technopreneur</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about">
                        <p class="about__details">
                            {!! html_entity_decode($setting->translate_about_us) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("index.our_vision") }}</h3>
                            {!! html_entity_decode($setting->translate_vision) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("index.our_mission") }}</h3>
                            {!! html_entity_decode($setting->translate_mission) !!}
                        </p>
                        {{-- <p class="about__details">
                            Yayasan STMIK Harvest memiliki sebuah perguruan tinggi bernama STMIK Kuwera <b>(Sedang Proses menjadi STMIK Harvest)</b>. Berdiri sejak 1987, bermula di Jakarta selatan, hingga saat ini masih berdiri dengan visi dan misi yang baru dan lebih terdepan mengikuti perkembangan jaman teknologi saat ini.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("index.our_vision") }}</h3>
                            Terwujudnya program studi sistem informasi yang unggul dengan menciptakan lulusan yang cerdas dan kompetitif serta memiliki semangat technoprenuership yang memiliki karakter kepemimpinan pada tahun 2025.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("index.our_mission") }}</h3>
                            Menyelenggarakan pendidikan dalam bidang sistem informasi.<br>
                            <br>
                            Melaksanakan kajian-kajian dan pengembangan guna menghasilkan inovasi yang mendukung pengembangan kehidupan bermasyarakat, khususnya di bidang sistem informasi.<br>
                            <br>
                            Menyiapkan lulusan di bidang sistem informasi yang siap bekerja sekaligus memiliki kemampuan berwirausaha.<br>
                            <br>
                            Mengembangkan pendidikan sistem informasi yang mengedepankan pengembangan karakter di bidang kepemimpinan yang berwawasan global.
                        </p> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="about__details">
                        <h3 class="text-uppercase mb-2">{{ trans("index.our_history") }}</h3>
                        {!! html_entity_decode($setting->translate_history) !!}
                    </p>
                    {{-- <p class="about__details">
                        <h3 class="text-uppercase mb-2">{{ trans("index.our_history") }}</h3>
                        STMIK KUWERA didirikan pada 17 Desember 1987. Pada tahun 2014, STMIK Kuwera melakukan relokasi dan sedang melakukan peberubahan nama menjadi STMIK HARVEST.
                    </p> --}}
                    <div class="about__thumb mt-5">
                        <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/about-us.webp") }}" alt="{{ trans("index.about_us") }} - {{ env("APP_TITLE") }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
