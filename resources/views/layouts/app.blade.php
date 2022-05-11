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

    <link href="{{ asset("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&amp;display=swap") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/vendors.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/icon_fonts/css/all_icons.min.css") }}" rel="stylesheet">

    <link href="{{ asset("assets/css/blog.css") }}" rel="stylesheet">

    <link href="{{ asset("assets/css/fullcalendar.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/fullcalendar.print.css") }}" rel="stylesheet" media="print">
    <link href="{{ asset("assets/css/fullcalendar.print.css") }}" rel="stylesheet" media="print">

    <link href="{{ asset("assets/layerslider/css/layerslider.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/layerslider/skins/v5/skin.css") }}" rel="stylesheet">

	<link href="{{ asset("assets/css/skins/square/grey.css") }}" rel="stylesheet">

    <link href="{{ asset("assets/css/custom.css") }}" rel="stylesheet">
@endsection

@section("script")
    @stack("script")

    <script src="{{ asset("assets/js/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("assets/js/common_scripts.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>
    <script src="{{ asset("assets/assets/validate.js") }}"></script>
    <script src="{{ asset("assets/js/pw_strenght.js") }}"></script>

    <script src="{{ asset("assets/js/moment.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery-ui.custom.min.js") }}"></script>
    <script src="{{ asset("assets/js/fullcalendar.min.js") }}"></script>
    <script src="{{ asset("assets/js/fullcalendar_func.js") }}"></script>

    <script src="{{ asset("assets/layerslider/js/greensock.js") }}"></script>
    <script src="{{ asset("assets/layerslider/js/layerslider.transitions.js") }}"></script>
    <script src="{{ asset("assets/layerslider/js/layerslider.kreaturamedia.jquery.js") }}"></script>
    <script type="text/javascript">
        "use strict";
        $("#layerslider").layerSlider({
            autoStart: true,
            navButtons: false,
            navStartStop: false,
            showCircleTimer: false,
            responsive: true,
            responsiveUnder: 1280,
            layersContainer: 1200,
            skinsPath: "layerslider/skins/"
        });
    </script>

    <script src="{{ asset("assets/js/jquery.cookiebar.js") }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $.cookieBar({
                fixed: true
            });
        });
    </script>
@endsection

