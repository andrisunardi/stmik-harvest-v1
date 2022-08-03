@section("name", $event->translate_name)
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__courses__details__page bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="courses__details__top">
                        <h2>{{ $event->translate_name }}</h2>
                        <div class="courses__rating__price">
                            <div class="courses__top--left">
                                <div class="courses__teacher">
                                    <div class="crs__teacher__images">
                                        <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="Administrator - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                                    </div>
                                    <h4>Administrator</h4>
                                    <span>/</span>
                                    <h6>Admin</h6>
                                </div>

                                <ul class="rating">
                                    {{-- <li><i class="icon ion-android-star"></i></li>
                                    <li><i class="icon ion-android-star"></i></li>
                                    <li class="crs__review">Reviews (2)</li> --}}
                                    <li>
                                        @if ($event->event_category)
                                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$event->event_category?->slug}" }}">
                                                {{ $event->event_category?->translate_name }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="courses__top--right">
                                <span class="cres__price">{{ trans("index.event") }}</span>
                                <div class="crs__btn">
                                    <a class="htc__btn btn--theme" href="{{ route("contact-us.index") }}">
                                        {{ trans("index.contact", ["name" => trans("index.us")]) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt--50">
                <div class="col-lg-8">
                    <div class="htc__courses__leftsidebar">
                        <div class="courses__details__thumb">
                            <a draggable="false" href="{{ $event->assetImage() }}" target="_blank">
                                <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                            </a>
                        </div>
                        <div class="htc__crs__tab__wrap">
                            <ul class="courses__view mt--50 nav" role="tablist">
                                <li role="presentation" class="description">
                                    <a draggable="false" class="active" href="#description" role="tab" data-bs-toggle="tab">
                                        <i class="icon ion-ios-copy"></i> {{ trans("index.description") }}
                                    </a>
                                </li>
                                <li role="presentation" class="date-time">
                                    <a draggable="false" href="#date-time" role="tab" data-bs-toggle="tab">
                                        <i class="icon ion-ios-calendar"></i> {{ trans("index.Date Time") }}
                                    </a>
                                </li>
                                <li role="presentation" class="location">
                                    <a draggable="false" href="#location" role="tab" data-bs-toggle="tab">
                                        <i class="icon ion-android-map"></i> {{ trans("index.Location") }}
                                    </a>
                                </li>
                            </ul>

                            <div class="courses__tab__content">
                                <div id="description" role="tabpanel" class="single__crs__content tab-pane fade show active clearfix">
                                    <div class="single__crs__details">
                                        <h2>{{ trans("index.description", ["name" => trans("index.event")]) }}</h2>
                                        <p>{!! html_entity_decode($event->translate_description) !!}</p>
                                    </div>
                                </div>

                                <div id="date-time" role="tabpanel" class="single__crs__content tab-pane fade clearfix">
                                    <div class="single__crs__details">
                                        <p>
                                            {{ trans("index.start") }} : {{ Date::parse($event->start)->format("H:i:s - d F Y") }}
                                            <br>
                                            {{ Date::parse($event->start)->diffForHumans() }}
                                        </p>
                                    </div>
                                    <div class="single__crs__details">
                                        <p>
                                            {{ trans("index.end") }} : {{ Date::parse($event->end)->format("H:i:s - d F Y") }}
                                            <br>
                                            {{ Date::parse($event->end)->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                                <div id="location" role="tabpanel" class="single__crs__content tab-pane fade clearfix">
                                    <div class="riview__wrap mt--30">
                                        <p>{{ $event->location }}</p>
                                        {{-- <div class="review">
                                            <div class="review__thumb">
                                                <img src="images/team/1.jpg" alt="review images">
                                            </div>
                                            <div class="review__details">
                                                <div class="review__info">
                                                    <h4><a draggable="false" href="#">Nipa Bali</a></h4>
                                                    <ul class="ht__rating">
                                                        <li><i class="icon ion-ios-star"></i></li>
                                                    </ul>
                                                    <div class="rating__send">
                                                        <a draggable="false" href="#"><i class="icon ion-reply"></i></a>
                                                        <a draggable="false" href="#"><i class="icon ion-android-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="review__date">
                                                    <span>27 Jun, 2016 at 2:30pm</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend.</p>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="courses__content__wrap mt--40 list__view__page">
                            <h2 class="title__style--3">{{ trans("index.related", ["name" => trans("index.event")]) }}</h2>
                            <div class="row">
                                @foreach ($data_other_event as $other_event)
                                    <div class="col-md-6">
                                        <div class="courses">
                                            <div class="courses__thumb">
                                                <a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $other_event->slug]) }}">
                                                    <img draggable="false" class="img-fluid w-100" src="{{ $other_event->assetImage() }}" alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $other_event->translate_name }} - {{ env("APP_TITLE") }}">
                                                </a>
                                                <div class="courses__hover__info">
                                                    <div class="courses__hover__action">
                                                        <div class="courses__hover__thumb">
                                                            <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="Administrator - {{ $other_event->translate_name }} - {{ env("APP_TITLE") }}">
                                                        </div>
                                                        <h4>Administrator</h4>
                                                        <span class="crs__separator">/</span>
                                                        <p>Admin</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="courses__details">
                                                <div class="courses__details__inner">
                                                    <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $other_event->slug]) }}">{{ $other_event->translate_name }}</a></h2>
                                                    <p>{{ strip_tags(Str::limit($other_event->translate_description, 100)) }}</p>
                                                </div>
                                                <ul class="courses__meta">
                                                    <li class="crs__price">
                                                        <i class="icon ion-calendar"></i>
                                                        {{ Date::parse($other_event->start)->format("d M Y H:i") }} -
                                                        {{ Date::parse($other_event->end)->format("d M Y H:i") }}
                                                    </li>
                                                </ul>
                                                <ul class="courses__meta">
                                                    <li>
                                                        <i class="icon ion-map"></i>
                                                        {{ $other_event->location }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 sm-mt-40 xs-mt-40">
                    <div class="htc__courses__rightsidebar">
                        <div class="htc__blog__courses">
                            <h2 class="title__style--2">{{ trans("index.All Category") }}</h2>
                            <ul class="blog__courses">
                                @foreach ($data_event_category as $event_category)
                                    <li><a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$event_category->slug}" }}">{{ $event_category->translate_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="cres__features">
                            <h2 class="title__style--2">{{ trans("index.information", ["name" => trans("index.event")]) }}</h2>
                            <div class="crs__features__list">
                                <ul class="feature__duration text-nowrap">
                                    <li><i class="icon ion-ios-pricetag"></i> {{ trans("index.category") }} :</li>
                                    <li><i class="icon ion-android-calendar"></i> {{ trans("index.start") }} :</li>
                                    <li><i class="icon ion-android-calendar"></i> {{ trans("index.end") }} :</li>
                                    <li><i class="icon ion-map"></i> {{ trans("index.location") }} :</li>
                                </ul>
                                <ul class="feature__time">
                                    <li>
                                        @if ($event->event_category)
                                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$event->event_category?->slug}" }}">
                                                {{ $event->event_category?->translate_name }}
                                            </a>
                                        @endif
                                    </li>
                                    <li>{{ Date::parse($event->start)->format("H:i:s - d F Y") }}</li>
                                    <li>{{ Date::parse($event->end)->format("H:i:s - d F Y") }}</li>
                                    <li>{{ $event->location }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="blog__tag mt--50">
                            <h2 class="title__style--2">{{ trans("index.Tags") }}</h2>
                            <ul class="tag__list">
                                @if ($data_popular_tags?->data_tags())
                                    @foreach ($data_popular_tags->data_tags() as $popular_tags)
                                        <li><a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($popular_tags) }}">{{ $popular_tags }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="blog__recent__courses">
                            <h2 class="title__style--2">{{ trans("index.recent", ["name" => trans("index.event")]) }}</h2>
                            <div class="recent__courses__inner">
                                @foreach ($data_recent_event as $recent_event)
                                    <div class="single__courses">
                                        <div class="recent__post__thumb">
                                            <a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $recent_event->slug]) }}">
                                                <img draggable="false" class="img-fluid w-100" src="{{ $recent_event->assetImage() }}" alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $recent_event->translate_name }} - {{ env("APP_TITLE") }}">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $recent_event->slug]) }}">{{ $recent_event->translate_name }}</a></h2>
                                            @if ($recent_event->event_category)
                                                <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$recent_event->event_category->slug}" }}">
                                                    <span class="post__price">
                                                        {{ $recent_event->event_category->translate_name }}
                                                    </span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="ctrs__dtl__btn mt--30">
                                <a draggable="false" class="htc__btn btn--transparent" href="{{ route("{$menu_slug}.index") }}">
                                    {{ trans("index.back_to", ["name" => trans("index.event")]) }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
