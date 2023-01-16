@section("title", trans("index.price_list"))
@section("icon", "fas fa-money")
@section("price-list-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                The following are the standard prices for our services which are cheap but not cheap. The price we offer is in accordance with the concept you want to make
            @else
                Berikut ini adalah standar harga jasa kami yang murah tapi bukan murahan. Harga yang kami tawarkan sesuai dengan konsep yang anda ingin buat
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="accordion border-0" id="accordion-price-list">
                    @foreach ($priceLists as $priceList)
                        <div class="item">
                            <div class="accordion-header">
                                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#price-list-{{ $priceList->id }}">
                                    {{ $priceList->translate_name }}
                                </button>
                            </div>
                            <div id="price-list-{{ $priceList->id }}" class="accordion-body collapse" data-bs-parent="#accordion-price-list">
                                <div class="accordion-content">
                                    <h5>{{ trans("index.price") }} : {{ $priceList->translate_price }}</h5>
                                    <p>{!! $priceList->translate_description !!}</p>
                                    <a draggable="false" class="btn btn-primary" href="{{ route("contact.index") }}">{{ trans("index.contact") }}</a>
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
