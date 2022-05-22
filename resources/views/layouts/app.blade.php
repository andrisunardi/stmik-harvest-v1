@section("vendors")
    @include("vendors.meta")

    @stack("meta")

    {{-- @include("vendors.jquery") --}}

    {{-- @include("vendors.autonumeric") --}}

    {{-- @include("vendors.bootstrap") --}}

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

    {{-- @include("vendors.enter-to-tab-and-back-to-first-field-error") --}}

    @include("vendors.facebook-page")

    @include("vendors.font-awesome")

    {{-- @include("vendors.froala") --}}

    @include("vendors.getbutton-io")

    @include("vendors.google-analytics")

    @include("vendors.google-tag-manager")

    {{-- @include("vendors.livechat-tawk") --}}

    {{-- @include("vendors.location") --}}

    @include("vendors.lozad")

    @include("vendors.pace")

    {{-- @include("vendors.select2") --}}

    {{-- @include("vendors.show-hide-password") --}}

    {{-- @include("vendors.summernote") --}}

    {{-- @include("vendors.tooltip") --}}

    {{-- @include("vendors.validation-form") --}}
@endsection

@section("css")
    @stack("css")

    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/owl.theme.default.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/core.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/shortcode/shortcodes.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/style.css") }}">
    {{-- <link rel="stylesheet" href="{{ asset("assets/style-2.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("assets/style-3.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("assets/style-4.css") }}"> --}}
    <link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">

    <script src="{{ asset("assets/js/vendor/modernizr-3.11.2.min.js") }}"></script>
@endsection

@section("script")
    @stack("script")

    <script src="{{ asset("assets/js/vendor/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/jquery-migrate-3.3.2.min.js") }}"></script>
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins.js") }}"></script>
    <script src="{{ asset("assets/js/slick.min.js") }}"></script>
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/js/waypoints.min.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>
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
                                    <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("general.Hello, I know this number from the website") }} {{ env("APP_DOMAIN") }}" target="_blank">
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
                                <li>
                                    <a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank">
                                        <i class="icon ion-social-twitter"></i>
                                    </a>
                                </li>
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
                                    <a draggable="false" href="{{ Session::get("locale") == "en" ? "javascript:;" : url("locale/en") }}" class="{{ Session::get("locale") == "en" ? "fw-bold" : null }}">
                                        {{ trans("language.English") }}
                                    </a>
                                    </li>
                                <li>
                                    <a draggable="false" href="{{ Session::get("locale") == "en" ? url("locale/id") : "javascript:;" }}" class="{{ Session::get("locale") == "en" ? null : "fw-bold" }}">
                                        {{ trans("language.Indonesia") }}
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
                                <img draggable="false" src="{{ asset("images/logo.png") }}" class="img-fluid w-100" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <nav class="mainmenu__nav">
                            <ul class="main__menu">
                                <li>
                                    <a draggable="false" href="{{ route("index") }}">
                                        <span class="d-block d-lg-none d-xl-block">{{ trans("page.Home") }}</span>
                                        <span class="d-none d-lg-block d-xl-none"><i class="fas fa-home"></i></span>
                                    </a>
                                </li>
                                <li class="drop"><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About Us") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About") }} STMIK Harvest</a></li>
                                        <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("page.Our Profile") }}</a></li>
                                        <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("page.Our Values") }}</a></li>
                                        <li><a draggable="false" href="{{ route("our-network.index") }}">{{ trans("page.Our Network") }}</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="javascript:;">{{ trans("page.Admission") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("online-registration.index") }}">{{ trans("page.Online Registration") }}</a></li>
                                        <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("page.Admission Calendar") }}</a></li>
                                        <li><a draggable="false" href="{{ route("procedure.index") }}">{{ trans("page.Procedure") }}</a></li>
                                        <li><a draggable="false" href="{{ route("tuition-fees.index") }}">{{ trans("page.Tuition Fees") }}</a></li>
                                        <li><a draggable="false" href="{{ route("scholarships.index") }}">{{ trans("page.Scholarships") }}</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="javascript:;">{{ trans("page.Programme") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("page.Undergraduate") }} - {{ trans("page.Information System") }}</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="javascript:;">{{ trans("page.Campus Activities") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("our-gallery.index") }}">{{ trans("page.Our Gallery") }}</a></li>
                                        <li><a draggable="false" href="{{ route("events.index") }}">{{ trans("page.Events") }}</a></li>
                                        <li><a draggable="false" href="{{ route("events.index") }}">{{ trans("page.Blogs") }}</a></li>
                                    </ul>
                                </li>
                                <li><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("page.Contact Us") }}</a></li>
                            </ul>
                            <div class="cart__search">
                                <ul class="cart__search__list">
                                    <li class="search search__open"><a draggable="false" href="#"><i class="icon ion-ios-search-strong"></i></a></li>
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
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
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
                        <img draggable="false" src="{{ asset("images/logo.png") }}" class="img-fluid w-100" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                    </a>
                </div>
                <div class="mobile-menu clearfix">
                    <nav id="mobile_dropdown">
                        <ul>
                            <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Home") }}</a></li>
                            <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About Us") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("page.Our Profile") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("page.Our Values") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-network.index") }}">{{ trans("page.Our Network") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="{{ route("admission.index") }}">{{ trans("page.Admission") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("online-registration.index") }}">{{ trans("page.Online Registration") }}</a></li>
                                    <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("page.Admission Calendar") }}</a></li>
                                    <li><a draggable="false" href="{{ route("procedure.index") }}">{{ trans("page.Procedure") }}</a></li>
                                    <li><a draggable="false" href="{{ route("tuition-fees.index") }}">{{ trans("page.Tuition Fees") }}</a></li>
                                    <li><a draggable="false" href="{{ route("scholarships.index") }}">{{ trans("page.Scholarships") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="javascript:;">{{ trans("page.Programme") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("page.Undergraduate") }} - {{ trans("page.Information System") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="javascript:;">{{ trans("page.Campus Activities") }}</a>
                                <ul>
                                    <li><a draggable="false" href="{{ route("our-gallery.index") }}">{{ trans("page.Our Gallery") }}</a></li>
                                    <li><a draggable="false" href="{{ route("events.index") }}">{{ trans("page.Events") }}</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("page.Contact Us") }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer")
    <footer class="htc__footer__area bg__theme">
        <div class="container">

            <div class="htc__footer__top">
                <div class="row">
                    <div class="col-12">
                        <div class="htc__footer__inner">
                            <div class="footer__logo text-center">
                                <a draggable="false" href="{{ route("index") }}">
                                    <img draggable="false" class="img-fluid" width="300" src="{{ asset("images/logo-footer.png") }}" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                                </a>
                            </div>
                            <ul class="htc__footer__address">
                                <li>
                                    <a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="blank">
                                        <i class="fab fa-facebook fa-fw me-1"></i>
                                        {{ trans("validation.attributes.facebook") }} : {{ env("SOCIAL_MEDIA_FACEBOOK") }}
                                    </a>
                                </li>
                                <li>
                                    <a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="blank">
                                        <i class="fab fa-twitter fa-fw me-1"></i>
                                        {{ trans("validation.attributes.twitter") }} : {{ env("SOCIAL_MEDIA_TWITTER") }}
                                    </a>
                                </li>
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
                                        {{ trans("validation.attributes.youtube") }} : STMIK Harvest
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
                                <h2 class="footer__title">{{ trans("general.About Us") }}</h2>
                                <p class="footer__details">{{ env("APP_DESCRIPTION") }}</p>
                                <p class="footer__details">
                                    <strong class="text-uppercase">{{ trans("general.Working Hours") }}</strong><br>
                                    <i class="icon ion-android-calendar me-1"></i>
                                    {{ trans("datetime.Monday") }} - {{ trans("datetime.Friday") }} : 08.00 - 17.00 WIB<br>
                                    <i class="icon ion-android-calendar me-1"></i>
                                    {{ trans("datetime.Saturday") }} - {{ trans("datetime.Sunday") }} - {{ trans("datetime.Holiday") }} : {{ trans("datetime.Closed") }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-xl-2 offset-xl-1 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("general.Quick Links") }}</h2>
                                <ul class="htc__ft__list">
                                    <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Home") }}</a></li>
                                    <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("page.Admission Calendar") }}</a></li>
                                    <li><a draggable="false" href="{{ route("information-system.index") }}">{{ trans("page.Information System") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-gallery.index") }}">{{ trans("page.Our Gallery") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("page.Our Profile") }}</a></li>
                                    <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("page.Our Values") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 offset-xl-1 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("general.Working Hours") }}</h2>
                                <ul class="htc__ft__list">
                                    <li><a draggable="false" href="#">{{ trans("datetime.Monday") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">{{ trans("general.Contact Information") }}</h2>
                                <ul class="htc__ft__list">
                                    <li>
                                        <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("general.Hello, I know this number from the website") }} {{ env("APP_DOMAIN") }}" target="_blank">
                                            <i class="fab fa-whatsapp fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.whatsapp") }} :</strong>
                                            {{ env("CONTACT_WHATSAPP") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="https://line.me/ti/p/~{{ env("CONTACT_LINE") }}" target="_blank">
                                            <i class="fab fa-line fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.line") }} :</strong>
                                            {{ env("CONTACT_LINE") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="http://www.pin.bbm.com/{{ env("CONTACT_BBM") }}" target="_blank">
                                            <i class="fab fa-blackberry fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.bbm") }} :</strong>
                                            {{ env("CONTACT_BBM") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}">
                                            <i class="fas fa-phone-alt fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.phone") }} :</strong>
                                            {{ env("CONTACT_PHONE") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="sms:+{{ Str::phone(env("CONTACT_PHONE")) }}">
                                            <i class="fas fa-sms fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.sms") }} :</strong>
                                            {{ env("CONTACT_PHONE") }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">
                                            <i class="fas fa-envelope fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.email") }} :</strong>
                                            <span class="text-lowercase">{{ env("CONTACT_EMAIL") }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank" class="lh-base">
                                            <i class="fas fa-map-marked-alt fa-fw me-1"></i>
                                            <strong>{{ trans("validation.attributes.address") }} :</strong>
                                            <strong>World Harvest Center</strong><br>
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
                                    &copy; {{ __("footer.Copyright") }} @if(env("APP_YEAR") && env("APP_YEAR") != date("Y")) {{ env("APP_YEAR") . " - " }} @endif {{ date("Y") }} &reg;&nbsp;
                                    <a draggable="false" href="{{ URL::to("/") }}" target="_blank">
                                        <strong>{{ env("APP_NAME") }}</strong>
                                    </a> &trade;
                                </p>
                            </div>
                            <ul class="footer__menu">
                                {{-- <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Home") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Registration") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Courses") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Our Gallery") }}</a></li>
                                <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Event") }}</a></li>
                                <li><a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}"><i class="icon ion-social-facebook"></i></a></li>
                                <li><a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}"><i class="icon ion-social-twitter"></i></a></li>
                                <li><a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}"><i class="icon ion-social-instagram"></i></a></li>
                                <li><a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}"><i class="icon ion-social-youtube"></i></a></li> --}}
                                <li>
                                    <span class="text-white">{{ __("footer.Created and Designed by") }}</span>
                                    <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                        <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ __("footer.Created and Designed by") }} DIW.co.id">
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

@section("error-content")
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
                        <a draggable="false" class="htc__btn btn--theme mt-5" href="{{ route("index") }}">{{ trans("general.Back To Home") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env("APP_LANGUAGE") }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ env("APP_LANGUAGE") }}">

    <head>

        <title>@if(request()->is("/"))@else @yield("name") | @endif{{ env("APP_TITLE") }}</title>

        @yield("css")

        @yield("vendors")

        @livewireStyles

    </head>

    <body>

        <div class="wrapper">

            @yield("header")

            @if(!trim($__env->yieldContent("code")))

                @if (!Route::is("index"))

                    @include("layouts.breadcrumbs")

                @endif

                @yield("content")

            @else

                @yield("error-content")

            @endif

        </div>

        @yield("footer")

        @yield("script")

        @include("sweetalert::alert")
        {{-- @include("sweetalert::alert", ["cdn" => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}

        @livewireScripts

    </body>

</html>
