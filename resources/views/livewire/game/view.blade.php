@section("title", $news->name)
@section("icon", "fas fa-th-large")
@section("news-active", "active")

<div>
    <div class="section mt-2">
        <div class="row">

            @livewire('news-sidebar-component', ["id" => null, "name" => null])

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 order-first order-md-last">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <img draggable="false" class="imaged img-rounded border w-100 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->assetLogo() }}" alt="{{ $news->altLogo() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.news_logo") }}">
                            </div>
                            <div class="col-12 col-sm-8 col-md-6 col-lg-8 col-xl-9">
                                <div class="d-block d-sm-none mt-2 mt-lg-0"></div>
                                <h1 class="h1 ">@yield("title")</h1>
                                <h6 class="h6"><a draggable="false" href="{{ route("news.category.view", ["slug" => $news->newsCategory->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.news_category") }}">{{ $news->newsCategory->name }}</a></h6>
                                <div>
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                        @for ($a = 0; $a < 5; $a++)
                                            <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                        @endfor
                                    </span>
                                </div>
                                <div>
                                    <span class="card-subtitle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.datetime") }}">
                                        {{ $news->datetime?->isoFormat("LL") }}
                                    </span>
                                </div>
                                <div class="mt-1">
                                    @if ($news->link)
                                        <a draggable="false" class="btn btn-outline-{{ $news->expired > now()->format("Y-m-d") ? "primary" : "danger" }} btn-sm" href="{{ $news->link }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $news->expired > now()->format("Y-m-d") ? trans("index.link_preview") : trans("index.link_preview_has_expired") }}">{{ $news->domain }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section mt-2 mb-2">

                    <div class="d-sm-none d-md-block">
                        <div class="carousel-single splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_1 && File::exists(public_path() . "/images/news/" . $news->image_1) ? asset("images/news/" . $news->image_1) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_2 && File::exists(public_path() . "/images/news/" . $news->image_2) ? asset("images/news/" . $news->image_2) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_3 && File::exists(public_path() . "/images/news/" . $news->image_3) ? asset("images/news/" . $news->image_3) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_4 && File::exists(public_path() . "/images/news/" . $news->image_4) ? asset("images/news/" . $news->image_4) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_5 && File::exists(public_path() . "/images/news/" . $news->image_5) ? asset("images/news/" . $news->image_5) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-sm-block d-md-none">
                        <div class="carousel-multiple splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->image_1 && File::exists(public_path() . "/images/news/" . $news->image_1) ? asset("images/news/" . $news->image_1) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->image_2 && File::exists(public_path() . "/images/news/" . $news->image_2) ? asset("images/news/" . $news->image_2) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->image_3 && File::exists(public_path() . "/images/news/" . $news->image_3) ? asset("images/news/" . $news->image_3) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->image_4 && File::exists(public_path() . "/images/news/" . $news->image_4) ? asset("images/news/" . $news->image_4) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card">
                                            <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                                                <img draggable="false" class="card w-100 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->image_5 && File::exists(public_path() . "/images/news/" . $news->image_5) ? asset("images/news/" . $news->image_5) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.click_to_preview") }}">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section full mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $news->name }}</h2>
                            <p>{!! $news->description !!}</p>
                            @if ($news->link)
                                <a draggable="false" class="btn btn-{{ $news->expired > now()->format("Y-m-d") ? "primary" : "danger" }}" href="{{ $news->link }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $news->expired > now()->format("Y-m-d") ? trans("index.link_preview") : trans("index.link_preview_has_expired") }}">
                                    <ion-icon name="link-outline"></ion-icon> {{ $news->domain }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="section full mt-2">
                    <div class="card text-center">
                        <img draggable="false" class="imaged rounded-circle w100 m-auto mt-2 lozad" src="{{ asset("images/loading-preview.gif") }}" data-src="{{ $news->user->assetImage() }}" alt="{{ $news->user->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $news->user->name }}">
                        <div class="card-body">
                            <h3 class="title text-truncate">{{ $news->user->name }}</h3>
                            <h4><a draggable="false" href="{{ route("news.view", ["slug" => $news->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.news") }} {{ $news->name }}">{{ $news->name }}</a></h4>
                            <p class="text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                @for ($a = 0; $a < 5; $a++)
                                    <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                @endfor
                            </p>
                            <p class="text-wrap">{!! $news->testimonial !!}</p>
                        </div>
                        @if ($news->source_testimonial)
                            <div class="card-footer">
                                <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $news->source_testimonial }}" target="_blank">{{ trans("index.source-link") }}</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="section full mt-2 mb-2">
                    <a draggable="false" href="#share" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#share">
                        <ion-icon name="share-outline"></ion-icon> {{ trans("index.share_this") }} {{ trans("index.news") }}
                    </a>
                </div>

                <div class="modal fade action-sheet inset" id="share" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans("index.share_with") }}</h5>
                            </div>
                            <div class="modal-body">
                                <ul class="action-button-list">
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://www.facebook.com/sharer/sharer.php?u={{ Str::substr(route("news.view", ["slug" => $news->slug]), 8) }}&quote={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan news $news->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share news $news->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-facebook">
                                                <ion-icon class="color-facebook" name="logo-facebook"></ion-icon>
                                                Facebook
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://twitter.com/intent/tweet?source={{ route("news.view", ["slug" => $news->slug]) }}&text={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan news $news->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share news $news->name because the results are very good and satisfying. Try to look, thank you." }}&via=DIW_co_id&hashtags=web&hashtags=website&hashtags=jasaweb&hashtags=jasawebsite&hashtags=domain&hashtags=hosting&hashtags=webdesign&hashtags=webservices&hashtags=webdevelopment&hashtags=design&hashtags=webmaster" target="_blank">
                                            <span class="color-twitter">
                                                <ion-icon class="color-twitter" name="logo-twitter"></ion-icon>
                                                Twitter
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl={{ route("news.view", ["slug" => $news->slug]) }}&title={{ $news->name }}&caption={{ $news->description }}&tags=website" target="_blank">
                                            <span class="color-tumblr">
                                                <ion-icon class="color-tumblr" name="logo-tumblr"></ion-icon>
                                                Tumblr
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="http://pinterest.com/pin/create/button/?url={{ route("news.view", ["slug" => $news->slug]) }}&description={{ $news->description }}" target="_blank">
                                            <span class="color-pinterest">
                                                <ion-icon class="color-pinterest" name="logo-pinterest"></ion-icon>
                                                Pinterest
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="http://www.linkedin.com/shareArticle?mini=true&url={{ Str::substr(route("news.view", ["slug" => $news->slug]), 8) }}&title={{ $news->name }}&summary={{ $news->description }}&source={{ route("news.view", ["slug" => $news->slug]) }}" target="_blank">
                                            <span class="color-linkedin">
                                                <ion-icon class="color-linkedin" name="logo-linkedin"></ion-icon>
                                                Linkedin
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="whatsapp://send?text={{ Str::substr(route("news.view", ["slug" => $news->slug]), 8) }} - {{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan news $news->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share news $news->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-whatsapp">
                                                <ion-icon class="color-whatsapp" name="logo-whatsapp"></ion-icon>
                                                Whatsapp
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://social-plugins.line.me/lineit/share?url={{ route("news.view", ["slug" => $news->slug]) }}&text={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan news $news->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share news $news->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-line">
                                                <ion-icon class="color-line fab fa-line"></ion-icon>
                                                Line
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://telegram.me/share/url?url={{ route("news.view", ["slug" => $news->slug]) }}&text={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan news $news->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share news $news->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-telegram">
                                                <ion-icon class="color-telegram fab fa-telegram"></ion-icon>
                                                Telegram
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://www.blogger.com/blog-this.g?u={{ route("news.view", ["slug" => $news->slug]) }}&n={{ $news->name }}&t={{ $news->description }}" target="_blank">
                                            <span class="color-blogger">
                                                <ion-icon class="color-blogger fab fa-blogger"></ion-icon>
                                                Blogger
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="section full mb-2">
        <div class="section-heading padding">
            <h2 class="title">{{ trans("index.related_news") }}</h2>
            <a draggable="false" href="{{ route("news.category.view", ["slug" => $news->newsCategory->slug]) }}" class="link text-primary">
                {{ trans("index.view_all") }}
            </a>
        </div>

        <div class="d-none d-sm-block">
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($relatedNewss as $relatedNews)
                            <li class="splide__slide">
                                <div class="card h-100">
                                    <a draggable="false" href="{{ route("news.view", ["slug" => $relatedNews->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.news_logo") }}">
                                        <img draggable="false" class="card-img-top lozad w-100" src="{{ $relatedNews->assetLogo() }}" alt="{{ $relatedNews->altLogo() }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <a draggable="false" href="{{ route("news.view", ["slug" => $relatedNews->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.news_name") }}">
                                                {{ $relatedNews->name }}
                                            </a>
                                        </h5>
                                        <h5 class="card-subtitle text-center mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.news_datetime") }}">
                                            {{ $relatedNews->datetime?->isoFormat("LL") }}
                                        </h5>
                                        <p class="card-text text-center mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                            @for ($a = 0; $a < 5; $a++)
                                                <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                            @endfor
                                        </p>
                                        <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.news_description") }}">
                                            {!! $relatedNews->short_description ?? strip_tags(Str::limit($relatedNews->description), 160) !!}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" href="{{ route("news.view", ["slug" => $relatedNews->slug]) }}" class="btn btn-primary btn-block btn-sm">
                                            {{ trans("index.read_more") }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-sm-none">
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($relatedNewss as $relatedNews)
                            <li class="splide__slide">
                                <div class="card h-100">
                                    <a draggable="false" href="{{ route("news.view", ["slug" => $relatedNews->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.news_logo") }}">
                                        <img draggable="false" class="card-img-top lozad w-100" src="{{ $relatedNews->assetLogo() }}" alt="{{ $relatedNews->altLogo() }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <a draggable="false" href="{{ route("news.view", ["slug" => $relatedNews->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.news_name") }}">
                                                {{ $relatedNews->name }}
                                            </a>
                                        </h5>
                                        <h5 class="card-subtitle text-center mt-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.news_datetime") }}">
                                            {{ $relatedNews->datetime?->isoFormat("LL") }}
                                        </h5>
                                        <p class="card-text text-center mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                            @for ($a = 0; $a < 5; $a++)
                                                <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                            @endfor
                                        </p>
                                        <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.news_description") }}">
                                            {!! $relatedNews->short_description ?? strip_tags(Str::limit($relatedNews->description), 160) !!}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" href="{{ route("news.view", ["slug" => $relatedNews->slug]) }}" class="btn btn-primary btn-block btn-sm">
                                            {{ trans("index.read_more") }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modalbox" id="preview" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@yield("title")</h5>
                    <a draggable="false" href="javascript:void(0);" data-bs-dismiss="modal">{{ trans("index.close") }}</a>
                </div>
                <div class="modal-body p-0">
                    <div class="carousel-full splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="card">
                                        <img draggable="false" class="w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_1 && File::exists(public_path() . "/images/news/" . $news->image_1) ? asset("images/news/" . $news->image_1) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}">
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="card">
                                        <img draggable="false" class="w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_2 && File::exists(public_path() . "/images/news/" . $news->image_2) ? asset("images/news/" . $news->image_2) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}">
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="card">
                                        <img draggable="false" class="w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_3 && File::exists(public_path() . "/images/news/" . $news->image_3) ? asset("images/news/" . $news->image_3) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}">
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="card">
                                        <img draggable="false" class="w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_4 && File::exists(public_path() . "/images/news/" . $news->image_4) ? asset("images/news/" . $news->image_4) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}">
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="card">
                                        <img draggable="false" class="w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $news->image_5 && File::exists(public_path() . "/images/news/" . $news->image_5) ? asset("images/news/" . $news->image_5) : asset("images/image-not-available.png") }}" alt="{{ trans("index.news") }} - {{ $news->name }} - {{ env("APP_TITLE") }}">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-2 d-block d-sm-none d-md-block d-lg-none">
                        <div class="alert alert-outline-primary fade show" role="alert">
                            <div>
                                {{ trans("index.please_rotate_your_phone_or_tablet_to_get_optimal_preview") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
