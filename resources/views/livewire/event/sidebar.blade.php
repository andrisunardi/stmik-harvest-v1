<div class="col-lg-3">
    <div class="htc__blog__right__sidebar mt--50">
        <div class="htc__blog__courses">
            <h2 class="title__style--2">{{ trans("index.all_category") }}</h2>
            <ul class="blog__courses">
                @foreach ($eventCategories as $eventCategory)
                    <li>
                        <a draggable="false" href="{{ route("event.index") . "?category={$eventCategory->slug}" }}">
                            {{ $eventCategory->translate_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="blog__recent__courses">
            <h2 class="title__style--2">{{ trans("index.recent_event") }}</h2>
            <div class="recent__courses__inner">
                @foreach ($recentEvents as $recentEvent)
                    <div class="single__courses">
                        <div class="recent__post__thumb">
                            <a draggable="false" href="{{ route("event.view", ["slug" => $recentEvent->slug]) }}">
                                <img draggable="false" class="img-fluid w-100" src="{{ $recentEvent->assetImage() }}" alt="{{ $recentEvent->altImage() }}">
                            </a>
                        </div>
                        <div class="recent__post__details">
                            <h2><a draggable="false" href="{{ route("event.view", ["slug" => $recentEvent->slug]) }}">{{ $recentEvent->translate_title }}</a></h2>
                            @if ($recentEvent->eventCategory)
                                <a draggable="false" href="{{ route("event.index") . "?category={$recentEvent->eventCategory->slug}" }}">
                                    <span class="post__price">
                                        {{ $recentEvent->eventCategory->translate_name }}
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="blog__tag mt--50">
            <h2 class="title__style--2">{{ trans("index.tags") }}</h2>
            <ul class="tag__list">
                @if ($popularTags?->tags())
                    @foreach ($popularTags->tags() as $popularTag)
                        <li>
                            <a draggable="false" href="{{ route("event.index") . "?search=" . Str::slug($popularTag) }}">
                                {{ $popularTag }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
