@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__service__area bg__white ptb--80">
        <div class="container">
            <div class="row htc__service__wrap">

                @foreach ($data_value as $value)
                    <div class="col-lg-3 col-md-4">
                        <div class="service text-center {{ !$loop->first ? "service__color--{$loop->iteration}" : null }}">
                            <div class="service__icon">
                                <i class="{{ $value->icon }}"></i>
                            </div>
                            <div class="service__details">
                                <h2><a draggable="false" href="javascript:;">{{ $value->translate_name }}</a></h2>
                                <p>{!! html_entity_decode($value->translate_description) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-3 col-md-4">
                    <div class="service text-center">
                        <div class="service__icon">
                            <i class="flaticon-student"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">Future Technology</a></h2>
                            <p>Mahasiswa akan mempelajari teknologi terdepan yang sangat dibutuhkan industri pada 5-10 tahun mendatang, seperti Cloud Computing, Mobile Technology, Big Data, Internet of Things, Business Intelligence, dll.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="service text-center service__color--2">
                        <div class="service__icon">
                            <i class="flaticon-graduation-cap"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">Future Technopreneur</a></h2>
                            <p>Mahasiswa akan dibekali dengan pengetahuan dan skill untuk menjadi technopreneur atau pemimpin bisnis TI melalui Harvest Start-up Center.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="service text-center service__color--3">
                        <div class="service__icon">
                            <i class="flaticon-classroom"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">21st Century Skills</a></h2>
                            <p>Mahasiswa akan diperlengkapi dengan soft skills yang sangat diperlukan untuk berkarir, yaitu Communication, Collaboration, Critical Thinking, Creativity and Innovation Skills.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="service text-center service__color--4">
                        <div class="service__icon">
                            <i class="flaticon-graduate-diploma"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">International Enrichment Program</a></h2>
                            <p>Bagi mahasiswa yang berprestasi, tersedia kesempatan magang di luar negeri seperti di Singapore, Australia, Korea Selatan dan Amerika Serikat.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="htc__findout__area bg__cat--3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="findout__wrap">
                        <div class="findout__inner">
                            <h2>Find out why students love <span>Educen Education!</span></h2>
                            <div class="findout__btn">
                                <a class="htc__btn btn--yellow" href="javascript:;">FIND OUT MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Welcome To") }} Yayasan STMIK Harvest</h2>
                        <p>College for Future Technopreneur</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about">
                        <p class="about__details">
                            {!! html_entity_decode($setting->translate_about_us) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our Vision") }}</h3>
                            {!! html_entity_decode($setting->translate_vision) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our Mission") }}</h3>
                            {!! html_entity_decode($setting->translate_mission) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our History") }}</h3>
                            {!! html_entity_decode($setting->translate_history) !!}
                        </p>
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/our-values-2.webp") }}" alt="{{ trans("page.Our Values") }} - 2 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__thumb">
                        <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/about-us.webp") }}" alt="{{ trans("page.About Us") }} - {{ env("APP_TITLE") }}">
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/our-values-1.webp") }}" alt="{{ trans("page.Our Values") }} - 1 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
