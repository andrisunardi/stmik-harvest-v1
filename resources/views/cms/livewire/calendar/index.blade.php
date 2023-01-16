@section("title", $pageTitle)
@section("icon", $pageIcon)

<div>
    <div class="card-group">
        @for ($i = now()->format("d"); $i < now()->addWeek()->format("d"); $i++)
            <div class="card">
                <img draggable="false" src="{{ asset("https://via.placeholder.com/100x100.png?text={$i}") }}" class="card-img-top w-100" alt="Date">
                <div class="card-body">
                    <h5 class="card-title">{{ $i }}</h5>
                    <p class="card-text">{{ fake()->paragraph() }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ fake()->name() }}</small>
                </div>
            </div>
        @endfor
    </div>
</div>
