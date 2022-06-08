<aside class="col-lg-3">
    <div class="widget">
        @if (Request::routeIs("{$menu_slug}.view"))
            <form method="get" role="form" action="{{ route("{$menu_slug}.index") }}">
                <div class="form-group">
                    <input type="search" name="search" id="search" class="form-control" placeholder="{{ trans("index.Search Here") }}" required />
                </div>
                <button type="submit" id="submit" class="btn_1 rounded"> {{ trans("index.Search") }}</button>
            </form>
        @else
            <form wire:submit.prevent="render" method="get" role="form" action="{{ route("{$menu_slug}.index") }}">
                <div class="form-group">
                    <input wire:model.lazy="search" type="search" name="search" id="search" class="form-control" placeholder="{{ trans("index.Search Here") }}" required />
                </div>
                <button wire:submit="render" type="button" id="submit" class="btn_1 rounded"> {{ trans("index.Search") }}</button>
            </form>
        @endif
    </div>

    <div class="widget">
        <div class="widget-title">
            <h4>{{ trans("index.Recent News") }}</h4>
        </div>
        <ul class="comments-list">
            @foreach ($data_recent_news as $recent_news)
                <li>
                    <div class="alignleft">
                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["news_slug" => $recent_news->slug]) }}">
                            <img draggable="false" src="{{ $recent_news->assetImage() }}" class="img-fluid w-100"
                                alt="{{ trans("index.News") }} - {{ $recent_news->translate_name }} - {{ env("APP_TITLE") }}">
                        </a>
                    </div>
                    <small>{{ Date::parse($recent_news->date)->format("d F Y") }}</small>
                    <h3><a draggable="false" href="{{ route("{$menu_slug}.view", ["news_slug" => $recent_news->slug]) }}">{{ $recent_news->translate_name }}</a></h3>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="widget">
        <div class="widget-title">
            <h4>{{ trans("index.News Categories") }}</h4>
        </div>
        <ul class="cats">
            @foreach ($data_news_category as $news_category)
                <li>
                    <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$news_category->id}" }}">
                        {{ $news_category->translate_name }}
                        <span>({{ $news_category->data_news->count() }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="widget">
        <div class="widget-title">
            <h4>{{ trans("index.Popular Tags") }}</h4>
        </div>
        <div class="tags">
            @if ($data_popular_tags?->data_tags())
                @foreach ($data_popular_tags->data_tags() as $popular_tags)
                    <a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($popular_tags) }}">{{ $popular_tags }}</a>
                @endforeach
            @endif
        </div>
    </div>
</aside>
