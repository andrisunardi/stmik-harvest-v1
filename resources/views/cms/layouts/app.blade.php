@section("vendors")
    @include("vendors.meta")

    @stack("meta")

    @include("vendors.jquery")

    {{-- @include("vendors.autonumeric") --}}

    {{-- @include("vendors.bootstrap") --}}

    {{-- @include("vendors.clarity-microsoft-tag") --}}

    @include("vendors.clock")

    @include("vendors.created-and-designed-by")

    {{-- @include("vendors.custom-file-input-upload") --}}

    {{-- @include("vendors.datatable") --}}

    {{-- @include("vendors.disabled-ctrl-u-and-f12") --}}

    {{-- @include("vendors.disabled-right-click-image") --}}

    {{-- @include("vendors.disabled-right-click") --}}

    {{-- @include("vendors.disabled-zoom") --}}

    {{-- @include("vendors.dropify") --}}

    {{-- @include("vendors.dropzone") --}}

    {{-- @include("vendors.enter-to-tab-and-back-to-first-field-error") --}}

    {{-- @include("vendors.facebook-page") --}}

    @include("vendors.font-awesome")

    {{-- @include("vendors.froala") --}}

    {{-- @include("vendors.getbutton-io") --}}

    {{-- @include("vendors.google-analytics") --}}

    {{-- @include("vendors.google-tag-manager") --}}

    {{-- @include("vendors.livechat-tawk") --}}

    {{-- @include("vendors.location") --}}

    {{-- @include("vendors.lozad") --}}

    @include("vendors.pace")

    @include("vendors.select2")

    {{-- @include("vendors.show-hide-password") --}}

    {{-- @include("vendors.summernote") --}}

    {{-- @include("vendors.tooltip") --}}

    {{-- @include("vendors.validation-form") --}}

    @include("vendors.trix")
@endsection

@section("css")
    <link rel="preconnect" href="{{ asset("https://fonts.gstatic.com") }}">
    <link rel="stylesheet" href="{{ asset("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap") }}">

    <link rel="icon" href="{{ asset("img/core-img/favicon.ico") }}">
    <link rel="manifest" href="{{ asset("assets/{$sub_domain}/manifest.json") }}">
    <link rel="apple-touch-icon" href="{{ asset("img/icons/icon-96x96.png") }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("img/icons/icon-152x152.png") }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset("img/icons/icon-167x167.png") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("img/icons/icon-180x180.png") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/bootstrap-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/tiny-slider.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/baguetteBox.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/rangeslider.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/vanilla-dataTables.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/css/apexcharts.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/{$sub_domain}/style.css") }}">

    <link rel="stylesheet" href="{{asset('editor/trix.css')}}">
    <script src="{{asset('js/trix.js')}}"></script>

    <style>
        .custom-alert-2.alert-success, .bg-success, .btn-success {
            background-color: #006400 !important;
        }
    </style>

    @stack("css")
@endsection

@section("script")
    <script src="{{ asset("assets/{$sub_domain}/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/slideToggle.min.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/internet-status.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/tiny-slider.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/baguetteBox.min.js") }}"></script>
    {{-- <script src="{{ asset("assets/{$sub_domain}/js/countdown.js") }}"></script> --}}
    <script src="{{ asset("assets/{$sub_domain}/js/rangeslider.min.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/vanilla-dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/index.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/dark-rtl.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/active.js") }}"></script>
    <script src="{{ asset("assets/{$sub_domain}/js/pwa.js") }}"></script>

    @stack("script")
@endsection

