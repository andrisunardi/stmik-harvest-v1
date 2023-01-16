@section("title", trans("index.payment_methods"))
@section("icon", "fas fa-credit-card")
@section("payment-methods-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Please Read Payment Methods
            @else
                Silahkan Baca Metode Pembayaran
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">@yield("title") {{ env("APP_NAME") }}</h2>
                {!! App::isLocale('en') ? Str::setting('payment_methods') : Str::setting('payment_methods_idn') !!}
            </div>
        </div>
    </div>
</div>
