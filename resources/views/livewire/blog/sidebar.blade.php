<div class="col-lg-3 sm-mt-40 xs-mt-40">
    <div class="htc__blog__right__sidebar">
        <div class="htc__blog__courses">
            <h2 class="title__style--2">{{ trans("index.all_category") }}</h2>
            <ul class="blog__courses">
                @foreach ($blogCategories as $blogCategory)
                    <li>
                        <a draggable="false" href="{{ route("blog.index") . "?category={$blogCategory->slug}" }}">
                            {{ $blogCategory->translate_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="blog__recent__courses">
            <h2 class="title__style--2">{{ trans("index.recent_blog") }}</h2>
            <div class="recent__courses__inner">
                @foreach ($recentBlogs as $recentBlog)
                    <div class="single__courses">
                        <div class="recent__post__thumb">
                            <a draggable="false" href="{{ route("blog.view", ["slug" => $recentBlog->slug]) }}">
                                <img draggable="false" class="img-fluid w-100" src="{{ $recentBlog->assetImage() }}" alt="{{ $recentBlog->altImage() }}">
                            </a>
                        </div>
                        <div class="recent__post__details">
                            <h2><a draggable="false" href="{{ route("blog.view", ["slug" => $recentBlog->slug]) }}">{{ $recentBlog->translate_title }}</a></h2>
                            @if ($recentBlog->blogCategory)
                                <a draggable="false" href="{{ route("blog.index") . "?category={$recentBlog->blogCategory->slug}" }}">
                                    <span class="post__price">
                                        {{ $recentBlog->blogCategory->translate_name }}
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
                            <a draggable="false" href="{{ route("blog.index") . "?search=" . Str::slug($popularTag) }}">
                                {{ $popularTag }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
