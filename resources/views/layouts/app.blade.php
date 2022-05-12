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
    <link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">

    <script src="{{ asset("assets/js/vendor/modernizr-3.11.2.min.js") }}"></script>

	{{-- <link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/responsive.css">

    <style type="text/css">
        body {
            color: #666666;
            font-family: 'Raleway', sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 24px;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            color: #000;
            font-family: 'Roboto Slab', serif;
            font-variant-ligatures: common-ligatures;
            font-weight: 400;
            margin-bottom: 0;
            margin-top: 0;
        }
        .hero-content h3 {
            color: #fff;
        }
        .hero-content p span {
            color: #fff;
            font-size: 22px;
            font-weight: 400;
            letter-spacing: 2px;
            font-family: 'Raleway', sans-serif;
        }
        .hero-content p {
            color: #fff;
            font-weight: 400;
            line-height: 24px;
            margin-bottom: 30px;
            text-align: center;
        }
        .header-area.bg-off-white {
            background: #000 none repeat scroll 0 0;
        }
        .hero-wrapper {
            background-attachment: scroll;
            background-image: url("img/educan/hero.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            padding: 270px 30px;
            background-position: center center;
        }
        .hero-wrapper {
            position: relative;
            z-index: 1;
        }
        .hero-wrapper::before {
            background: rgba(0, 0, 0, 0.6) none repeat scroll 0 0;
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: -1;
        }
        .main-menu ul li a {
            color: #fff;
        }
        .logo {
            margin-top: 0;
        }
        .main-menu ul li ul li a {
            color: #444;
        }
        .section-title h1 {
            letter-spacing: 0;
            text-transform: uppercase;
        }
        .demo-img a::before {
            background: #000 none repeat scroll 0 0;
        }
        .single-demo:hover .demo-img a::before {
            opacity: 0.9;
        }
        .support-team > a {
            background: #000 none repeat scroll 0 0;
        }
        .main-menu ul li:hover > a {
            color: #fff;
        }

        .main-menu ul li a {
            font-family: 'Raleway', sans-serif;
        }
        .header-area.header-sticky.bg-off-white .row {
            align-items: center;
            display: flex;
        }
        .logo a {
            display: block;
        }
        .button {
            background: transparent none repeat scroll 0 0;
            border-color: #fff;
            border-radius: 30px;
        }
        .button.color-hover:hover {
            background: #F36371 none repeat scroll 0 0;
            border-color: #F36371;
            color: #fff;
        }
        .section-title h1 {
            text-transform: uppercase;
        }
        .demo-img a::before {
            background: #f36371 none repeat scroll 0 0;
        }
        .button.large {
            line-height: 40px;
        }
        .menu li ul li:hover a {
        color: #000;
        }

        .counter-area .row .col-md-4:nth-child(1) .single-counter {
            background: #9f1e49 none repeat scroll 0 0;
        }
        .counter-area .row .col-md-4:nth-child(2) .single-counter {
            background: #005691 none repeat scroll 0 0;
        }
        .counter-area .row .col-md-4:nth-child(2) .single-counter {
            background: #2db6a3 none repeat scroll 0 0;
        }
        .single-counter span {
            font-family: 'Roboto Slab', serif;
        }

        #scrollUp {
            border: 3px solid rgba(0, 0, 0, 0.1);
            border-radius: 100%;
            bottom: 15px;
            box-sizing: content-box;
            color: #fff;
            font-size: 20px;
            height: 50px;
            line-height: 45px;
            position: fixed;
            right: 15px;
            text-align: center;
            transition: all 0.3s ease 0s;
            width: 50px;
            z-index: 200;
        }

        @-webkit-keyframes scroll-ani-to-top {
        0% {
            opacity: 0;
            bottom: 0;
        }
        50% {
            opacity: 1;
            bottom: 50%;
        }
        100% {
            opacity: 0;
            bottom: 75%;
        }
        }
        @-moz-keyframes scroll-ani-to-top {
        0% {
            opacity: 0;
            bottom: 0;
        }
        50% {
            opacity: 1;
            bottom: 50%;
        }
        100% {
            opacity: 0;
            bottom: 75%;
        }
        }
        @keyframes scroll-ani-to-top {
        0% {
            opacity: 0;
            bottom: 0;
        }
        50% {
            opacity: 1;
            bottom: 50%;
        }
        100% {
            opacity: 0;
            bottom: 75%;
        }
        }
        #scrollUp:hover i {
            animation: 800ms linear 0s normal none infinite running scroll-ani-to-top;
            height: 100%;
            left: 0;
            margin-bottom: -25px;
            position: absolute;
            width: 100%;
            bottom: 0;
        }
        #scrollUp i {
            color: #fff;
        }
        #scrollUp {
            background: #f36371 none repeat scroll 0 0;
        }




        /* Normal desktop :992px. */
        @media (min-width: 992px) and (max-width: 1169px) {
        .hero-wrapper {
        padding: 149px 8px;
        }
        .hero-content h3 {
        font-size: 34px;
        letter-spacing: 1px;
        }

        }
        /* tablet :768px. */
        @media (min-width: 768px) and (max-width: 991px) {

        .hero-content h3 {
        font-size: 27px;
        }


        }
        /* small mobile :320px. */
        @media (max-width: 767px) {

        .container {width:300px}

        .hero-wrapper {
        padding: 149px 8px;
        }
        .hero-content h3 {
        font-size: 34px;
        letter-spacing: 1px;
        }
        .hero-content h3 {
        line-height: 41px;
        }
        .hero-content p span {
        line-height: 33px;
        }
        .button.large {
        line-height: 34px;
        }
        .hero-content.fix a + a {
        margin-top: 20px;
        }



        }


    </style> --}}
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
        <div class="htc__header__top bg__theme d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul class="header__address">
                                <li><a href="tel:+00123456789"><i class="icon ion-android-call"></i>(+00) 123 456 789</a></li>
                                <li><a href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i>support@yourmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <ul class="social__icon">
                                <li><a href="https://twitter.com/devitemsllc" target="_blank"><i class="icon ion-social-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/devitems/" target="_blank"><i class="icon ion-social-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="icon ion-social-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="icon ion-social-googleplus"></i></a></li>
                            </ul>
                            <ul class="login__register">
                                <li><a href="register.html">Register</a></li>
                                <li><a href="login.html">Login</a></li>
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
                            <a href="index.html">
                                <img src="images/logo/educan.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <!-- Start MAinmenu Ares -->
                    <div class="col-lg-10">
                        <nav class="mainmenu__nav">
                            <ul class="main__menu">
                                <li class="drop"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">home defult</a></li>
                                        <li><a href="index-2.html">home version two</a></li>
                                        <li><a href="index-3.html">home version three</a></li>
                                        <li><a href="index-4.html">home version four</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li class="drop"><a href="courses-grid.html">Courses</a>
                                    <ul class="dropdown">
                                        <li><a href="courses-grid.html">courses grid</a></li>
                                        <li><a href="courses-list.html">courses list</a></li>
                                        <li><a href="courses-details.html">courses details</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a href="#">pages</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="courses-grid.html">courses grid</a></li>
                                        <li><a href="courses-list.html">courses list</a></li>
                                        <li><a href="courses-details.html">courses details</a></li>
                                        <li><a href="shop-grid.html">shop grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                        <li><a href="shop-details.html">shop details</a></li>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="team.html">team</a></li>
                                        <li><a href="profile.html">profile</a></li>
                                        <li><a href="cart.html">cart</a></li>
                                        <li><a href="login.html">log in</a></li>
                                        <li><a href="register.html">register</a></li>
                                        <li><a href="gallery.html">gallery</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a></li>
                                <li class="drop"><a href="shop-grid.html">shop</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-grid.html">shop grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                        <li><a href="shop-details.html">shop details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                            <!-- Start Cart Search -->
                        <div class="cart__search">
                            <ul class="cart__search__list">
                                <li class="search search__open"><a href="#"><i class="icon ion-ios-search-strong"></i></a></li>
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
                <div class="mobile-logo"><a href="index.html"><img src="images/logo/educan.png" alt="Mobile logo"></a></div>
                <div class="mobile-menu clearfix">
                    <nav id="mobile_dropdown">
                        <ul>
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">home defult</a></li>
                                    <li><a href="index-2.html">home version two</a></li>
                                    <li><a href="index-3.html">home version three</a></li>
                                    <li><a href="index-4.html">home version four</a></li>
                                </ul>
                            </li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="courses-grid.html">Courses</a>
                                <ul>
                                    <li><a href="courses-grid.html">courses grid</a></li>
                                    <li><a href="courses-list.html">courses list</a></li>
                                    <li><a href="courses-details.html">courses details</a></li>
                                </ul>
                            </li>
                            <li><a href="#">pages</a>
                                <ul>
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="courses-grid.html">courses grid</a></li>
                                    <li><a href="courses-list.html">courses list</a></li>
                                    <li><a href="courses-details.html">courses details</a></li>
                                    <li><a href="shop-grid.html">shop grid</a></li>
                                    <li><a href="shop-list.html">shop list</a></li>
                                    <li><a href="shop-details.html">shop details</a></li>
                                    <li><a href="about.html">about</a></li>
                                    <li><a href="team.html">team</a></li>
                                    <li><a href="profile.html">profile</a></li>
                                    <li><a href="cart.html">cart</a></li>
                                    <li><a href="login.html">log in</a></li>
                                    <li><a href="register.html">register</a></li>
                                    <li><a href="gallery.html">gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="shop-grid.html">shop</a>
                                <ul>
                                    <li><a href="shop-grid.html">shop grid</a></li>
                                    <li><a href="shop-list.html">shop list</a></li>
                                    <li><a href="shop-details.html">shop details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact us</a></li>
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
            <!-- Start Footer Top Area -->
            <div class="htc__footer__top">
                <div class="row">
                    <div class="col-12">
                        <div class="htc__footer__inner">
                            <div class="footer__logo">
                                <a href="index.html">
                                    <img src="images/logo/footer.png" alt="footer logo">
                                </a>
                            </div>
                            <ul class="htc__footer__address">
                                <li><p><i class="icon ion-ios-location"></i>   11st Floor Newt World Tower Miami</p></li>
                                <li><a href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i> support@yourmail.com</a></li>
                                <li><a href="tel:+00123456789"><i class="icon ion-android-call"></i> (801) 2345 - 6789</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top Area -->
            <!-- Start Foooter Menu Area -->
            <div class="htc__footer__container pt--80 pb--70">
                <div class="row mb-n8">
                    <div class="col-lg-2 col-md-3 mb-7">
                        <!-- Start Footer Widget -->
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">our school</h2>
                                <ul class="htc__ft__list">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Footer Widget -->
                    </div>
                    <div class="col-lg-1 col-md-2 offset-lg-1 mb-7">
                        <!-- Start Footer Widget -->
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">links</h2>
                                <ul class="htc__ft__list">
                                    <li><a href="#">Events</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="course-list.html">Courses</a></li>
                                    <li><a href="#">Forums</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Footer Widget -->
                    </div>
                    <div class="col-lg-2 col-md-3 offset-lg-2 mb-7">
                        <!-- Start Footer Widget -->
                        <div class="footer">
                            <div class="footer__widget">
                                <h2 class="footer__title">support</h2>
                                <ul class="htc__ft__list">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Update Status</a></li>
                                    <li><a href="#">Language Packs</a></li>
                                    <li><a href="#">Release Status</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Footer Widget -->
                    </div>
                    <div class="col-lg-3 col-md-4 offset-lg-1 mb-7">
                        <!-- Start Footer Widget -->
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
                        <!-- End Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Foooter Menu Area -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright__area">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright__inner">
                            <div class="copyright">
                                <p>© 2022  Educan. Made with <i class="fa fa-heart"></i> By <a target="_blank" href="https://hasthemes.com/">HasThemes</a></p>
                            </div>
                            <ul class="footer__menu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
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
