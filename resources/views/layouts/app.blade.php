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

    {{-- @include("vendors.font-awesome") --}}

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
                    <div class="col-lg-6 col-md-6">
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

                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <ul class="social__icon">
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
                                <li><a draggable="false" href="register.html">Register</a></li>
                                <li><a draggable="false" href="login.html">Login</a></li>
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
                                <img draggable="false" src="{{ asset("images/logo.png") }}" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <nav class="mainmenu__nav">
                            <ul class="main__menu">
                                <li class="active"><a draggable="false" class="active" href="{{ route("index") }}">{{ trans("page.Home") }}</a></li>
                                <li class="drop active"><a draggable="false" class="active" href="{{ route("about.index") }}">{{ trans("page.About Us") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("our-profile.index") }}">{{ trans("page.Our Profile") }}</a></li>
                                        <li><a draggable="false" href="{{ route("our-values.index") }}">{{ trans("page.Our Values") }}</a></li>
                                        <li><a draggable="false" href="{{ route("our-network.index") }}">{{ trans("page.Our Network") }}</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a draggable="false" href="{{ route("admission.index") }}">{{ trans("page.Admission") }}</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="{{ route("online-registration.index") }}">{{ trans("page.Online Registration") }}</a></li>
                                        <li><a draggable="false" href="{{ route("admission-calendar.index") }}">{{ trans("page.Admission Calendar") }}</a></li>
                                        <li><a draggable="false" href="{{ route("procedure.index") }}">{{ trans("page.Procedure") }}</a></li>
                                        <li><a draggable="false" href="{{ route("tuition-fees.index") }}">{{ trans("page.Tuition Fees") }}</a></li>
                                        <li><a draggable="false" href="{{ route("scholarships.index") }}">{{ trans("page.Scholarships") }}</a></li>
                                    </ul>
                                </li>
                                <li><a draggable="false" href="{{ route("admission.index") }}">{{ trans("page.Admission") }}</a></li>
                                <li class="drop"><a draggable="false" href="#">pages</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="blog.html">blog</a></li>
                                        <li><a draggable="false" href="blog-details.html">blog details</a></li>
                                        <li><a draggable="false" href="courses-grid.html">courses grid</a></li>
                                        <li><a draggable="false" href="courses-list.html">courses list</a></li>
                                        <li><a draggable="false" href="courses-details.html">courses details</a></li>
                                        <li><a draggable="false" href="shop-grid.html">shop grid</a></li>
                                        <li><a draggable="false" href="shop-list.html">shop list</a></li>
                                        <li><a draggable="false" href="shop-details.html">shop details</a></li>
                                        <li><a draggable="false" href="about.html">about</a></li>
                                        <li><a draggable="false" href="team.html">team</a></li>
                                        <li><a draggable="false" href="profile.html">profile</a></li>
                                        <li><a draggable="false" href="cart.html">cart</a></li>
                                        <li><a draggable="false" href="login.html">log in</a></li>
                                        <li><a draggable="false" href="register.html">register</a></li>
                                        <li><a draggable="false" href="gallery.html">gallery</a></li>
                                    </ul>
                                </li>
                                <li><a draggable="false" href="blog.html">Blog</a></li>
                                <li class="drop"><a draggable="false" href="shop-grid.html">shop</a>
                                    <ul class="dropdown">
                                        <li><a draggable="false" href="shop-grid.html">shop grid</a></li>
                                        <li><a draggable="false" href="shop-list.html">shop list</a></li>
                                        <li><a draggable="false" href="shop-details.html">shop details</a></li>
                                    </ul>
                                </li>
                                <li><a draggable="false" href="contact.html">Contact</a></li>
                            </ul>
                            <!-- Start Cart Search -->
                        <div class="cart__search">
                            <ul class="cart__search__list">
                                <li class="search search__open"><a draggable="false" href="#"><i class="icon ion-ios-search-strong"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Cart Search -->
                        </nav>
                    </div>
                    <!-- End MAinmenu Ares -->
                </div>
            </div>
            <!-- Start Search Popap -->
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
                        <img draggable="false" src="{{ asset("images/logo.png") }}" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                    </a>
                </div>
                <div class="mobile-menu clearfix">
                    <nav id="mobile_dropdown">
                        <ul>
                            <li><a draggable="false" href="index.html">Home</a>
                                <ul>
                                    <li><a draggable="false" href="index.html">home defult</a></li>
                                    <li><a draggable="false" href="index-2.html">home version two</a></li>
                                    <li><a draggable="false" href="index-3.html">home version three</a></li>
                                    <li><a draggable="false" href="index-4.html">home version four</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="gallery.html">Gallery</a></li>
                            <li><a draggable="false" href="courses-grid.html">Courses</a>
                                <ul>
                                    <li><a draggable="false" href="courses-grid.html">courses grid</a></li>
                                    <li><a draggable="false" href="courses-list.html">courses list</a></li>
                                    <li><a draggable="false" href="courses-details.html">courses details</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="#">pages</a>
                                <ul>
                                    <li><a draggable="false" href="blog.html">blog</a></li>
                                    <li><a draggable="false" href="blog-details.html">blog details</a></li>
                                    <li><a draggable="false" href="courses-grid.html">courses grid</a></li>
                                    <li><a draggable="false" href="courses-list.html">courses list</a></li>
                                    <li><a draggable="false" href="courses-details.html">courses details</a></li>
                                    <li><a draggable="false" href="shop-grid.html">shop grid</a></li>
                                    <li><a draggable="false" href="shop-list.html">shop list</a></li>
                                    <li><a draggable="false" href="shop-details.html">shop details</a></li>
                                    <li><a draggable="false" href="about.html">about</a></li>
                                    <li><a draggable="false" href="team.html">team</a></li>
                                    <li><a draggable="false" href="profile.html">profile</a></li>
                                    <li><a draggable="false" href="cart.html">cart</a></li>
                                    <li><a draggable="false" href="login.html">log in</a></li>
                                    <li><a draggable="false" href="register.html">register</a></li>
                                    <li><a draggable="false" href="gallery.html">gallery</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="blog.html">Blog</a></li>
                            <li><a draggable="false" href="shop-grid.html">shop</a>
                                <ul>
                                    <li><a draggable="false" href="shop-grid.html">shop grid</a></li>
                                    <li><a draggable="false" href="shop-list.html">shop list</a></li>
                                    <li><a draggable="false" href="shop-details.html">shop details</a></li>
                                </ul>
                            </li>
                            <li><a draggable="false" href="contact.html">contact us</a></li>
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
                            <div class="footer__logo">
                                <a draggable="false" href="{{ route("index") }}">
                                    <img draggable="false" src="{{ asset("images/logo.png") }}" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
                                </a>
                            </div>
                            <ul class="htc__footer__address">
                                <li><p><i class="icon ion-ios-location"></i>   11st Floor Newt World Tower Miami</p></li>
                                <li><a draggable="false" href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i> support@yourmail.com</a></li>
                                <li><a draggable="false" href="tel:+00123456789"><i class="icon ion-android-call"></i> (801) 2345 - 6789</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="htc__footer__container pt--80 pb--70">
                <div class="row mb-n8">

                    <div class="col-lg-2 col-md-3 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">our school</h2>
                                <ul class="htc__ft__list">
                                    <li><a draggable="false" href="about.html">About Us</a></li>
                                    <li><a draggable="false" href="login.html">Login</a></li>
                                    <li><a draggable="false" href="register.html">Register</a></li>
                                    <li><a draggable="false" href="blog.html">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-2 offset-lg-1 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">links</h2>
                                <ul class="htc__ft__list">
                                    <li><a draggable="false" href="#">Events</a></li>
                                    <li><a draggable="false" href="gallery.html">Gallery</a></li>
                                    <li><a draggable="false" href="course-list.html">Courses</a></li>
                                    <li><a draggable="false" href="#">Forums</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 offset-lg-2 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">support</h2>
                                <ul class="htc__ft__list">
                                    <li><a draggable="false" href="#">Documentation</a></li>
                                    <li><a draggable="false" href="#">Update Status</a></li>
                                    <li><a draggable="false" href="#">Language Packs</a></li>
                                    <li><a draggable="false" href="#">Release Status</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 offset-lg-1 mb-7">
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">About us</h2>
                                <p class="footer__details">Subscribe now and receive weekly
                                newsletter with educational materials,
                                new courses, interesting posts, popular
                                books and much more! Subscribe now
                                and receive weekly newsletter with</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="htc__copyright__area">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright__inner">
                            <div class="copyright">
                                <p>© 2022  Educan. Made with <i class="fa fa-heart"></i> By <a target="_blank" href="https://hasthemes.com/">HasThemes</a></p>
                            </div>
                            <ul class="footer__menu">
                                <li><a draggable="false" href="index.html">Home</a></li>
                                <li><a draggable="false" href="#">Help</a></li>
                                <li><a draggable="false" href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section("error-content")
    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <h2>@yield("code") - <i class="icon_error-triangle_alt"></i></h2>
                    <p>@yield("message")</p>
                    <p>@yield("description")</p>
                    <form role="form" method="get" action="{{ route("news.index") }}">
                        <div class="search_bar_error">
                            <input type="search" class="form-control" id="search" name="search" placeholder="{{ trans("general.What are you looking for?") }}">
                            <input type="submit" value="{{ trans("button.Search") }}">
                        </div>
                    </form>
                    <a draggable="false" href="{{ route("index") }}" class="btn btn-warning">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
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