@section("setting")
    <div class="dark-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="dark-mode-text text-center">
                <svg class="bi bi-moon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"></path>
                </svg>
                <p class="mb-0">{{ trans("index.Switching To Dark Mode") }}</p>
            </div>
            <div class="light-mode-text text-center">
                <svg class="bi bi-brightness-high" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
                    ></path>
                </svg>
                <p class="mb-0">{{ trans("index.Switching To Light Mode") }}</p>
            </div>
        </div>
    </div>

    <div class="rtl-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="rtl-mode-text text-center">
                <svg class="bi bi-text-right" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                    ></path>
                </svg>
                <p class="mb-0">{{ trans("index.Switching To RTL Mode") }}</p>
            </div>
            <div class="ltr-mode-text text-center">
                <svg class="bi bi-text-left" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        fill-rule="evenodd"
                        d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                    ></path>
                </svg>
                <p class="mb-0">{{ trans("index.Switching To Default Mode") }}</p>
            </div>
        </div>
    </div>

    <div id="setting-popup-overlay"></div>

    <div class="card setting-popup-card shadow-lg" id="settingCard">
        <div class="card-body">
            <div class="container">
                <div class="setting-heading d-flex align-items-center justify-content-between mb-3">
                    <p class="mb-0">{{ trans("index.settings") }}</p>
                    <div class="btn-close" id="settingCardClose"></div>
                </div>
                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="availabilityStatus" checked />
                        <label class="form-check-label" for="availabilityStatus">{{ trans("index.availability_status") }}</label>
                    </div>
                </div>
                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="sendMeNotifications" checked />
                        <label class="form-check-label" for="sendMeNotifications">{{ trans("index.send_me_notifications") }}</label>
                    </div>
                </div>
                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="darkSwitch" />
                        <label class="form-check-label" for="darkSwitch">{{ trans("index.dark_mode") }}</label>
                    </div>
                </div>
                <div class="single-setting-panel">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rtlSwitch" />
                        <label class="form-check-label" for="rtlSwitch">{{ trans("index.rtl_mode") }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("preloader")
    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">{{ trans("index.Loading") }}...</span>
        </div>
    </div>
@endsection

@section("internet-connection-status")
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection

@section("header")
    @if (Auth::guard("admin")->check())
        <div class="header-area bg-primary shadow-sm" id="headerArea">
            <div class="container-fluid">
                <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                    {{-- <div class="back-button">
                        <a draggable="false" href="{{ url()->previous() }}">
                            <svg class="bi bi-arrow-left-short text-white" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                            </svg>
                        </a>
                    </div> --}}
                    <div class="navbar--toggler" data-bs-toggle="offcanvas" data-bs-target="#navigation" aria-controls="navigation">
                        <span class="d-block"></span><span class="d-block"></span><span class="d-block"></span>
                        {{-- <div class="span-wrap"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div> --}}
                    </div>
                    <div class="page-heading">
                        <h6 class="mb-0 text-white">@yield("name")</h6>
                    </div>
                    {{-- <div class="user-profile-wrapper">
                        <a draggable="false" class="user-profile-trigger-btn" href="#">
                            <img draggable="false" src="assets/cms/img/bg-img/2.jpg" alt="">
                        </a>
                    </div> --}}
                    <div class="setting-wrapper">
                        <div class="setting-trigger-btn" id="settingTriggerBtn">
                            <svg class="bi bi-gear" width="18" height="18" viewBox="0 0 16 16" fill="url(#gradientSettings)" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="gradientSettings" spreadMethod="pad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0" style="stop-color: #ffffff; stop-opacity: 1;"></stop>
                                        <stop offset="100%" style="stop-color: #ffffff; stop-opacity: 1;"></stop>
                                    </linearGradient>
                                </defs>
                                <path
                                    fill-rule="evenodd"
                                    d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"
                                ></path>
                                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"></path>
                            </svg>
                            <span class="bg-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section("sidebar")
    @if (Auth::guard("admin")->check())
        <div class="offcanvas offcanvas-start" id="navigation" data-bs-scroll="true" tabindex="-1" aria-labelledby="navigation">
            <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>

            <div class="offcanvas-body p-0">
                <div class="sidenav-wrapper">
                    <div class="sidenav-profile bg-gradient">
                        <div class="sidenav-style1"></div>
                        <div class="user-profile">
                            <img draggable="false"
                                src="{{ Auth::user()->assetImage() }}"
                                alt="{{ Auth::user()->altImage() }}">
                        </div>
                        <div class="user-info">
                            <h6 class="user-name mb-0">{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->access?->name }}</span>
                        </div>
                    </div>
                    <ul class="sidenav-nav ps-0">
                        <li>
                            <a draggable="false" href="{{ route("{$sub_domain}.index") }}">
                                <i class="bi bi-house-door"></i>
                                {{ trans("index.home") }}
                            </a>
                        </li>
                        @foreach ($data_all_menu as $all_menu)
                            @php $total = "total_" . Str::slug($all_menu->name, "_") @endphp
                            <li>
                                <a draggable="false" href="{{ route("{$sub_domain}." . Str::slug($all_menu->name) . ".index") }}">
                                    <i class="{{ $all_menu->icon }}"></i>
                                    {{ $all_menu->translate_name }}
                                    <span class="badge bg-primary rounded-pill ms-2">{{ Str::thousand($$total) }}</span>
                                </a>
                            </li>
                        @endforeach

                        @foreach ($data_all_menu_category as $all_menu_category)
                            <li>
                                <a draggable="false" href="javascript:;">
                                    <i class="{{ $all_menu_category->icon }}"></i>
                                    {{ $all_menu_category->translate_name }}
                                </a>
                                <ul>
                                    @foreach ($all_menu_category->data_menu as $menu)
                                        @php $total = "total_" . Str::slug($menu->name, "_") @endphp
                                        <li>
                                            <a draggable="false" href="{{ route("{$sub_domain}." . Str::slug($menu->name) . ".index") }}">
                                                <i class="{{ $menu->icon }}"></i>
                                                {{ $menu->translate_name }}
                                                <span class="badge bg-primary rounded-pill ms-2">{{ Str::thousand($$total) }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <li>
                            <a draggable="false" href="{{ route("{$sub_domain}.profile.index") }}">
                                <i class="bi bi-person-circle"></i>
                                {{ trans("index.profile") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" href="{{ route("{$sub_domain}.logout.index") }}">
                                <i class="bi bi-box-arrow-right"></i>
                                {{ trans("index.logout") }}
                            </a>
                        </li>
                    </ul>

                    <div class="social-info-wrap">
                        <a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}"><i class="bi bi-facebook"></i></a>
                        <a draggable="false" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}"><i class="bi bi-twitter"></i></a>
                        <a draggable="false" href="https://www.google.com/{{ env("SOCIAL_MEDIA_GOOGLE") }}"><i class="bi bi-google"></i></a>
                        <a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_LINKEDIN") }}"><i class="bi bi-instagram"></i></a>
                        <a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}"><i class="bi bi-youtube"></i></a>
                        <a draggable="false" href="https://www.linkedin.com/{{ env("SOCIAL_MEDIA_LINKEDIN") }}"><i class="bi bi-linkedin"></i></a>
                    </div>

                    <div class="copyright-info">
                        <p>
                            &copy; {{ trans("index.copyright") }} @if(env("APP_YEAR") && env("APP_YEAR") != date("Y")) {{ env("APP_YEAR") . " - " }} @endif {{ date("Y") }} &reg;&nbsp;
                            <br>
                            <a draggable="false" href="{{ URL::to("/") }}" target="_blank"><strong>{{ env("APP_NAME") }}</strong></a> &trade;
                            {{ trans("index.all_rights_reserved") }}.
                        </p>
                        <p class="mt-2">
                            {{ trans("index.created_and_designed_by") }}
                            <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ trans("index.created_and_designed_by") }} DIW.co.id">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section("footer")
    @if (Auth::guard("admin")->check())
        <div class="footer-nav-area" id="footerNav">
            <div class="container px-0">
                <div class="footer-nav position-relative shadow-sm footer-style-six">
                    <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                        <li class="@yield("all-menu-active")">
                            <a draggable="false" href="{{ route("{$sub_domain}.all-menu.index") }}">
                                <svg class="bi bi-collection" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"></path>
                                </svg>
                                <span>{{ trans("index.all_menu") }}</span>
                            </a>
                        </li>

                        <li class="@yield("history-active")">
                            <a draggable="false" href="{{ route("{$sub_domain}.history.index") }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <span>{{ trans("index.history") }}</span>
                            </a>
                        </li>

                        <li class="@yield("home-active")">
                            <a draggable="false" href="{{ route("{$sub_domain}.index") }}">
                                <svg class="bi bi-house-door" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                                </svg>
                                <span>{{ trans("index.home") }}</span>
                            </a>
                        </li>

                        <li class="@yield("config-active")">
                            <a draggable="false" href="{{ route("{$sub_domain}.config.index") }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
                                  </svg>
                                <span>{{ trans("index.config") }}</span>
                            </a>
                        </li>

                        <li class="@yield("profile-active")">
                            <a draggable="false" href="{{ route("{$sub_domain}.profile.index") }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <span>{{ trans("index.profile") }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endsection

@section("error-content")
    <div class="page-content-wrapper py-3">
        <div class="custom-container">
            <div class="card">
                <div class="card-body px-5 text-center">
                    <img draggable="false" class="mb-4" src="{{ asset("assets/{$sub_domain}/img/bg-img/39.png") }}" alt="{{ trans("index.error") }} - {{ env("APP_TITLE") }}">
                    <h4>@yield("code")<br>@yield("message")</h4>
                    <p class="mb-4">@yield("description")</p>
                    <a draggable="false" class="btn btn-creative btn-primary" href="{{ route("{$sub_domain}.index") }}">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env("APP_LANGUAGE") }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ env("APP_LANGUAGE") }}">

    <head>

        <title>@yield("name") | CMS | {{ env("APP_TITLE") }}</title>

        @yield("vendors")

        @yield("css")

        @livewireStyles

    </head>

    <body>

        @yield("setting")

        @yield("preloader")

        @yield("internet-connection-status")

        @if(!trim($__env->yieldContent("code")))

            @yield("header")

            @yield("sidebar")

            @yield("content")

            @yield("footer")

        @else

            @yield("error-content")

        @endif

        @yield("script")

        @livewireScripts

    </body>

</html>
