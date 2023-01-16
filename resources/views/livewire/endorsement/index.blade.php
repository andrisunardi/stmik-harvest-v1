@section("title", trans("index.endorsement"))
@section("icon", "fas fa-users")
@section("endorsement-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                They all support us to endorse our service
            @else
                Mereka semua mendukung kami untuk mendukung layanan kami
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="row">
            @foreach($endorsements as $endorsement)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <a draggable="false" href="{{ $endorsement->link }}" target="_blank">
                                <img draggable="false" class="imaged w-100" src="{{ asset("images/buy-endorse/{$endorsement->screenshot}") }}" alt="@yield("title") - {{ $endorsement->user?->name }} - {{ env("APP_TITLE") }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.click_to_open_post	") }} {{ $endorsement->user?->name }} {{ trans("index.at") }} {{ $endorsement->social_media }}">
                            </a>
                            <h3 class="mt-2">{{ $endorsement->user?->name }}</h3>
                            <h6><a draggable="false" href="https://www.instagram.com/{{ $endorsement->user?->instagram }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ $endorsement->social_media }} {{ "@" . $endorsement->user?->instagram }}">{{ $endorsement->social_media }} {{ "@" . $endorsement->user?->instagram }}</a></h6>
                            <strong>{{ $endorsement->datetime?->isoFormat("LL") }}</strong>
                        </div>
                        <div class="card-footer">
                            <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $endorsement->link }}" target="_blank">{{ trans("index.view_endorsement") }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
