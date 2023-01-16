@section("title", trans("index.news_category"))
@section("icon", "fas fa-th-large")
@section("news-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                All News Category
            @else
                Semua Kategori News
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <ul class="listview flush transparent image-listview text">
            @foreach($newsCategories as $newsCategory)
                <li>
                    <a draggable="false" href="{{ route("news.category.view", ["slug" => $newsCategory->slug]) }}" class="item">
                        <div class="in">
                            <div>{{ $newsCategory->name }}</div>
                            <span class="badge badge-primary">
                                {{ $newsCategory->newss->count() }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
