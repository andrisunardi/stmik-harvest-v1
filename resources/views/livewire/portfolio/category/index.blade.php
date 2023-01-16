@section("title", trans("index.portfolio_category"))
@section("icon", "fas fa-th-large")
@section("portfolio-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                All Portfolio Category
            @else
                Semua Kategori Portfolio
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <ul class="listview flush transparent image-listview text">
            @foreach($portfolioCategories as $portfolioCategory)
                <li>
                    <a draggable="false" href="{{ route("portfolio.category.view", ["slug" => $portfolioCategory->slug]) }}" class="item">
                        <div class="in">
                            <div>{{ $portfolioCategory->name }}</div>
                            <span class="badge badge-primary">
                                {{ $portfolioCategory->portfolios->count() }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
