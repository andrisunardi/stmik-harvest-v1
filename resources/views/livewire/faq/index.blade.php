@section("title", trans("index.faq"))
@section("icon", "fas fa-question")
@section("faq-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Find answers to commonly asked questions about our service. You can search for keywords or browse the list of topics
            @else
                Temukan jawaban atas pertanyaan umum tentang layanan kami. Anda dapat mencari kata kunci atau menelusuri daftar topik
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="accordion border-0" id="accordion-faq">
                    @foreach ($faqs as $faq)
                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $faq->id }}">
                                    {{ $faq->translate_question }}
                                </button>
                            </div>
                            <div id="faq-{{ $faq->id }}" class="accordion-body collapse" data-bs-parent="#accordion-faq">
                                <div class="accordion-content">
                                    {!! $faq->translate_answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <h5 class="card-title">{{ trans("index.still_have_question") }} ?</h5>
                <p class="card-text">
                    {{ trans("index.feel_free_to_contact_us") }}
                </p>
                <a draggable="false" href="{{ route("contact.index") }}" class="btn btn-dark"><ion-icon name="mail-open-outline"></ion-icon> {{ trans("index.contact") }}</a>
            </div>
        </div>
    </div>
</div>
