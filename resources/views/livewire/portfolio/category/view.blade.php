@section("title", $portfolioCategory->name)
@section("icon", "fas fa-th-large")
@section("portfolio-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">{{ $portfolioCategory->description }}</h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="row">

            @livewire('portfolio-sidebar-component', ["id" => null, "name" => null, "slug" => null])

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 order-first order-md-last">
                <div class="row">
                    @foreach($portfolios as $portfolio)
                        <div class="col-sm-6 col-lg-4 col-xl-3 mb-2">
                            <div class="card h-100">
                                <a draggable="false" href="{{ route("portfolio.view", ["slug" => $portfolio->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.portfolio_logo") }}">
                                    <img draggable="false" class="card-img-top lozad w-100" src="{{ $portfolio->assetLogo() }}" alt="{{ $portfolio->altLogo() }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a draggable="false" href="{{ route("portfolio.view", ["slug" => $portfolio->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.portfolio_name") }}">
                                            {{ $portfolio->name }}
                                        </a>
                                    </h5>
                                    <h5 class="card-subtitle text-center mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio_datetime") }}">
                                        {{ $portfolio->datetime?->isoFormat("LL") }}
                                    </h5>
                                    <p class="card-text text-center mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                        @for ($a = 0; $a < 5; $a++)
                                            <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                        @endfor
                                    </p>
                                    <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio_description") }}">
                                        {!! $portfolio->short_description ?? strip_tags(Str::limit($portfolio->description), 160) !!}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a draggable="false" href="{{ route("portfolio.view", ["slug" => $portfolio->slug]) }}" class="btn btn-primary btn-block btn-sm">
                                        {{ trans("index.read_more") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-block btn-{{ $page == 1 ? "secondary disabled" : "info" }} mb-2" wire:click="resetFilter()" wire:loading.attr="disabled" {{ $page == 1 ? "disabled" : null }}>
                            <ion-icon name="refresh-outline" wire:ignore></ion-icon>
                            {{ trans("index.reset_filter") }}
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-block btn-{{ 8 * $page < $portfolioCategory->portfolios->count() ? "primary" : "secondary disabled" }} mb-2" wire:click="loadMore()" wire:loading.attr="disabled" {{ 8 * $page < $portfolioCategory->portfolios->count() ? null : "disabled" }}>
                            <ion-icon name="albums-outline" wire:ignore></ion-icon>
                            {{ trans("index.load_more") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
