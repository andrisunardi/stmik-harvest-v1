@section("vendors")
    @include("vendors.meta")

    @stack("meta")

    {{-- @include("vendors.jquery") --}}

    {{-- @include("vendors.autonumeric") --}}

    {{-- @include("vendors.bootstrap") --}}

    {{-- @include("vendors.ckeditor") --}}

    @include("vendors.clarity-microsoft-tag")

    {{-- @include("vendors.clock") --}}

    @include("vendors.created-and-designed-by")

    {{-- @include("vendors.custom-file-input-upload") --}}

    {{-- @include("vendors.datatable") --}}

    @include("vendors.disabled-ctrl-u-and-f12")

    @include("vendors.disabled-right-click-image")

    @include("vendors.disabled-right-click")

    @include("vendors.disabled-zoom")

    {{-- @include("vendors.dropify") --}}

    {{-- @include("vendors.dropzone") --}}

    @include("vendors.facebook-page")

    @include("vendors.font-awesome")

    {{-- @include("vendors.froala") --}}

    @include("vendors.getbutton-io")

    @include("vendors.google-adsense")

    @include("vendors.google-analytics")

    @include("vendors.google-tag-manager")

    {{-- @include("vendors.livechat-tawk") --}}

    {{-- @include("vendors.location") --}}

    @include("vendors.lozad")

    @include("vendors.pace")

    @include("vendors.select2")

    {{-- @include("vendors.show-hide-password") --}}

    @include("vendors.snowflakes")

    {{-- @include("vendors.summernote") --}}

    {{-- @include("vendors.tooltip") --}}
@endsection

