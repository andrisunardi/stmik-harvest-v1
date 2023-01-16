@section("title", trans("index.career"))
@section("icon", "fas fa-suitcase")
@section("career-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Are you interested in joining us? The following is a list of job vacancies that we need. Immediately register maybe you are one of our team.
            @else
                Anda tertarik bergabung bersama kami ? Berikut ini adalah daftar lowongan kerja yang kami butuhkan. Segera daftar mungkin anda adalah salah satu team kami.
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
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
            </div>
        </div>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="accordion border-0" id="accordion-career">
                    @foreach ($careers as $career)
                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#career-{{ $career->id }}">
                                    {{ $loop->iteration }}. {{ $career->translate_name }} ({{ Str::translate($career->status->name) }})
                                </button>
                            </div>
                            <div id="career-{{ $career->id }}" class="accordion-body collapse" data-bs-parent="#accordion-career">
                                <div class="accordion-content">
                                    <h5>{{ trans("index.location") }} : {{ $career->translate_location }}</h5>
                                    <h5>{{ trans("index.department") }} : {{ $career->translate_department }}</h5>
                                    <h5>{{ trans("index.datetime") }} : {{ $career->datetime?->isoFormat("LL") }}</h5>
                                    <hr>
                                    <p>{!! $career->translate_description !!}</p>
                                    <a draggable="false" class="btn btn-primary {{ $career->status->value == App\Enums\CareerStatus::Closed ? "disabled" : null }}" href="javascript:;" {{ $career->status == "0" ? "disabled" : null }}>{{ $career->status == App\Enums\CareerStatus::Closed ? trans("index.closed") : trans("index.apply_now") }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
