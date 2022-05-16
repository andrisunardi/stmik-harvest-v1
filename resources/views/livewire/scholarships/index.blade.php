@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Scholarships Scheme") }}</h2>
                        <p>{{ trans("general.Harvest Education Assistance Program") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">Bantuan Pendidikan Harvest (BPH) diberikan kepada calon mahasiswa yang berhasil mendapatkan nilai memuaskan dalam Ujian Saringan Masuk STMIK Harvest. Bagi calon mahasiswa memiliki prestasi akademik di kelas maka bisa mendapatkan kesempatan potongan uang pangkal melalui jalur prestasi. Beasiswa diberikan mulai dari 25% hingga 100%.</p>
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" class="img-fluid w-100" src="{{ asset("images/scholarship/scholarship.webp") }}" alt="{{ trans("page.Scholarship") }} - 2 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
