@section("title", trans("index.setting"))
@section("icon", "fas fa-cogs")
@section("setting-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                {{-- Send us the concept you want to make so we can analyze the processing time and price that suits you --}}
            @else
                {{-- Kirimkan konsep yang anda ingin buat agar kami bisa menganalisa waktu pengerjaan dan harga yang cocok untuk anda --}}
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">@yield("title") {{ env("APP_NAME") }}</h2>
                Test
            </div>
        </div>
    </div>
</div>
