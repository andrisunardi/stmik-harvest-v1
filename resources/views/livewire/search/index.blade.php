@section("title", trans("index.search"))
@section("icon", "fas fa-search")
@section("search-active", "active")

<div>
    <div>
        <div class="extraHeader">
            <div class="search-form">
                <div class="form-group searchbox">
                    <input type="search" class="form-control" wire:model="search" placeholder="{{ trans("index.search") }}&hellip;" required>
                    <i class="input-icon">
                        <ion-icon name="search-outline" wire:ignore></ion-icon>
                    </i>
                </div>
            </div>
        </div>

        <div class="h-100">
            <div class="section mt-2">
                <h2 class="text-center h2">@yield("title")</h2>
                <h6 class="text-center h6">
                    @if (App::isLocale("en"))
                        Find what you are looking for here
                    @else
                        Temukan yang anda cari disini
                    @endif
                </h6>
            </div>

            <div class="section">
                @if ($search)
                    <div class="section-title">
                        {{ trans("index.found") }} {{ $totalSearch }} {{ trans("index.results_for") }} "<span class="text-primary">{{ $search }}</span>"
                    </div>
                @endif

                @if ($search)
                    <h4 class="title">{{ $portfolios->count() }} {{ trans("index.portfolio") }}</h4>
                    <div class="card">
                        <ul class="listview image-listview media transparent flush">
                            @foreach($portfolios as $portfolio)
                                <li>
                                    <a draggable="false" href="{{ route("portfolio.view", ["slug" => $portfolio->slug]) }}" class="item">
                                        <div class="imageWrapper border">
                                            <img draggable="false" class="imaged w64" src="{{ $portfolio->assetLogo() }}" alt="{{ $portfolio->altLogo() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.portfolio_logo") }} - {{ $portfolio->name }}">
                                        </div>
                                        <div class="in text-truncate">
                                            <div>
                                                {{ $portfolio->name }}
                                                {{-- <div class="text-muted">{!! strip_tags($portfolio->description) !!}</div> --}}
                                                <div class="text-muted">{{ $portfolio->portfolioCategory?->name }}</div>
                                                <div class="text-muted">{{ $portfolio->datetime?->isoFormat("LL") }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <a draggable="false" href="javascript:;" class="btn btn-block btn-primary mt-2" wire:click="postData()">{{ trans("index.load_more") }}</a> --}}

                    <h4 class="title mt-2">{{ $news->count() }} {{ trans("index.news") }}</h4>
                    <div class="card">
                        <ul class="listview image-listview media transparent flush">
                            @foreach($news as $newsRow)
                                <li>
                                    <a draggable="false" href="{{ $newsRow->link ?? route("news.view", ["slug" => $newsRow->slug]) }}" class="item">
                                        <div class="imageWrapper border">
                                            <img draggable="false" class="imaged w64" src="{{ $newsRow->assetImage() }}" alt="{{ $newsRow->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.image") }} - {{ $newsRow->translate_title }}">
                                        </div>
                                        <div class="in text-truncate">
                                            <div>
                                                {{ $newsRow->translate_title }}
                                                {{-- <div class="text-muted">{!! strip_tags($newsRow->description) !!}</div> --}}
                                                <div class="text-muted">{{ $newsRow->newsCategory?->translate_name }}</div>
                                                <div class="text-muted">{{ $newsRow->datetime?->isoFormat("LL") }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <a draggable="false" href="javascript:;" class="btn btn-block btn-primary mt-2">{{ trans("index.load_more") }}</a> --}}
                @endif
            </div>
        </div>
    </div>
</div>