@section("header")
    <header class="header menu_2">
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>

        <div id="logo">
            <a draggable="false" href="{{ route("index") }}">
                <img draggable="false" src="{{ asset("images/logo.png") }}" width="50" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}">
            </a>
        </div>

        <ul id="top_menu">
            {{-- <li><a draggable="false" href="{{ route("index") }}" class="login">Login</a></li> --}}
            <li><a draggable="false" href="javascript:;" class="search-overlay-menu-btn">Search</a></li>
            <li class="hidden_tablet"><a draggable="false" href="https://hits.ecampuz.com/eadmisi" target="_blank" class="btn_1 rounded">{{ trans("general.Registration") }}</a></li>
            <li class="hidden_tablet">
                @if (Session::get("locale") == "id")
                    <a draggable="false" href="{{ url("locale/en") }}">
                        <img draggable="false" width="30" src="{{ asset("images/flag/en.png") }}"> EN
                    </a>
                @else
                    <a draggable="false" href="{{ url("locale/id") }}">
                        <img draggable="false" width="30" src="{{ asset("images/flag/id.png") }}"> ID
                    </a>
                @endif
            </li>
            <li><a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank"><i class="ti-facebook"></i></a></li>
            <li><a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank"><i class="ti-instagram"></i></a></li>
            <li><a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank"><i class="ti-youtube"></i></a></li>
        </ul>

        <a draggable="false" href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>

        <nav id="menu" class="main-menu">
            <ul>
                <li><span><a draggable="false" href="{{ route("index") }}">{{ trans("page.Home") }}</a></span></li>
                <li>
                    <span><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About") }}</a></span>
                    <ul>
                        <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About HITS") }}</a></li>
                        <li><a draggable="false" href="{{ route("lecturer.index") }}">{{ trans("page.Our Lecturer") }}</a></li>
                        <li><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("page.Gallery") }}</a></li>
                        <li><a draggable="false" href="{{ route("faq.index") }}">{{ trans("page.FAQ") }}</a></li>
                    </ul>
                </li>
                {{-- <li><span><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About") }}</a></span></li> --}}
                <li><span><a draggable="false" href="{{ route("study-program.index") }}">{{ trans("page.Study Program") }}</a></span>
                    <ul>
                        <li class="d-block d-lg-none"><a draggable="false" href="{{ route("study-program.index") }}">{{ trans("general.All") }} {{ trans("page.Study Program") }}</a></li>
                        @foreach ($data_all_study_program as $all_study_program)
                            <li>
                                <a draggable="false" href="{{ route("study-program.view", ["study_program_slug" => $all_study_program->slug]) }}">
                                    {{ $all_study_program->translate_study_program }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li>
                    <span><a draggable="false" href="javascript:;">{{ trans("page.Admission") }}</a></span>
                    <ul>
                        <li><a draggable="false" href="{{ route("registration.index") }}">{{ trans("page.Registration") }}</a></li>
                        <li><a draggable="false" href="{{ route("international-student.index") }}">{{ trans("page.International Students") }}</a></li>
                        <li><a draggable="false" href="{{ route("scholarship.index") }}">{{ trans("page.Scholarship") }}</a></li>
                    </ul>
                </li> --}}
                {{-- <li><span><a draggable="false" href="{{ route("lecturer.index") }}">{{ trans("page.Lecturer") }}</a></span></li> --}}
                <li><span><a draggable="false" href="{{ route("news.index") }}">{{ trans("page.News & Event") }}</a></span></li>
                {{-- <li><span><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("page.Gallery") }}</a></span></li> --}}
                {{-- <li><span><a draggable="false" href="{{ route("magazine.index") }}">{{ trans("page.Magazine") }}</a></span></li> --}}
                {{-- <li><span><a draggable="false" href="{{ route("journal.index") }}">{{ trans("page.Journal") }}</a></span></li> --}}
                <li>
                    <span><a draggable="false" href="javascript:;">{{ trans("page.Research & Publication") }}</a></span>
                    <ul>
                        <li><a draggable="false" href="https://ojs.hits.ac.id" target="_blank">{{ trans("page.Journal") }}</a></li>
                        <li><a draggable="false" href="{{ route("repository.index") }}">{{ trans("page.Repository") }}</a></li>
                        <li><a draggable="false" href="{{ route("magazine.index") }}">{{ trans("page.Magazine") }}</a></li>
                    </ul>
                </li>
                <li><span><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("page.Contact Us") }}</a></span></li>
                @if (Auth::guard("user")->check())
                    <li>
                        <span><a draggable="false" href="{{ route("account.index") }}">{{ Auth::user()->name }}</a></span>
                        <ul>
                            <li><a draggable="false" href="{{ route("account.index") }}">{{ trans("page.Account") }}</a></li>
                            <li><a draggable="false" href="{{ route("account.index") }}">{{ trans("page.Edit Profile") }}</a></li>
                            <li><a draggable="false" href="{{ route("account.index") }}">{{ trans("page.Change Password") }}</a></li>
                            @livewire("c-m-s.logout-component")
                        </ul>
                    </li>
                @else
                    <li>
                        <span><a draggable="false" href="{{ route("login.index") }}">{{ trans("page.Account") }}</a></span>
                        <ul>
                            <li><a draggable="false" href="{{ route("login.index") }}">{{ trans("page.Login") }}</a></li>
                            <li><a draggable="false" href="{{ route("register.index") }}">{{ trans("page.Register") }}</a></li>
                            <li><a draggable="false" href="{{ route("forgot-password.index") }}">{{ trans("page.Forgot Password") }}</a></li>
                        </ul>
                    </li>
                @endif
                <li class="d-xl-none">
                    <span><a draggable="false" href="javascript:;">{{ trans("language.Change Language") }}</a></span>
                    <ul>
                        <li>
                            <a draggable="false" href="{{ Session::get("locale") == "en" ? "javascript:;" : url("locale/en") }}">
                                <img draggable="false" width="30" src="{{ asset("images/flag/en.png") }}" class="me-1">
                                <span class="{{ Session::get("locale") == "en" ? "fw-bold" : null }}">{{ trans("language.English") }}</span>
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="{{ Session::get("locale") == "en" ? url("locale/id") : "javascript:;" }}">
                                <img draggable="false" width="30" src="{{ asset("images/flag/id.png") }}" class="me-1">
                                <span class="{{ Session::get("locale") == "id" ? null : "fw-bold" }}">{{ trans("language.Indonesia") }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="search-overlay-menu">
            <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
            <form role="search" id="searchform" method="get" action="{{ route("news.index") }}">
                <input wire:model="search" type="search" id="search" name="search" value="{{ Request::get("search") }}" placeholder="{{ trans("general.Search Here") }}" />
                <button type="submit"><i class="icon_search"></i>
                </button>
            </form>
        </div>
    </header>
@endsection

@section("footer")
    <footer>
        <div class="container margin_120_95">
            <div class="row justify-content-between">

                <div class="col-md-6 col-lg-3 col-xl-4">
                    <p><img draggable="false" src="{{ asset("images/logo.png") }}" width="150" alt="{{ trans("general.Logo") }} - {{ env("APP_TITLE") }}"></p>
                    <p>{{ env("APP_DESCRIPTION") }}</p>
                    <div class="follow_us">
                        <ul>
                            <li>{{ trans("general.Follow Us") }}</li>
                            <li><a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank"><i class="ti-facebook"></i></a></li>
                            {{-- <li><a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank"><i class="ti-twitter-alt"></i></a></li> --}}
                            {{-- <li><a draggable="false" href="https://www.g.page/{{ env("SOCIAL_MEDIA_GOOGLE") }}" target="_blank"><i class="ti-google"></i></a></li> --}}
                            <li><a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank"><i class="ti-instagram"></i></a></li>
                            <li><a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-2 ml-lg-auto">
                    <h5>{{ trans("general.Navigation Menu") }}</h5>
                    <ul class="links">
                        <li><a draggable="false" href="{{ route("index") }}">{{ trans("page.Home") }}</a></li>
                        <li><a draggable="false" href="{{ route("about.index") }}">{{ trans("page.About") }}</a></li>
                        <li><a draggable="false" href="{{ route("study-program.index") }}">{{ trans("page.Study Program") }}</a></li>
                        {{-- <li><a draggable="false" href="{{ route("registration.index") }}">{{ trans("page.Registration") }}</a></li> --}}
                        {{-- <li><a draggable="false" href="{{ route("international-student.index") }}">{{ trans("page.International Student") }}</a></li> --}}
                        {{-- <li><a draggable="false" href="{{ route("scholarship.index") }}">{{ trans("page.Scholarship") }}</a></li> --}}
                        {{-- <li><a draggable="false" href="{{ route("event.index") }}">{{ trans("page.Event") }}</a></li> --}}
                        <li><a draggable="false" href="{{ route("lecturer.index") }}">{{ trans("page.Lecturer") }}</a></li>
                        <li><a draggable="false" href="{{ route("gallery.index") }}">{{ trans("page.Gallery") }}</a></li>
                        <li><a draggable="false" href="{{ route("faq.index") }}">{{ trans("page.Faq") }}</a></li>
                        <li><a draggable="false" href="{{ route("news.index") }}">{{ trans("page.News & Event") }}</a></li>
                        <li><a draggable="false" href="{{ route("journal.index") }}">{{ trans("page.Journal") }}</a></li>
                        <li><a draggable="false" href="{{ route("repository.index") }}">{{ trans("page.Repository") }}</a></li>
                        <li><a draggable="false" href="{{ route("magazine.index") }}">{{ trans("page.Magazine") }}</a></li>
                        <li><a draggable="false" href="{{ route("contact-us.index") }}">{{ trans("page.Contact Us") }}</a></li>
                        <li><a draggable="false" href="{{ route("account.index") }}">{{ trans("page.Account") }}</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-2 ml-lg-auto">
                    <h5>{{ trans("general.Study Program") }}</h5>
                    <ul class="links">
                        @foreach ($data_all_study_program as $all_study_program)
                            <li>
                                <a draggable="false" href="{{ route("study-program.view", ["study_program_slug" => $all_study_program->slug]) }}">
                                    {{ $all_study_program->translate_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5>{{ trans("general.Contact Information") }}</h5>
                    <ul class="contacts">
                        <li>
                            <a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}">
                                <i class="ti-mobile"></i>
                                <b>{{ trans("general.Call") }}</b> : {{ env("CONTACT_PHONE") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_FAX")) }}">
                                <i class="icon_mail"></i>
                                <b>{{ trans("general.Fax") }}</b> : {{ env("CONTACT_FAX") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="sms:+{{ Str::phone(env("CONTACT_WHATSAPP")) }}">
                                <i class="ti-envelope"></i>
                                <b>{{ trans("general.SMS") }}</b> : {{ env("CONTACT_WHATSAPP") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("general.Hello, I know this number from the website") }} {{ env("APP_DOMAIN") }}" target="_blank">
                                <i class="icon_phone"></i>
                                <b>{{ trans("general.Whatsapp") }}</b> : {{ env("CONTACT_WHATSAPP") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">
                                <i class="ti-email"></i>
                                <b>{{ trans("general.Email") }}</b> : {{ env("CONTACT_EMAIL") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank">
                                <i class="ti-map"></i>
                                <b>{{ trans("general.Address") }}</b> : {{ env("CONTACT_ADDRESS") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank">
                                <i class="ti-alarm-clock"></i>
                                {{ trans("datetime.Monday") }} - {{ trans("datetime.Friday") }} | {{ trans("datetime.08:00") }} - {{ trans("datetime.17:00") }}
                            </a>
                        </li>
                    </ul>

                    {{-- <div id="newsletter">
                        <h6>{{ trans("general.Newsletter") }}</h6>
                        <div id="message-newsletter"></div>
                        <form method="post" action="{{ route("index") }}" name="newsletter_form" id="newsletter_form">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                <input type="submit" value="Submit" id="submit-newsletter">
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <ul id="additional_links">
                        {{-- <li><a draggable="false" href="{{ route("terms-and-conditions.index") }}">Terms and conditions</a></li> --}}
                        {{-- <li><a draggable="false" href="{{ route("privacy-policy.index") }}">Privacy Policy</a></li> --}}
                        <li>
                            {{ __("footer.Created and Designed by") }}
                            <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ __("footer.Created and Designed by") }} DIW.co.id">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div id="copy">
                        &copy; {{ __("footer.Copyright") }} @if(env("APP_YEAR") && env("APP_YEAR") != date("Y")) {{ env("APP_YEAR") . " - " }} @endif {{ date("Y") }} &reg;&nbsp;
                        <a draggable="false" href="{{ URL::to("/") }}" target="_blank">
                            <strong>{{ env("APP_NAME") }}</strong>
                        </a> &trade;
                        {{ __("footer.All Rights Reserved") }}.
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

        <div id="page">

            @yield("header")

            <main>

                @if(!trim($__env->yieldContent("code")))

                @if (!Route::is("index"))

                    @include("layouts.breadcrumbs")

                @endif

                    @yield("content")

                @else

                    @yield("error-content")

                @endif

            </main>

        </div>

        @yield("footer")

        @yield("script")

        @include("sweetalert::alert")
        {{-- @include("sweetalert::alert", ["cdn" => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}

        @livewireScripts

    </body>

</html>
