@section("title", trans("index.testimonials"))
@section("icon", "fas fa-comments")
@section("testimonials-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                What they said about us
            @else
                Apa yang mereka katakan tentang kami
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card text-center h-100">
                        <img draggable="false" class="imaged rounded-circle w100 m-auto mt-2" src="{{ $testimonial->user?->assetImage() }}" alt="{{ $testimonial->user?->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $testimonial->user?->name }}">
                        <div class="card-body">
                            <h3 class="title text-truncate">{{ $testimonial->user?->name }}</h3>
                            <h4><a draggable="false" href="{{ route("portfolio.view", ["slug" => $testimonial->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Portfolio {{ $testimonial->name }}">{{ $testimonial->name }}</a></h4>
                            <p class="text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ __("index.star") }}">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </p>
                            <p class="text-wrap">{!! $testimonial->testimonial !!}</p>
                        </div>
                        @if ($testimonial->source_testimonial)
                            <div class="card-footer">
                                <a draggable="false" class="btn btn-primary btn-block btn-sm" href="{{ $testimonial->source_testimonial }}" target="_blank">
                                    {{ trans("index.view_original_post") }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
