@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div wire:ignore class="slider__container slider__fixed_height slider__position--relative">
        <div class="slider__activation__wrap owl-carousel owl-theme">
            @foreach ($data_slider as $slider)
                @if ($loop->iteration == 1)
                    <div class="slide text__align--left slider__bg__color--1 fornt__image--right" style="background-image: url({{ $slider->assetImage() }}); background-size: cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider__display--center cd-intro">
                                        <div class="cd-intro-content mask-2">
                                            <div class="slider__inner content-wrapper">
                                                <div>
                                                    <h1 class="lh-sm">{{ $slider->translate_name }}</h1>
                                                    <p>{!! html_entity_decode($slider->translate_description) !!}</p>
                                                    <div class="slider__btn action-wrapper">
                                                        <a draggable="false" class="htc__btn btn--theme" href="{{ $slider->button_link }}">{{ $slider->translate_button_name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($loop->iteration == 2)
                    <div class="slide slider__bg__color--2 text__align--left fornt__image--right-3" style="background-image: url({{ $slider->assetImage() }}); background-size: cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 col-xl-7">
                                    <div class="slider__display--center cd-intro">
                                        <div class="slider__inner cd-intro-content scale">
                                            <h1 class="lh-sm">{{ $slider->translate_name }}</h1>
                                            <p>{!! html_entity_decode($slider->translate_description) !!}</p>
                                            <div class="slider__btn">
                                                <a draggable="false" class="htc__btn btn--theme" href="{{ $slider->button_link }}">{{ $slider->translate_button_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($loop->iteration == 3)
                    <div class="slide slider__bg__color--3 text__align--left fornt__image--right-2" style="background-image: url({{ $slider->assetImage() }}); background-size: cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider__display--center cd-intro">
                                        <div class="slider__inner cd-intro-content mask">
                                            <h1 class="lh-sm" data-content="{{ $slider->translate_name }}"><span>{{ $slider->translate_name }}</span></h1>
                                            <p>{!! html_entity_decode($slider->translate_description) !!}</p>
                                            <div class="slider__btn action-wrapper">
                                                <a draggable="false" class="htc__btn btn--theme" href="{{ $slider->button_link }}">{{ $slider->translate_button_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <section class="htc__offer__area bg--theme bg-success">
        <div class="container">
            <div class="row">
                @foreach ($data_offer as $offer)
                    <div class="col-md-6 col-lg-3">
                        <div class="offer text-center {{ $loop->first ? null : "offer__separator" }}">
                            <h2>{{ $offer->translate_name }}</h2>
                            <p>{!! html_entity_decode($offer->translate_description) !!}</p>
                            <div class="offer__btn">
                                <a draggable="false" class="htc__btn btn--transparent btn--small" href="{{ $offer->button_link }}">
                                    {{ $offer->translate_button_name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="col-lg-6">
                    <div class="about">
                        <div class="section__title text-left">
                            <h2 class="title__line lh-sm">{{ trans("general.Welcome To") }} {{ trans("general.Yayasan STMIK Harvest") }}</h2>
                            <p>{{ trans("general.College for Future Technopreneur") }}</p>
                        </div>
                        <p class="about__details">{!! html_entity_decode($setting->translate_about_us) !!}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__thumb">
                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/hmUwBHxYLDw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="htc__findout__area bg__cat--3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="findout__wrap my-5 my-sm-auto">
                        <div class="findout__inner">
                            <h2>
                                <span>{{ trans("general.Ready to Join ?") }}</span>
                                {{ trans("general.It easy now to you for being our part, just click the button below and fill out the form with your data.") }}
                            </h2>
                            <div class="findout__btn">
                                <a draggable="false" class="htc__btn btn--yellow" href="{{ route("online-registration.index") }}">{{ trans("general.Register") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section wire:ignore class="popular__courses__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">{{ trans("general.Our Events") }}</h2>
                        <p>{{ trans("general.Join our events to know us closer") }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="popular__courses__wrap indicator__style--1 owl-carousel owl-theme clearfix mt--30 xs-mt-0">
                    @foreach ($data_event as $event)
                        <div class="courses">
                            <div class="courses__thumb">
                                <a draggable="false" href="#"><img draggable="false" src="images/course/1.jpg" alt="courses images"></a>
                                <div class="courses__hover__info">
                                    <div class="courses__hover__action">
                                        <div class="courses__hover__thumb">
                                            <img draggable="false" src="{{ $event->assetImage() }}" alt="small images">
                                        </div>
                                        <h4><a draggable="false" href="#">Derek Spafford</a></h4>
                                        <span class="crs__separator">/</span>
                                        <p>Professor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses__details">
                                <div class="courses__details__inner">
                                    <h2><a draggable="false" href="courses-details.html">Mathematics and Statistics</a></h2>
                                    <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                </div>
                                <ul class="courses__meta">
                                    <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                    <li class="crs__price">$60.00</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}

    <section class="our__countdown__area ptb--100" data--theme__overlay="6" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-7">
                    <div class="countdown__wrap">
                        <div class="countdown__inner">
                            <h4>{{ trans("general.Now Open Admission For Registration") }}</h4>
                            <h2>{{ trans("general.Register Now") }}</h2>
                        </div>
                        <div class="ml-countdown-thumb">
                            <div class="box-timer">
                                <div class="countbox timer-grid">
                                    <div wire:ignore data-countdown="{{ $admission_calendar->date }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-5">
                    <div class="create__free__account__form">
                        <h2><i class="icon ion-android-document"></i> {{ trans("general.Online Registration") }}</h2>
                        <div class="account__form__box">
                            @if (now()->format("Y-m-d") <= $admission_calendar->date)
                                <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("index") }}" id="contact-form" autocomplete="off">
                                    @csrf

                                    @php $input = "name" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "email" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "phone" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="15" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "gender" @endphp
                                    <select wire:model="{{ $input }}" id="{{ $input }}" name="{{ $input }}"
                                        class="form-control mt-3 @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                        <option value="">{{ trans("general.Select") }} {{ trans("validation.attributes.{$input}") }}</option>
                                        <option value="1">{{ trans("general.Man") }}</option>
                                        <option value="2">{{ trans("general.Woman") }}</option>
                                    </select>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "school" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "major" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "city" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    @php $input = "type" @endphp
                                    <select wire:model="{{ $input }}" id="{{ $input }}" name="{{ $input }}"
                                        class="form-control mt-3 @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                        <option value="">{{ trans("general.Which Do You Prefer") }}</option>
                                        <option value="1">{{ trans("general.Morning - Afternoon Lecturer") }}</option>
                                        <option value="2">{{ trans("general.Study & Work (Evening Lecture)") }}</option>
                                    </select>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror

                                    <div class="mt-3">
                                        @include("layouts.alert")
                                    </div>

                                    <div class="acount__btn">
                                        <button class="htc__btn btn--theme btn--smll" type="button" wire:click="submit">{{ trans("button.Submit") }}</button>
                                    </div>
                                </form>
                            @else
                                <h3 class="mt-5 text-center text-danger">{{ trans("general.Registration Is Now Closed") }}</h2>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="our__upcoming__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">Upcoming events</h2>
                        <p>Upcoming Educational Events for your future career.</p>
                    </div>
                </div>
            </div>
            <div class="row upcoming__wrap mt-6">
                @foreach ($data_upcoming_event as $upcoming_event)
                    <div class="col-lg-6">
                        <div class="upcoming">
                            <div class="upcoming__inner">
                                <div class="upcoming__thumb">
                                    <a draggable="false" href="#">
                                        <img draggable="false" src="images/event/1.jpg" alt="upcoming images">
                                    </a>
                                </div>
                                <div class="upcoming__hover__info">
                                    <div class="upcoming__hover__action">
                                        <div class="upcoming__event__time">
                                            <div class="event__time">
                                                <span>25</span>
                                                <span>june</span>
                                            </div>
                                            <span class="event__separator"></span>
                                            <ul class="event__location">
                                                <li><i class="icon ion-android-time"></i>8:00 AM - 5:00 PM</li>
                                                <li><i class="icon ion-ios-location"></i>Second Quad</li>
                                            </ul>
                                        </div>
                                        <div class="upcoming__details hidden-xs">
                                            <p>College Eucharist (Justin Martyr of Rome) at Bartlemas Chapel</p>
                                        </div>
                                        <div class="event__btn">
                                            <a draggable="false" class="htc__btn btn--transparent" href="#">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-6 mt-6 mt-lg-0">
                    <div class="upcoming">
                        <div class="upcoming__inner">
                            <div class="upcoming__thumb">
                                <a draggable="false" href="#">
                                    <img draggable="false" src="images/event/2.jpg" alt="upcoming images">
                                </a>
                            </div>
                            <div class="upcoming__hover__info">
                                <div class="upcoming__hover__action">
                                    <div class="upcoming__event__time">
                                        <div class="event__time">
                                            <span>25</span>
                                            <span>june</span>
                                        </div>
                                        <span class="event__separator"></span>
                                        <ul class="event__location">
                                            <li><i class="icon ion-android-time"></i>8:00 AM - 5:00 PM</li>
                                            <li><i class="icon ion-ios-location"></i>Second Quad</li>
                                        </ul>
                                    </div>
                                    <div class="upcoming__details hidden-xs">
                                        <p>Joint Roman Catholic Mass at Corpus Christi College Chapel</p>
                                    </div>
                                    <div class="event__btn">
                                        <a draggable="false" class="htc__btn btn--transparent" href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section wire:ignore class="our__testimonial__area pt--80 pb--110" style="background: rgba(0, 0, 0, 0) url({{ asset("assets/images/bg/3.jpg") }}) no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center section--white">
                        <h2 class="title__line">{{ trans("general.Testimonials") }}</h2>
                        <p>{{ trans("general.How Real People Said About STMIK Harvest") }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="testimonial-wrap">
                        <div class="testimonial-image-slider text-center">
                            @foreach ($data_testimony as $testimony)
                                <div class="sin-testiImage">
                                    <div class="text-thumb">
                                        <img draggable="false" src="{{ $testimony->assetImage() }}" class="rounded-circle" style="width: 90px; height:90px" alt="{{ trans("general.Testimony") }} - {{ $testimony->name }} - {{ env("APP_TITLE") }}"/>
                                    </div>
                                    <div class="test-info">
                                        <h4>{{ $testimony->name }}</h4>
                                        <p>{{ $testimony->graduate }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="testimonial-text-slider text-center">
                        @foreach ($data_testimony as $testimony)
                            <div class="sin-testiText">
                                <p>{!! html_entity_decode($testimony->description) !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__blog__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">{{ trans("general.Our Latest News") }}</h2>
                        <p>{{ trans("general.Stay tuned with our latest news so you don't miss any information from us") }}</p>
                    </div>
                </div>
            </div>
            <div class="row our__blog__wrap mt-6 mb-n6">
                @foreach ($data_news as $news)
                    <div class="col-lg-4 col-xl-4 col-md-6 mb-6">
                        <div class="blog">
                            <div class="blog__thumb">
                                <a draggable="false" href="{{ route("news.view", ["news_slug" => $news->slug]) }}">
                                    <img draggable="false" src="{{ $news->assetImage() }}" alt="{{ trans("page.News") }} - {{ $news->translate_name }} - {{ env("APP_TITLE") }}">
                                </a>
                                <div class="blog__date">
                                    <span>{{ Date::parse($news->date)->format("d F Y") }}</span>
                                </div>
                            </div>
                            <div class="blog__details">
                                <h2><a draggable="false" href="{{ route("news.view", ["news_slug" => $news->slug]) }}">{{ $news->translate_name }}</a></h2>
                                <p>{{ strip_tags(Str::limit($news->translate_description, 300)) }}</p>
                                <div class="blog__btn">
                                    <a draggable="false" class="read__more__btn" href="{{ route("news.view", ["news_slug" => $news->slug]) }}">{{ trans("button.Read More") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="our__newsletter__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="newsletter__wrap bg--5">
                        <h2>{{ trans("general.You want to know more information") }}?<br> {{ trans("general.Send us a mail") }}!</h2>
                        <div class="newsletter__form">
                            <div class="input__box">
                                <div id="mc_embed_signup">
                                    <form wire:submit.prevent="newsletter" enctype="multipart/form-data" class="was-validated-delete validate" method="post" role="form" action="{{ route("index") }}" autocomplete="off" id="mc-embedded-subscribe-formz" novalidate>
                                        @csrf

                                        <div class="row justify-content-center">
                                            <div class="col-5 col-sm-6 col-md-8 col-lg-7 col-xl-6">
                                                @include("layouts.alert")
                                            </div>
                                        </div>

                                        <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                            @php $input = "email" @endphp
                                            <div class="news__input">
                                                <input wire:model="emailNewsletter" wire:keydown.enter="newsletter" id="{{ $input }}" name="{{ $input }}"
                                                    type="email" class="form-control-delete email @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                                @enderror
                                            </div>
                                            <div class="clearfix subscribe__btn">
                                                <input wire:click="newsletter" type="button" value="{{ trans("button.Send") }}" class="bst__btn btn--white__color">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-contacts">
        <div id="googleMap">
            <iframe src="{{ env("CONTACT_GOOGLE_MAPS_IFRAME") }}"></iframe>
        </div>
    </div>
</div>
