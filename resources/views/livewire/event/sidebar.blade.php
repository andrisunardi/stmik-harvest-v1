<div class="col-lg-3">
    <div class="htc__blog__right__sidebar mt--50">
        <div class="htc__blog__courses">
            <h2 class="title__style--2">{{ trans("index.all_category") }}</h2>
            <ul class="blog__courses">
                @foreach ($data_event_category as $event_category)
                    <li><a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$event_category->slug}" }}">{{ $event_category->translate_name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="blog__recent__courses">
            <h2 class="title__style--2">{{ trans("index.recent_event") }}</h2>
            <div class="recent__courses__inner">
                @foreach ($data_recent_event as $recent_event)
                    <div class="single__courses">
                        <div class="recent__post__thumb">
                            <a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $recent_event->slug]) }}">
                                <img draggable="false" class="img-fluid w-100" src="{{ $recent_event->assetImage() }}" alt="{{ $recent_event->altImage() }}">
                            </a>
                        </div>
                        <div class="recent__post__details">
                            <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $recent_event->slug]) }}">{{ $recent_event->translate_name }}</a></h2>
                            @if ($recent_event->event_category)
                                <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$recent_event->event_category->slug}" }}">
                                    <span class="post__price">
                                        {{ $recent_event->event_category->translate_name }}
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
                @if ($data_popular_tags?->data_tags())
                    @foreach ($data_popular_tags->data_tags() as $popular_tags)
                        <li><a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($popular_tags) }}">{{ $popular_tags }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
