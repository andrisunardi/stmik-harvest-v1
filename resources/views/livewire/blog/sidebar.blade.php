<div class="col-lg-3 sm-mt-40 xs-mt-40">
    <div class="htc__blog__right__sidebar">
        <div class="htc__blog__courses">
            <h2 class="title__style--2">{{ trans("index.All Category") }}</h2>
            <ul class="blog__courses">
                @foreach ($data_blog_category as $blog_category)
                    <li><a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$blog_category->id}" }}">{{ $blog_category->translate_name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="blog__recent__courses">
            <h2 class="title__style--2">{{ trans("index.Recent Blog") }}</h2>
            <div class="recent__courses__inner">
                @foreach ($data_recent_blog as $recent_blog)
                    <div class="single__courses">
                        <div class="recent__post__thumb">
                            <a href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                                <img draggable="false" class="img-fluid w-100" src="{{ $recent_blog->assetImage() }}" alt="{{ trans("page.{$menu_name}") }} - {{ $recent_blog->translate_name }} - {{ env("APP_TITLE") }}">
                            </a>
                        </div>
                        <div class="recent__post__details">
                            <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">{{ $recent_blog->translate_name }}</a></h2>
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$recent_blog->blog_category->id}" }}">
                                <span class="post__price">
                                    {{ $recent_blog->blog_category->translate_name }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div class="blog__discount__area bg--8">
            <div class="blog__discount__inner">
                <h4>NEW SCHOOLYEAR</h4>
                <h2>GET 70% OFF</h2>
            </div>
        </div> --}}

        <div class="blog__tag mt--50">
            <h2 class="title__style--2">Tags</h2>
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