@section("css")
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/owl.theme.default.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/core.css") }}">
    <link rel="stylesheet" href="{{ asset("css/shortcode/shortcodes.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    {{-- <link rel="stylesheet" href="{{ asset("css/style-2.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("css/style-3.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("css/style-4.css") }}"> --}}
    <link rel="stylesheet" href="{{ asset("css/responsive.css") }}">
    <link rel="stylesheet" href="{{ asset("css/custom.css") }}">

    <script src="{{ asset("js/vendor/modernizr-3.11.2.min.js") }}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>

        .text-pre-wrap {
            white-space: pre-wrap;
        }

        body * :not(i[class^="fas fa-"], i[class^="fab fa-"], i[class^="far fa-"], span[class^="fas fa-"], span[class^="fab fa-"], span[class^="far fa-"]) {
            font-family: "Work Sans", sans-serif !important;
        }
    </style>

    @stack("css")
@endsection

@section("script")
    <script src="{{ asset("js/vendor/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("js/vendor/jquery-migrate-3.3.2.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/plugins.js") }}"></script>
    <script src="{{ asset("js/slick.min.js") }}"></script>
    <script src="{{ asset("js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("js/waypoints.min.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>

    @stack("script")
@endsection

@section("header")
    <div id="htc__header" class="htc-header header--one">
        <div class="htc__header__top bg__theme">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="header__top__left">
                            <ul class="header__address">
                                <li>
                                    <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("index.hello_i_know_this_number_from_the_website") }} {{ env("APP_DOMAIN") }}" target="_blank">
                                        <i class="icon ion-social-whatsapp"></i>
                                        {{ env("CONTACT_WHATSAPP") }}
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}">
                                        <i class="icon ion-android-call"></i>
                                        {{ env("CONTACT_PHONE") }}
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">
                                        <i class="icon ion-android-mail"></i>
                                        {{ env("CONTACT_EMAIL") }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="header__top__right">
                            <ul class="social__icon d-flex d-md-none d-xl-flex">
                                <li>
                                    <a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank">
                                        <i class="icon ion-social-facebook"></i>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank">
                                        <i class="icon ion-social-twitter"></i>
                                    </a>
                                </li> --}}
                                <li>
                                    <a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank">
                                        <i class="icon ion-social-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="https://www.g.page/{{ env("SOCIAL_MEDIA_GOOGLE") }}" target="_blank">
                                        <i class="icon ion-social-googleplus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank">
                                        <i class="icon ion-social-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="login__register d-none d-md-flex">
                                <li>
                                    <a draggable="false" href="{{ App::isLocale("en") ? url("locale/id") : "javascript:;" }}" class="{{ App::isLocale("en") ? null : "fw-bold" }}">
                                        {{ trans("index.indonesia") }}
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="{{ App::isLocale("en") ? "javascript:;" : url("locale/en") }}" class="{{ App::isLocale("en") ? "fw-bold" : null }}">
                                        {{ trans("index.english") }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="sticky-header-with-topbar" class="mainmenu__area bg__white d-none d-lg-block sticky__header">
            <div class="container">
                <div class="row mainmenu__wrap">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a draggable="false" href="{{ route("index") }}">
                                <img draggable="false" src="{{ asset("images/logo.png") }}" class="img-fluid w-100" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <nav class="mainmenu__nav">
                            <ul class="main__menu">
                                <li>
                                    <a draggable="false" href="{{ route("index") }}">
                                        <span class="d-block d-lg-none d-xl-block">{{ trans("index.home") }}</span>
                                        <span class="d-none d-lg-block d-xl-none"><i class="fas fa-home"></i></span>
                                    </a>
                                </li>
                                <li class="drop"><a draggable="false" href="{{ route("about.index") }}">{{ trans("index.about_us") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("index.about") }} STMIK Kuwera</a></li>
                                        <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("index.our_profile") }}</a></li>
                                        <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("index.our_values") }}</a></li>
                                        <li><a draggable="false" href="{{ route("our-network.index") }}">{{ trans("index.our_network") }}</a></li>
                                        <li><a draggable="false" href="{{ route("faq.index") }}">{{ trans("index.faq") }}</a></li>
                                        <li><a draggable="false" href="https://lpmi.stmikku.ac.id/lpmi" target="_blank">LPMI</a></li>
                                        <li><a draggable="false" href="https://lppm.stmikku.ac.id/lppm" target="_blank">LPPM</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("index.admission") }}</a>
                                    <ul class="dropdown">
                                        {{-- <li><a draggable="false" href="{{ route("online-registration.index") }}">{{ trans("index.online_registration") }}</a></li> --}}
                                        <li><a draggable="false" href="{{ Str::setting("link_registration") }}" target="_blank">{{ trans("index.online_registration") }}</a></li>
                                        <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("index.admission_calendar") }}</a></li>
                                        <li><a draggable="false" href="{{ route("procedure.index") }}">{{ trans("index.procedure") }}</a></li>
                                        <li><a draggable="false" href="{{ route("tuition-fees.index") }}">{{ trans("index.tuition_fees") }}</a></li>
                                        <li><a draggable="false" href="{{ route("scholarships.index") }}">{{ trans("index.scholarships") }}</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("index.programme") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("index.undergraduate") }} - {{ trans("index.information_system") }}</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("index.campus_activities") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("index.gallery") }}</a></li>
                                        <li><a draggable="false" href="{{ route("event.index") }}">{{ trans("index.event") }}</a></li>
                                        <li><a draggable="false" href="{{ route("blog.index") }}">{{ trans("index.blog") }}</a></li>
                                    </ul>
                                </li>
                                <li><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("index.contact_us") }}</a></li>
                            </ul>
                            <div class="cart__search">
                                <ul class="cart__search__list">
                                    <li class="search search__open">
                                        <a draggable="false" href="#"><i class="icon ion-ios-search-strong"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-12">
                            <div class="search__inner">
                                <form method="get" role="form" action="{{ route("blog.index") }}" autocomplete="off">
                                    <input type="text" id="search" name="search" value="{{ $search ?? null }}" placeholder="{{ trans("index.search_here") }}..." required>
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="icon ion-android-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-menu-area d-block d-lg-none">
            <div class="fluid-container mobile-menu-container">
                <div class="mobile-logo">
                    <a draggable="false" href="{{ route("index") }}">
                        <img draggable="false" src="{{ asset("images/logo.png") }}" class="img-fluid w-100" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">
                    </a>
                </div>
                <div class="mobile-menu clearfix">
                    <nav id="mobile_dropdown">
                        <ul>
                            <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.home") }}</a></li>
                            <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("index.about_us") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("index.our_profile") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("index.our_values") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-network.index") }}">{{ trans("index.our_network") }}</a></li>
                                    <li><a draggable="false" href="{{ route("faq.index") }}">{{ trans("index.faq") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="javascript:;">{{ trans("index.admission") }}</a>
                                <ul>
                                    {{-- <li><a draggable="false" href="{{ route("online-registration.index") }}">{{ trans("index.online_registration") }}</a></li> --}}
                                    <li><a draggable="false" href="{{ Str::setting("link_registration") }}" target="_blank">{{ trans("index.online_registration") }}</a></li>
                                    <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("index.admission_calendar") }}</a></li>
                                    <li><a draggable="false" href="{{ route("procedure.index") }}">{{ trans("index.procedure") }}</a></li>
                                    <li><a draggable="false" href="{{ route("tuition-fees.index") }}">{{ trans("index.tuition_fees") }}</a></li>
                                    <li><a draggable="false" href="{{ route("scholarships.index") }}">{{ trans("index.scholarships") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="javascript:;">{{ trans("index.programme") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("index.undergraduate") }} - {{ trans("index.information_system") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="javascript:;">{{ trans("index.campus_activities") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("index.gallery") }}</a></li>
                                    <li><a draggable="false" href="{{ route("event.index") }}">{{ trans("index.event") }}</a></li>
                                    <li><a draggable="false" href="{{ route("blog.index") }}">{{ trans("index.blog") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("index.contact_us") }}</a></li>
                            <li><a draggable="false" href="javascript:;">{{ trans("index.change_language") }}</a>
                                <ul>
                                    <li>
                                        <a draggable="false" href="{{ url("locale/id") }}" class="{{ App::isLocale("en") ? null : "fw-bold" }}">
                                            <img draggable="false" width="25" class="me-1" src="{{ asset("images/flag/id.png") }}">
                                            {{ trans("index.indonesia") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ url("locale/en") }}" class="{{ App::isLocale("en") ? "fw-bold" : null }}">
                                            <img draggable="false" width="25" class="me-1" src="{{ asset("images/flag/en.png") }}">
                                            {{ trans("index.english") }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer")
    <footer class="htc__footer__area bg__theme" style="background-color: #222222">
        <div class="container">

            <div class="htc__footer__top">
                <div class="row">
                    <div class="col-12">
                        <div class="htc__footer__inner">
                            <div class="footer__logo text-center">
                                <a draggable="false" href="{{ route("index") }}">
                                    <img draggable="false" class="img-fluid" width="300" src="{{ asset("images/logo-footer.png") }}" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">
                                </a>
                            </div>
                            <ul class="htc__footer__address">
                                <li>
                                    <a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="blank">
                                        <i class="fab fa-facebook fa-fw me-1"></i>
                                        {{ trans("validation.attributes.facebook") }} : {{ env("SOCIAL_MEDIA_FACEBOOK") }}
                                    </a>
                                </li>
                                {{-- <li>
                                    <a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="blank">
                                        <i class="fab fa-twitter fa-fw me-1"></i>
                                        {{ trans("validation.attributes.twitter") }} : {{ env("SOCIAL_MEDIA_TWITTER") }}
                                    </a>
                                </li> --}}
                                <li>
                                    <a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="blank">
                                        <i class="fab fa-instagram fa-fw me-1"></i>
                                        {{ trans("validation.attributes.instagram") }} : {{ env("SOCIAL_MEDIA_INSTAGRAM") }}
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="https://www.g.page/{{ env("SOCIAL_MEDIA_GOOGLE") }}" target="blank">
                                        <i class="fab fa-google fa-fw me-1"></i>
                                        {{ trans("validation.attributes.google") }} : {{ env("SOCIAL_MEDIA_GOOGLE") }}
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="blank">
                                        <i class="fab fa-youtube fa-fw me-1"></i>
                                        {{ trans("validation.attributes.youtube") }} : STMIK Kuwera
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="htc__footer__container pt--80 pb--70">
                <div class="row mb-n8">

                    <div class="col-md-6 col-lg-3 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("index.about_us") }}</h2>
                                <p class="footer__details">{{ env("APP_DESCRIPTION") }}</p>
                                <p class="footer__details">
                                    <strong class="text-uppercase">{{ trans("index.working_hours") }}</strong><br>
                                    <i class="icon ion-android-calendar me-1"></i>
                                    {{ trans("index.monday") }} - {{ trans("index.friday") }} : 08.00 - 17.00 WIB<br>
                                    <i class="icon ion-android-calendar me-1"></i>
                                    {{ trans("index.saturday") }} - {{ trans("index.sunday") }} - {{ trans("index.holiday") }} : {{ trans("index.closed") }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-xl-2 offset-xl-1 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("index.quick_links") }}</h2>
                                <ul class="htc__ft__list">
                                    <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.home") }}</a></li>
                                    <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("index.about") }} STMIK Kuwera</a></li>
                                    <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("index.our_profile") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("index.our_values") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-network.index") }}">{{ trans("index.our_network") }}</a></li>
                                    <li><a draggable="false" href="{{ route("faq.index") }}">{{ trans("index.faq") }}</a></li>
                                    <li><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("index.information_system") }}</a></li>
                                    <li><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("index.gallery") }}</a></li>
                                    <li><a draggable="false" href="{{ route("event.index") }}">{{ trans("index.event") }}</a></li>
                                    <li><a draggable="false" href="{{ route("blog.index") }}">{{ trans("index.blog") }}</a></li>
                                    <li><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("index.contact_us") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 offset-xl-1 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("index.admission") }}</h2>
                                <ul class="htc__ft__list">
                                    {{-- <li><a draggable="false" href="{{ route("online-registration.index") }}">{{ trans("index.online_registration") }}</a></li> --}}
                                    <li><a draggable="false" href="{{ Str::setting("link_registration") }}" target="_blank">{{ trans("index.online_registration") }}</a></li>
                                    <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("index.admission_calendar") }}</a></li>
                                    <li><a draggable="false" href="{{ route("procedure.index") }}">{{ trans("index.procedure") }}</a></li>
                                    <li><a draggable="false" href="{{ route("tuition-fees.index") }}">{{ trans("index.tuition_fees") }}</a></li>
                                    <li><a draggable="false" href="{{ route("scholarships.index") }}">{{ trans("index.scholarships") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("index.contact_information") }}</h2>
                                <ul class="htc__ft__list">
                                    <li>
                                        <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("index.hello_i_know_this_number_from_the_website") }} {{ env("APP_DOMAIN") }}" target="_blank">
                                            <i class="fab fa-whatsapp fa-fw me-1"></i>
                                            <strong>{{ trans("index.whatsapp") }} :</strong>
                                            {{ env("CONTACT_WHATSAPP") }}
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a draggable="false" href="https://line.me/ti/p/~{{ env("CONTACT_LINE") }}" target="_blank">
                                            <i class="fab fa-line fa-fw me-1"></i>
                                            <strong>{{ trans("index.line") }} :</strong>
                                            {{ env("CONTACT_LINE") }}
                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a draggable="false" href="http://www.pin.bbm.com/{{ env("CONTACT_BBM") }}" target="_blank">
                                            <i class="fab fa-blackberry fa-fw me-1"></i>
                                            <strong>{{ trans("index.bbm") }} :</strong>
                                            {{ env("CONTACT_BBM") }}
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}">
                                            <i class="fas fa-phone-alt fa-fw me-1"></i>
                                            <strong>{{ trans("index.phone") }} :</strong>
                                            {{ env("CONTACT_PHONE") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="sms:+{{ Str::phone(env("CONTACT_PHONE")) }}">
                                            <i class="fas fa-sms fa-fw me-1"></i>
                                            <strong>{{ trans("index.sms") }} :</strong>
                                            {{ env("CONTACT_PHONE") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">
                                            <i class="fas fa-envelope fa-fw me-1"></i>
                                            <strong>{{ trans("index.email") }} :</strong>
                                            <span class="text-lowercase">{{ env("CONTACT_EMAIL") }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank" class="lh-base">
                                            <i class="fas fa-map-marked-alt fa-fw me-1"></i>
                                            <strong>{{ trans("index.address") }} :</strong>
                                            <strong>STMIK Kuwera</strong><br>
                                            <div class="ms-5">{{ env("CONTACT_ADDRESS") }}</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="htc__copyright__area pb--70">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright__inner">
                            <div class="copyright">
                                <p>
                                    &copy; {{ trans("index.copyright") }} @if (env("APP_YEAR") && env("APP_YEAR") != date("Y")) {{ env("APP_YEAR") . " - " }} @endif {{ date("Y") }} &reg;
                                    <a draggable="false" href="{{ URL::to("/") }}" target="_blank">
                                        <strong>{{ env("APP_NAME") }}</strong>&trade;
                                    </a>
                                </p>
                            </div>
                            <ul class="footer__menu">
                                {{-- <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.home") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.registration") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.Ccurses") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.our_gallery") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("index.event") }}</a></li>
                                <li><a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}"><i class="icon ion-social-facebook"></i></a></li>
                                <li><a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}"><i class="icon ion-social-twitter"></i></a></li>
                                <li><a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}"><i class="icon ion-social-instagram"></i></a></li>
                                <li><a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}"><i class="icon ion-social-youtube"></i></a></li> --}}
                                <li>
                                    <span class="text-white">{{ trans("index.created_and_designed_by") }}</span>
                                    <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                        <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ trans("index.created_and_designed_by") }} DIW.co.id">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section("errorContent")
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="col-12">
                    <div class="about text-center">
                        <div class="section__title">
                            <h2 class="title__line">@yield("code")</h2>
                            <p>@yield("message")</p>
                        </div>
                        <p class="about__details">@yield("description")</p>
                        <a draggable="false" class="htc__btn btn--theme mt-5" href="{{ route("index") }}">{{ trans("index.back_to_home") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env("APP_LANGUAGE") }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ env("APP_LANGUAGE") }}">

    <head>

        <title>@if (!Route::is("index"))@yield("title") | @endif{{ env("APP_TITLE") }}</title>

        @yield("vendors")

        @yield("css")

        @livewireStyles

    </head>

    <body>

        <div class="wrapper">

            @yield("header")

            @if (!trim($__env->yieldContent("code")))

                @if (!Route::is("index"))

                    @include("layouts.breadcrumbs")

                @endif

                @yield("content")

            @else

                @include("layouts.breadcrumbs")

                @yield("errorContent")

            @endif

        </div>

        @yield("footer")

        @yield("script")

        @livewireScripts

        <script src="{{ asset("//cdn.jsdelivr.net/npm/sweetalert2@11") }}"></script>
        <script src="{{ asset("vendor/livewire-alert/livewire-alert.js") }}"></script>
        <x-livewire-alert::scripts />
        <x-livewire-alert::flash />

        <script>
            window.livewire.onError(statusCode => {
                if (statusCode === 403) {
                    alert("403 - Forbidden - The request was a legal request, but the server is refusing to respond to it.")
                    return false
                }

                if (statusCode === 404) {
                    alert("404 - Not Found - The requested page could not be found but may be available again in the future.")
                    return false
                }

                @env("production")
                    if (statusCode === 500) {
                        alert("500 - Internal Server Error - A generic error message, given when no more specific message is suitable.")
                        return false
                    }
                @endenv
            })
        </script>

    </body>

</html>
