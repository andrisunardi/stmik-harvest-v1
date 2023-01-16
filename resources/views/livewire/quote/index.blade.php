@section("title", trans("index.quote"))
@section("icon", "fas fa-commenting")
@section("quote-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Collection Of Quotes That You Need To See
            @else
                Kumpulan kutipan kutipan yang anda perlu lihat
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                @foreach ($quotes as $quote)
                    <blockquote class="blockquote">
                        <p class="mb-0">{{ $quote->name }}</p>
                        <footer class="blockquote-footer">{{ $quote->owner }}</footer>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </div>
</div>
