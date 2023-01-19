@section("title", trans("index.home"))
@section("icon", "fas fa-home")
@section("home-active", "active")

<div>
    {{-- <div wire:ignore class="slider__container slider__fixed_height slider__position--relative">
        <div class="slider__activation__wrap owl-carousel owl-theme">
            @foreach ($sliders as $slider)
                @if ($loop->iteration == 1)
                    <div class="slide text__align--left slider__bg__color--1 fornt__image--right" style="background-image: url({{ $slider->assetImage() }}); background-size: 100% 100%; background-position: center center;">
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
                    <div class="slide slider__bg__color--2 text__align--left fornt__image--right-3" style="background-image: url({{ $slider->assetImage() }}); background-size: 100% 100%;">
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
                    <div class="slide slider__bg__color--3 text__align--left fornt__image--right-2" style="background-image: url({{ $slider->assetImage() }}); background-size: 100% 100%;">
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
    </div> --}}

    <div wire:ignore id="slider" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? "active" : null }}" aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? "active" : null }}">
                    <a draggable="false" href="{{ $slider->button_link }}" target="_blank">
                        <img draggable="false" src="{{ $slider->assetImage() }}" class="d-block w-100" alt="{{ $slider->altImage() }}">
                    </a>
                    <div class="carousel-caption d-block d-sm-none" style="top: 0%">
                        <h5 class="text-white" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_name }}</h5>
                        <p class="text-white mt-2" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_description }}</p>
                    </div>
                    <div class="carousel-caption d-none d-sm-block d-md-none" style="top: 30%">
                        <h2 class="text-white" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_name }}</h2>
                        <h5 class="text-white mt-2" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_description }}</h5>
                    </div>
                    <div class="carousel-caption d-none d-md-block d-lg-none" style="top: 35%">
                        <h2 class="text-white" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_name }}</h2>
                        <h3 class="text-white mt-2" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_description }}</h3>
                    </div>
                    <div class="carousel-caption d-none d-lg-block d-xl-none" style="top: 40%">
                        <h2 class="text-white" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_name }}</h2>
                        <h3 class="text-white mt-2" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_description }}</h3>
                    </div>
                    <div class="carousel-caption d-none d-xl-block" style="top: 35%">
                        <h1 class="text-white" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_name }}</h1>
                        <h2 class="text-white mt-2" style="text-shadow: 1px 1px #000000;">{{ $slider->translate_description }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ trans("index.previous") }}</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ trans("index.next") }}</span>
        </button>
    </div>

    <section class="htc__offer__area bg--theme" style="background-color: #2D2E32">
        <div class="container">
            <div class="row">
                @foreach ($offers as $offer)
                    <div class="col-md-6 col-lg-3">
                        <div class="offer text-center text-white {{ $loop->first ? null : "offer__separator" }}">
                            <h2 class="text-white">{{ $offer->translate_name }}</h2>
                            <p class="text-white">{!! html_entity_decode($offer->translate_description) !!}</p>
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
                            <h2 class="title__line lh-sm">
                                {{ trans("index.welcome_to_join") }}<br>
                                {{ env("APP_NAME") }}
                            </h2>
                            <p>College for Future Technopreneur</p>
                        </div>
                        <p class="about__details">{!! html_entity_decode(Str::setting('about_us_idn')) !!}</p>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="about__thumb">
                        {{-- <iframe width="100%" height="300" src="https://www.youtube.com/embed/hmUwBHxYLDw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                        <video width="100%" height="100%" controls controlsList="noplaybackrate nodownload">
                            <source src="{{ asset("videos/company-profile-stmik-kuwera.mp4") }}" type="video/mp4">
                        </video>
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
                                <span class="text-nowrap me-md-2">{{ trans("index.ready_to_join") }} ?</span>
                                {{ trans("custom.it_easy_now_to_you_for_being_our_part_just_click_the_button_below_and_fill_out_the_form_with_your_data") }}
                            </h2>
                            <div class="findout__btn">
                                {{-- <a draggable="false" class="htc__btn btn--yellow" href="{{ route("online-registration.index") }}">{{ trans("index.register") }}</a> --}}
                                <a draggable="false" class="htc__btn btn--yellow" href="https://pmb.stmik-kuwera.civitas.id" target="_blank">{{ trans("index.register") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section wire:ignore class="popular__courses__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">{{ trans("index.our_event") }}</h2>
                        <p>{{ trans("index.join_our_events_to_know_us_closer") }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="popular__courses__wrap indicator__style--1 owl-carousel owl-theme clearfix mt--30 xs-mt-0">
                    @foreach ($events as $event)
                        <div class="courses">
                            <div class="courses__thumb">
                                <a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}">
                                    <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ $event->altImage() }}">
                                </a>
                                <div class="courses__hover__info">
                                    <div class="courses__hover__action">
                                        <div class="courses__hover__thumb">
                                            <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="{{ $event->altImage() }}">
                                        </div>
                                        <h4>Administrator</h4>
                                        <span class="crs__separator">/</span>
                                        <p>Admin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses__details">
                                <div class="courses__details__inner">
                                    <h2><a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}">{{ $event->translate_name }}</a></h2>
                                    <p>{{ strip_tags(Str::limit($event->translate_description, 100)) }}</p>
                                </div>
                                {{-- <ul class="courses__meta">
                                    <li class="crs__price">
                                        <i class="icon ion-calendar"></i>
                                        {{ Date::parse($event->start)->format("d M Y H:i") }} -
                                        {{ Date::parse($event->end)->format("d M Y H:i") }}
                                    </li>
                                </ul> --}}
                                <ul class="courses__meta">
                                    <li>
                                        <i class="icon ion-map"></i>
                                        {{ $event->location }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="our__countdown__area ptb--100" data--theme__overlay="6" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-7">
                    <div class="countdown__wrap">
                        <div class="countdown__inner">
                            <h4>{{ trans("index.now_open_admission_for_registration") }}</h4>
                            <h2>{{ trans("index.register_now") }}</h2>
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
                        <h2><i class="icon ion-android-document"></i> {{ trans("index.online_registration") }}</h2>
                        <div class="account__form__box">
                            @if (now()->format("Y-m-d") <= $admission_calendar->date)
                                <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("index") }}" id="contact-form" autocomplete="off">
                                    @csrf

                                    @php $input = "name" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "email" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="email" class="form-control @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "phone" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="20" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "gender" @endphp
                                    <select wire:model="{{ $input }}" id="{{ $input }}" name="{{ $input }}"
                                        class="form-control mt-3 @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                        <option value="">{{ trans("index.select") }} {{ trans("validation.attributes.{$input}") }}</option>
                                        <option value="1">{{ trans("index.Man") }}</option>
                                        <option value="2">{{ trans("index.Woman") }}</option>
                                    </select>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "school" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "major" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "city" @endphp
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    @php $input = "type" @endphp
                                    <select wire:model="{{ $input }}" id="{{ $input }}" name="{{ $input }}"
                                        class="form-control mt-3 @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                        <option value="">{{ trans("index.which_do_you_prefer") }}</option>
                                        <option value="1">{{ trans("index.morning_afternoon_lecturer") }}</option>
                                        <option value="2">{{ trans("index.study_and_work_evening_lecture") }}</option>
                                    </select>
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror

                                    <div class="mt-3">
                                        @include("layouts.alert")
                                    </div>

                                    <div class="acount__btn">
                                        <button class="htc__btn btn--theme btn--smll" type="button" wire:click="submit">{{ trans("index.submit") }}</button>
                                    </div>
                                </form>
                            @else
                                <h3 class="mt-5 text-center text-danger">{{ trans("index.registration_is_now_closed") }}</h2>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="our__upcoming__area ptb--80 bg__gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">{{ trans("index.upcoming_event") }}</h2>
                        <p>{{ trans("index.upcoming_educational_events_for_your_future_career") }}</p>
                    </div>
                </div>
            </div>
            <div class="row upcoming__wrap mt-6">
                @foreach ($upcomingEvents as $upcoming_event)
                    <div class="col-lg-6 {{ $loop->first ? "" : "mt-6 mt-lg-0" }}">
                        <div class="upcoming">
                            <div class="upcoming__inner">
                                <div class="upcoming__thumb">
                                    <a draggable="false" href="{{ route("event.view", ["slug" => $upcoming_event->slug]) }}">
                                        <img draggable="false" class="img-fluid w-100" src="{{ $upcoming_event->assetImage() }}" alt="{{ $upcoming_event->altImage() }}">
                                    </a>
                                </div>
                                <div class="upcoming__hover__info">
                                    <div class="upcoming__hover__action">
                                        <div class="upcoming__event__time">
                                            <div class="event__time">
                                                <span>{{ Date::parse($upcoming_event->start)->format("d") }}</span>
                                                <span>{{ Date::parse($upcoming_event->start)->format("F") }}</span>
                                            </div>
                                            <span class="event__separator"></span>
                                            <ul class="event__location">
                                                <li>
                                                    <i class="icon ion-android-time"></i>
                                                    {{ Date::parse($upcoming_event->start)->format("H:i") }} -
                                                    {{ Date::parse($upcoming_event->end)->format("H:i") }}
                                                </li>
                                                <li><i class="icon ion-ios-location"></i> {{ strip_tags(Str::limit($upcoming_event->location, 15)) }}</li>
                                            </ul>
                                        </div>
                                        <div class="upcoming__details hidden-xs">
                                            <p>{{ $upcoming_event->translate_name }}</p>
                                        </div>
                                        <div class="event__btn">
                                            <a draggable="false" class="htc__btn btn--transparent" href="{{ route("event.view", ["slug" => $upcoming_event->slug]) }}">{{ trans("index.view_detail") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section wire:ignore class="our__testimonial__area pt--80 pb--110" style="background-color: #18563F" style-delete="background: rgba(0, 0, 0, 0) url({{ asset("assets/images/bg/3.jpg") }}) no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center section--white">
                        <h2 class="title__line">{{ trans("index.testimonials") }}</h2>
                        <p>{{ trans("index.how_real_people_said_about") }} {{ env("APP_NAME") }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="testimonial-wrap">
                        <div class="testimonial-image-slider text-center">
                            @foreach ($testimonies as $testimony)
                                <div class="sin-testiImage">
                                    <div class="text-thumb">
                                        <img draggable="false" src="{{ $testimony->assetImage() }}" class="rounded-circle" style="width: 90px; height:90px" alt="{{ $testimony->altImage() }}"/>
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
                        @foreach ($testimonies as $testimony)
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
                        <h2 class="title__line">{{ trans("index.our_latest_event") }}</h2>
                        <p>{{ trans("index.stay_tuned_with_our_latest_news_so_you_dont_miss_any_information_from_us") }}</p>
                    </div>
                </div>
            </div>
            <div class="row our__blog__wrap mt-6 mb-n6">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-xl-4 col-md-6 mb-6">
                        <div class="blog">
                            <div class="blog__thumb">
                                <a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">
                                    <img draggable="false" class="img-fluid w-100" src="{{ $blog->assetImage() }}" alt="{{ $blog->altImage() }}">
                                </a>
                                <div class="blog__date">
                                    <span>{{ Date::parse($blog->date)->isoFormat("LL") }}</span>
                                </div>
                            </div>
                            <div class="blog__details">
                                <h2><a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">{{ $blog->translate_name }}</a></h2>
                                <p>{{ strip_tags(Str::limit($blog->translate_description, 300)) }}</p>
                                <div class="blog__btn">
                                    <a draggable="false" class="read__more__btn" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">{{ trans("index.read_more") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="our__newsletter__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="newsletter__wrap bg--5">
                        <h2>{{ trans("index.you_want_to_know_more_information") }}?<br> {{ trans("index.send_us_a_mail") }}!</h2>
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
                                                    type="email" class="form-control-delete email @if ($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                            <div class="clearfix subscribe__btn">
                                                <input wire:click="newsletter" type="button" value="{{ trans("index.send") }}" class="bst__btn btn--white__color">
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
    </section> --}}

    <div class="map-contacts">
        <div id="googleMap">
            <iframe src="{{ env("CONTACT_GOOGLE_MAPS_IFRAME") }}"></iframe>
        </div>
    </div>
</div>
