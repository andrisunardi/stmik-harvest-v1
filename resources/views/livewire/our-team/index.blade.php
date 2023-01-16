@section("title", trans("index.our_team"))
@section("icon", "fas fa-users")
@section("our-team-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                We have professional and innovate team to deliver project on time
            @else
                Kami memiliki tim profesional dan berinovasi untuk menyelesaikan proyek tepat waktu
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="row">
            @foreach($teams as $team)
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                    <div class="item">
                        <div class="user-card">
                            <img draggable="false" class="imaged w-100" src="{{ $team->assetImage() }}" alt="{{ $team->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.team") }} - {{ $team->name }}">
                            <h6 class="title h6 mt-2">{{ $team->name }}</h6>
                            <strong>{{ $team->access?->name }}</strong>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
