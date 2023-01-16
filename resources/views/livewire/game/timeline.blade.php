@section("title", trans("index.timeline"))
@section("icon", "fas fa-th-large")
@section("news-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                We develop many news from beginning until now and never stop create something amazing
            @else
                Kami mengembangkan banyak news dari awal hingga sekarang dan tidak pernah berhenti menciptakan sesuatu yang menakjubkan
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <div class="timeline timed ms-1 me-2">
                @foreach($newss as $news)
                    <div class="item">
                        <span class="time">{{ $news->datetime?->isoFormat("LL") }}</span>
                        <div class="dot bg-primary"></div>
                        <div class="content">
                            <h4 class="title text-truncate fw-bold">
                                <a draggable="false" href="{{ route("news.view", ["slug" => $news->slug]) }}">{{ $news->name }}</a>
                            </h4>
                            @if ($news->newsCategory)
                                <div class="text text-truncate mt-2 mb-2">
                                    <a draggable="false" href="{{ route("news.category.view", ["slug" => $news->newsCategory->slug]) }}">
                                        {{ $news->newsCategory->name }}
                                    </a>
                                </div>
                            @endif
                            <div class="text text-truncate">
                                {!! strip_tags($news->description) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (10 * $page < $totalNews)
                <div class="m-2">
                    <button type="button" class="btn btn-block btn-primary" wire:click="loadMore()" wire:loading.attr="disabled">
                        <ion-icon name="albums-outline" wire:ignore></ion-icon>
                        {{ trans("index.load_more") }}
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
