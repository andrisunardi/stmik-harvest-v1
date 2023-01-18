@section("title", trans("index.our_values"))
@section("icon", "fas fa-trophy")
@section("our-values-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">
                            {{ trans("index.our_values") }}
                            {{ env("APP_NAME") }}
                        </h2>
                        <p>College for Future Technopreneur</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about">
                        @foreach ($values as $value)
                            <p class="about__details">
                                <h3 class="text-uppercase mb-2">{{ $value->translate_name }}</h3>
                                {!! html_entity_decode($value->translate_description) !!}
                            </p>
                        @endforeach
                        {{-- <p class="about__details">
                            <h3 class="text-uppercase mb-2">Future Technology</h3>
                            Mahasiswa akan mempelajari teknologi terdepan yang sangat dibutuhkan industri pada 5-10 tahun mendatang, seperti Cloud Computing, Mobile Technology, Big Data, Internet of Things, Business Intelligence, dll.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">Future Technopreneur</h3>
                            Mahasiswa akan dibekali dengan pengetahuan dan skill untuk menjadi technopreneur atau pemimpin bisnis TI melalui Harvest Start-up Center.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">21st Century Skills</h3>
                            Mahasiswa akan diperlengkapi dengan soft skills yang sangat diperlukan untuk berkarir, yaitu Communication, Collaboration, Critical Thinking, Creativity and Innovation Skills.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">International Enrichment Program</h3>
                            Bagi mahasiswa yang berprestasi, tersedia kesempatan magang di luar negeri seperti di Singapore, Australia, Korea Selatan dan Amerika Serikat.
                        </p> --}}
                    </div>
                    <div class="about__thumb mt-3 mb-5 mb-lg-auto">
                        <img draggable="false" class="img-fluid w-100" src="{{ asset("images/our-values-2.webp") }}" alt="{{ trans("index.our_values") }} - 2 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__thumb">
                        <img draggable="false" class="img-fluid rounded-3 w-100" src="{{ asset("images/our-values-1.webp") }}" alt="{{ trans("index.our_values") }} - 1 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
