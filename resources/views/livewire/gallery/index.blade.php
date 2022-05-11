@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="container margin_60_35">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>{{ trans("general.Gallery Image") }}</h2>
            <p>{{ trans("general.Our Gallery Image Collection") }}</p>
        </div>
        <div class="grid">
            <ul class="magnific-gallery">
                @foreach ($data_gallery_image as $gallery_image)
                    <li>
                        <figure>
                            <img draggable="false" class="lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $gallery_image->assetImage() }}" alt="{{ $gallery_image->translate_name }} - {{ trans("general.{$menu_name}") }} - {{ env("APP_TITLE") }}">
                            <figcaption>
                                <div class="caption-content">
                                    <a draggable="false" href="{{ $gallery_image->assetImage() }}" title="{{ $gallery_image->translate_name }}" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>{{ $gallery_image->translate_name }}</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.Gallery Video") }}</h2>
                <p>{{ trans("general.Our Gallery Video Collection") }}</p>
            </div>
            <div class="grid">
                <ul class="magnific-gallery">
                    @foreach ($data_gallery_video as $gallery_video)
                        <li>
                            <figure>
                                <img draggable="false" class="lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $gallery_video->assetImage() }}" alt="{{ $gallery_video->translate_name }} - {{ trans("general.{$menu_name}") }} - {{ env("APP_TITLE") }}">
                                <figcaption>
                                    <div class="caption-content">
                                        <a draggable="false" href="{{ $gallery_video->category == 3 ? $gallery_video->youtube : $gallery_video->assetVideo() }}" class="video" title="{{ $gallery_image->translate_name }}">
                                            <i class="pe-7s-film"></i>
                                            <p>{{ $gallery_video->translate_name }}</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
