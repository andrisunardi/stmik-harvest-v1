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

<div class="ht__bradcaump__area" data--black__overlay="4"
    style="background: rgba(0, 0, 0, 0) url({{ $banner?->assetImage() }}) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">
                            {{-- @yield("name") --}}
                            {{ $banner?->translate_name }}
                        </h2>
                        <h3>{{ Breadcrumbs::render() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
