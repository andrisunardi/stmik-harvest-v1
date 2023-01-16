@section("title", trans("index.home"))
@section("icon", "fas fa-home")
@section("home-active", "active")

<div>
    <div class="section full mt-2">
        <div class="d-sm-none d-md-block">
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($newss as $news)
                            <li class="splide__slide">
                                <div class="card">
                                    <a draggable="false" href="{{ $news->link ?? route("news.view", ["slug" => $news->slug]) }}" target="{{ $news->link ? "_blank" : null }}">
                                        <img draggable="false" src="{{ $news->assetImage() }}" class="card w-100" alt="{{ $news->altImage() }}">
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-none d-sm-block d-md-none">
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($newss as $news)
                            <li class="splide__slide">
                                <div class="card">
                                    <a draggable="false" href="{{ $news->link ?? route("news.view", ["slug" => $news->slug]) }}" target="{{ $news->link ? "_blank" : null }}">
                                        <img draggable="false" src="{{ $news->assetImage() }}" class="card w-100" alt="{{ $news->altImage() }}">
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if ($marquee)
        <div class="section mt-2">
            <div class="alert alert-imaged alert-outline-primary bg-white" role="alert">
                <div class="icon-wrap">
                    <ion-icon name="megaphone-outline"></ion-icon>
                </div>
                <div class="mb-n3 w-100">
                    <marquee class="w-100 h-100" direction="left" scrollamount="5">{{ $marquee->name }}</marquee>
                </div>
            </div>
        </div>
    @endif

    <div class="section mt-2">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">
                <div class="stat-box bg-info">
                    <div class="title text-white">{{ trans("index.portfolio") }}</div>
                    <div class="value text-white" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.total") }} {{ trans("index.all") }} {{ trans("index.portfolio") }}">{{ $totalPortfolio }}</div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">
                <div class="stat-box bg-success">
                    <div class="title text-white">{{ trans("index.happy_clients") }}</div>
                    <div class="value text-white" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.total") }} {{ trans("index.all") }} {{ trans("index.happy_clients") }}">{{ $totalClient }}</div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">
                <div class="stat-box bg-warning">
                    <div class="title text-white">{{ trans("index.testimonials") }}</div>
                    <div class="value text-white" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.total") }} {{ trans("index.all") }} {{ trans("index.testimonials") }}">{{ $totalTestimonial }}</div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-2">
                <div class="stat-box bg-danger">
                    <div class="title text-white">{{ trans("index.experience") }}</div>
                    <div class="value text-white" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.total") }} {{ trans("index.all") }} {{ trans("index.years") }} {{ trans("index.experience") }}">{{ $experience }} {{ trans("index.years") }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="section full">
        <div class="section-heading padding">
            <h2 class="title">{{ trans("index.latest_portfolio") }}</h2>
            <a draggable="false" href="{{ route("portfolio.index") }}" class="link text-primary">{{ trans("index.view_all") }}</a>
        </div>

        <div class="d-none d-sm-block">
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($portfolios as $portfolio)
                            <li class="splide__slide">
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
                                    <hr>
                                    <div class="text-center mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio_category") }}">
                                        <a draggable="false" href="{{ route("portfolio.category.view", ["slug" => $portfolio->portfolioCategory->slug]) }}" >
                                            {{ $portfolio->portfolioCategory->name }}
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" href="{{ route("portfolio.view", ["slug" => $portfolio->slug]) }}" class="btn btn-primary btn-block btn-sm">
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
                        @foreach($portfolios as $portfolio)
                            <li class="splide__slide">
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
                                        <h5 class="card-subtitle text-center mt-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio_datetime") }}">
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
                                    <hr>
                                    <div class="text-center mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio_category") }}">
                                        <a draggable="false" href="{{ route("portfolio.category.view", ["slug" => $portfolio->portfolioCategory->slug]) }}" >
                                            {{ $portfolio->portfolioCategory->name }}
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" href="{{ route("portfolio.view", ["slug" => $portfolio->slug]) }}" class="btn btn-primary btn-block btn-sm">
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

    <div class="section full mt-2">
        <div class="section-heading padding">
            <h2 class="title">{{ trans("index.latest_testimonials") }}</h2>
            <a draggable="false" href="{{ route("testimonials.index") }}" class="link text-primary">{{ trans("index.view_all") }}</a>
        </div>

        <div class="d-none d-sm-block">
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($testimonials as $testimonial)
                            <li class="splide__slide">
                                <div class="bill-box">
                                    <div class="img-wrapper">
                                        <a draggable="false" href="{{ route("portfolio.view", ["slug" => $testimonial->slug]) }}">
                                            <img draggable="false" class="image-block imaged w100 rounded-circle" src="{{ $testimonial->user->assetImage() }}" alt="{{ $testimonial->user->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.user_name") }}">
                                        </a>
                                    </div>
                                    <h3 class="title text-truncate">{{ $testimonial->user->name }}</h3>
                                    <h4><a draggable="false" href="{{ route("portfolio.view", ["slug" => $testimonial->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio") }} {{ $testimonial->name }}">{{ $testimonial->name }}</a></h4>
                                    <p class="text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                        @for ($a = 0; $a < 5; $a++)
                                            <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                        @endfor
                                    </p>
                                    <p class="text-truncate">{!! $testimonial->testimonial !!}</p>
                                    <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $testimonial->source_testimonial ? $testimonial->source_testimonial : route("testimonials.index") }}" @if ($testimonial->source_testimonial) target="_blank" @endif>{{ trans("index.read_more") }}</a>
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
                        @foreach($portfolios as $portfolio)
                            <li class="splide__slide">
                                <div class="bill-box">
                                    <div class="img-wrapper">
                                        <a draggable="false" href="{{ route("portfolio.view", ["slug" => $testimonial->slug]) }}">
                                            <img draggable="false" class="image-block imaged w100 rounded-circle" src="{{ $testimonial->user->assetImage() }}" alt="{{ $testimonial->user->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.user_name") }}">
                                        </a>
                                    </div>
                                    <h3 class="title text-truncate">{{ $testimonial->user->name }}</h3>
                                    <h4><a draggable="false" href="{{ route("portfolio.view", ["slug" => $testimonial->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.portfolio") }} {{ $testimonial->name }}">{{ $testimonial->name }}</a></h4>
                                    <p class="text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                        @for ($a = 0; $a < 5; $a++)
                                            <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                        @endfor
                                    </p>
                                    <p class="text-truncate">{!! $testimonial->testimonial !!}</p>
                                    <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $testimonial->source_testimonial ? $testimonial->source_testimonial : route("testimonials.index") }}" @if ($testimonial->source_testimonial) target="_blank" @endif>{{ trans("index.read_more") }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-2">
        <h2 class="title text-center">{{ trans("index.our_framework") }}</h2>
        <h4 class="subtitle text-center">{{ trans("index.we_working_with_this_tools") }}</h4>
        <div class="row">
            @foreach ($frameworks as $framework)
                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                    <div class="bill-box">
                        <div class="img-wrapper">
                            <a draggable="false" href="{{ $framework->link }}" target="_blank">
                                <img draggable="false" src="{{ $framework->assetImage() }}" class="image-block imaged w-100" alt="{{ $framework->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $framework->name }}">
                            </a>
                        </div>
                        <h4 class="mt-3 text-truncate">{{ $framework->name }}</h4>
                        <p class="text-truncate">{{ $framework->description }}</p>
                        <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $framework->link }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $framework->name }}">{{ trans("index.source_link") }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="section full mt-2">
        <div class="section-heading padding">
            <h2 class="title">{{ trans("index.latest_blog") }}</h2>
            <a draggable="false" href="{{ route("blog.index") }}" class="link text-primary">{{ trans("index.view_all") }}</a>
        </div>
        <div class="row d-none d-lg-block">
            <div class="col-12">
                <div class="carousel-small owl-carousel owl-theme">
                    @foreach($blogs as $blog)
                        <div class="item">
                            <div class="card">
                                <a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}">
                                    <img draggable="false" class="w-100 lozad card-img-top" src="{{ asset("images/blog/" . $blog->image) }}" alt="{{ trans("index.blog") }} - {{ $blog->name }} - {{ env("APP_TITLE") }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.blog") }} - {{ $blog->name }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center text-truncate"><a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.blog") }} - {{ $blog->name }}">{{ $blog->name }}</a></h5>
                                    <h6 class="card-subtitle mb-1 text-center text-truncate"><a draggable="false" href="{{ route("blog.category", ["blog_category_slug" => $blog->blog_category->slug]) }}" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.blog-category") }} - {{ $blog->blog_category->name }}">{{ $blog->blog_category->name }}</a></h6>
                                    <p class="card-subtitle mt-1 mb-1 text-center text-truncate" data-toggle="tooltip" data-placement="bottom" title="{{ Date::parse($blog->datetime)->format("d F Y") }}">{{ Date::parse($blog->datetime)->format("d F Y") }}</a></h6>
                                    <p class="card-text text-truncate">{!! strip_tags($blog->description) !!}</p>
                                    <a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}" class="btn btn-primary btn-block btn-sm">{{ trans("index.read-more") }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row d-none d-sm-block d-lg-none">
            <div class="col-12">
                <div class="carousel-multiple owl-carousel owl-theme shadowfix">
                    @foreach($blogs as $blog)
                        <div class="item">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}">
                                        <img draggable="false" class="w-100 lozad card-img-top" src="{{ asset("images/blog/" . $blog->image) }}" alt="{{ trans("index.blog") }} - {{ $blog->name }} - {{ env("APP_TITLE") }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.blog") }} - {{ $blog->name }}">
                                    </a>
                                </div>
                                <h3 class="title text-truncate">{{ $blog->user->name }}</h3>
                                <h4><a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.blog") }} {{ $blog->name }}">{{ $blog->name }}</a></h4>
                                <p class="text-truncate">{!! $blog->blog !!}</p>
                                <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $blog->source_blog ? $blog->source_blog : route("blog.index") }}" @if ($blog->source_blog) target="_blank" @endif>{{ trans("index.read-more") }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row d-block d-sm-none">
            <div class="col-12">
                <div class="carousel-single owl-carousel owl-theme shadowfix">
                    @foreach($blogs as $blog)
                        <div class="item">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}">
                                        <img draggable="false" class="w-100 lozad card-img-top" src="{{ asset("images/blog/" . $blog->image) }}" alt="{{ trans("index.blog") }} - {{ $blog->name }} - {{ env("APP_TITLE") }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.blog") }} - {{ $blog->name }}">
                                    </a>
                                </div>
                                <h3 class="title text-truncate">{{ $blog->user->name }}</h3>
                                <h4><a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.blog") }} {{ $blog->name }}">{{ $blog->name }}</a></h4>
                                <p class="text-truncate">{!! $blog->blog !!}</p>
                                <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $blog->source_blog ? $blog->source_blog : route("blog.index") }}" @if ($blog->source_blog) target="_blank" @endif>{{ trans("index.read-more") }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

    <div class="section full mb-2">
        <div class="section-heading padding">
            <h2 class="title">{{ trans("index.latest_endorsement") }}</h2>
            <a draggable="false" href="{{ route("endorsement.index") }}" class="link text-primary">{{ trans("index.view_all") }}</a>
        </div>

        <div class="d-none d-sm-block">
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($endorsements as $endorsement)
                            <li class="splide__slide">
                                <div class="card text-center h-100">
                                    <div class="card-body">
                                        <a draggable="false" href="{{ $endorsement->link }}" target="_blank">
                                            <img draggable="false" class="imaged w-100" src="{{ asset("images/buy-endorse/{$endorsement->screenshot}") }}" alt="@yield("title") - {{ $endorsement->user?->name }} - {{ env("APP_TITLE") }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.click_to_open_post	") }} {{ $endorsement->user?->name }} {{ trans("index.at") }} {{ $endorsement->social_media }}">
                                        </a>
                                        <h3 class="mt-2">{{ $endorsement->user?->name }}</h3>
                                        <h6><a draggable="false" href="https://www.instagram.com/{{ $endorsement->user?->instagram }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ $endorsement->social_media }} {{ "@" . $endorsement->user?->instagram }}">{{ $endorsement->social_media }} {{ "@" . $endorsement->user?->instagram }}</a></h6>
                                        <strong>{{ $endorsement->datetime?->isoFormat("LL") }}</strong>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $endorsement->link }}" target="_blank">{{ trans("index.view_endorsement") }}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-sm-none">
            <div class="carousel-single splide d-sm-none">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($endorsements as $endorsement)
                            <li class="splide__slide">
                                <div class="card text-center h-100">
                                    <div class="card-body">
                                        <a draggable="false" href="{{ $endorsement->link }}" target="_blank">
                                            <img draggable="false" class="imaged w-100" src="{{ asset("images/buy-endorse/{$endorsement->screenshot}") }}" alt="@yield("title") - {{ $endorsement->user?->name }} - {{ env("APP_TITLE") }}" data-toggle="tooltip" data-placement="top" title="{{ trans("index.click_to_open_post	") }} {{ $endorsement->user?->name }} {{ trans("index.at") }} {{ $endorsement->social_media }}">
                                        </a>
                                        <h3 class="mt-2">{{ $endorsement->user?->name }}</h3>
                                        <h6><a draggable="false" href="https://www.instagram.com/{{ $endorsement->user?->instagram }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ $endorsement->social_media }} {{ "@" . $endorsement->user?->instagram }}">{{ $endorsement->social_media }} {{ "@" . $endorsement->user?->instagram }}</a></h6>
                                        <strong>{{ $endorsement->datetime?->isoFormat("LL") }}</strong>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $endorsement->link }}" target="_blank">{{ trans("index.view_endorsement") }}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
