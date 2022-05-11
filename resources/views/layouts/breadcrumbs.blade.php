<section id="hero_in" class="general"
    style="background: url({{ $banner?->assetImage() }}) center center no-repeat;">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp">
                <span></span>
                {{-- @yield("name") --}}
                {{ $banner?->translate_name }}
                @if ($banner?->description && $banner?->description_id)
                    <p class="my-3">{{ $banner->translate_description }}</p>
                @endif
            </h1>
            <h3>{{ Breadcrumbs::render() }}</h3>
        </div>
    </div>
</section>
