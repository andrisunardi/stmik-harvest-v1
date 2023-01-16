@section("title", trans("index.history"))
@section("icon", "fas fa-history")
@section("history-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                History about our company and our service
            @else
                Sejarah tentang perusahaan kami dan layanan kami
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ trans("index.history") }} {{ env("APP_NAME") }}</h2>
                {!! App::isLocale('en') ? Str::setting('about_us') : Str::setting('about_us_idn') !!}
            </div>
        </div>
    </div>

    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ trans("index.vision_and_mission") }}</h2>
                {!! App::isLocale('en') ? Str::setting('vision_and_mission') : Str::setting('vision_and_mission_idn') !!}
            </div>
        </div>
    </div>

    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ trans("index.our_journey") }}</h2>
                <div class="timeline ms-3">
                    @foreach ($histories as $history)
                        <div class="item">
                            <div class="dot bg-primary"></div>
                            <div class="content">
                                <h4 class="title">{{ $history->translate_name }}</h4>
                                <div class="text">{{ $history->translate_description }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">
                    @if (App::isLocale("en"))
                        Develop and Innovate with DIW.co.id in Indonesia
                    @else
                        Berkembang dan Berinovasi dengan DIW.co.id di Indonesia
                    @endif
                </h2>
                <p>
                    @if (App::isLocale("en"))
                        Have ambitions and dreams to succeed and need challenges? We are opening up opportunities for you to develop a career at DIW.co.id that offers tremendous opportunities to impact almost every aspect of our business. Join our creative and collaborative environment, and discover the extent to which your ideas can be realized.
                    @else
                        Memiliki ambisi dan impian untuk sukses dan butuh tantangan? Kami membuka peluang bagi Anda untuk mengembangkan karir di DIW.co.id yang menawarkan peluang luar biasa untuk memengaruhi hampir semua aspek bisnis kami. Bergabunglah dengan lingkungan kreatif dan kolaboratif kami, dan temukan sejauh mana ide Anda dapat direalisasikan.
                    @endif
                </p>
                <a draggable="false" href="{{ route("career.index") }}" class="btn btn-primary">
                    <ion-icon name="rocket-outline"></ion-icon>
                    {{ trans("index.join_our_team") }}
                </a>
            </div>
        </div>
    </div>
</div>
