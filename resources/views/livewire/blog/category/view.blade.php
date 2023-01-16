@section("title", $blogCategory->translate_name)
@section("icon", "fas fa-th-large")
@section("blog-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">{{ $blogCategory->translate_short_body }}</h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="row">

            @livewire('blog-sidebar-component', ["id" => null, "name" => null, "slug" => null])

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 order-first order-md-last">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-sm-6 col-xl-4 mb-2">
                            <div class="card h-100">
                                <a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.image") }}">
                                    <img draggable="false" class="card-img-top lozad w-100" src="{{ $blog->assetImage() }}" alt="{{ $blog->altImage() }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.title") }}">
                                            {{ $blog->translate_title }}
                                        </a>
                                    </h5>
                                    <h5 class="card-subtitle text-center mt-2 mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.date") }}">
                                        {{ $blog->datetime?->isoFormat("LL") }}
                                    </h5>
                                    <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.description") }}">
                                        {!! $blog->translate_short_body ?? strip_tags(Str::limit($blog->translate_body), 160) !!}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}" class="btn btn-primary btn-block btn-sm">
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
                        <button type="button" class="btn btn-block btn-{{ 8 * $page < $blogCategory->blogs->count() ? "primary" : "secondary disabled" }} mb-2" wire:click="loadMore()" wire:loading.attr="disabled" {{ 8 * $page < $blogCategory->blogs->count() ? null : "disabled" }}>
                            <ion-icon name="albums-outline" wire:ignore></ion-icon>
                            {{ trans("index.load_more") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
