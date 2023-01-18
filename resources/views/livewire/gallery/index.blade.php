@section("title", trans("index.gallery"))
@section("icon", "fas fa-photo-film")
@section("gallery-active", "active")

<div>
    <div class="our__portfolio__area bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <ul id="ml-filters" class="ml-port-filter-nav">
                        <li data-filter="*" class="{{ $tag ? null : "is-checked" }}" wire:click="tag">{{ trans("index.all") }}</li>
                        @foreach ($categories as $category)
                            <li data-filter=".{{ Str::slug($category->translate_tag) }}" class="{{ $tag == Str::slug($category->translate_tag) ? "is-checked" : null }}" wire:click="tag('{{ Str::slug($category->translate_tag) }}')">{{ $category->translate_tag }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="ml-portfolio-page grid clearfix">
                        <div class="row">
                            @foreach ($galleries as $gallery)
                                <div class="pro-item col-md-6 col-lg-4 {{ Str::slug($gallery->translate_tag) }}">
                                    <div class="ml-portfolio">
                                        <div class="ml-port-thumb">
                                            <img draggable="false" class="img-fluid w-100" src="{{ $gallery->assetImage() }}" alt="{{ $gallery->altImage() }}">
                                        </div>
                                        <div class="ml-hover-information">
                                            <div class="ml-hover-action">
                                                @if ($gallery->category->value == 1)
                                                    <a draggable="false" href="{{ $gallery->assetImage() }}" data-lightbox="tfportimg" data-title="{{ $gallery->translate_name }}"><i class="icon ion-ios-search-strong"></i></a>
                                                @endif
                                                @if ($gallery->category->value == 2)
                                                    <a draggable="false" href="{{ $gallery->assetVideo() }}" target="_blank"><i class="icon ion-ios-videocam"></i></a>
                                                @endif
                                                @if ($gallery->category->value == 3)
                                                    <a draggable="false" href="{{ $gallery->youtube }}" target="_blank"><i class="icon ion-social-youtube"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-3 mb-1">{{ $gallery->translate_name }}</h3>
                                    <small>{{ Str::translate($gallery->category->name) }}</small>
                                    <p>{!! html_entity_decode($gallery->translate_description) !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{ $galleries->links("layouts.pagination") }}

            {{-- <div class="row mt--50 text-center">
                <div class="col-12">
                    <button class="text-center htc__load__btn">
                        <i class="fa fa-spinner fa-pulse"></i>
                        <span class="loadding-test">{{ trans("index.Loading") }}...</span>
                    </button>
                </div>
            </div> --}}
        </div>
    </div>
</div>
