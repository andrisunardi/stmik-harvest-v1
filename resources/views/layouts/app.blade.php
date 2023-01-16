@section("vendors")
    @include("vendors.meta")

    @stack("meta")

    @include("vendors.jquery")

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

    {{-- @include("vendors.getbutton-io") --}}

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
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    <style>
        .text-justify {
            text-align: justify;
        }
        .color-whatsapp {
            color: #00a356;
        }
        .background-color-whatsapp {
            color: #fff;
            background-color: #00a356;
        }
        .color-line {
            color: #00b300;
        }
        .background-color-line {
            color: #fff;
            background-color: #00b300;
        }
        .color-telegram {
            color: #3faedf;
        }
        .background-color-telegram {
            color: #fff;
            background-color: #3faedf;
        }
        .color-viber {
            color: #784f98;
        }
        .background-color-viber {
            color: #fff;
            background-color: #784f98;
        }
        .color-skype {
            color: #02aef3;
        }
        .background-color-skype {
            color: #fff;
            background-color: #02aef3;
        }
        .color-facebook-messenger {
            color: #007bf7;
        }
        .background-color-facebook-messenger {
            color: #fff;
            background-color: #007bf7;
        }
        .color-facebook {
            color: #385498;
        }
        .background-color-facebook {
            color: #fff;
            background-color: #385498;
        }
        .color-twitter {
            color: #3eb5ec;
        }
        .background-color-twitter {
            color: #fff;
            background-color: #3eb5ec;
        }
        .color-google {
            color: #d6473b;
        }
        .background-color-google {
            color: #fff;
            background-color: #d6473b;
        }
        .color-instagram {
            color: #b300ae;
        }
        .background-color-instagram {
            color: #fff;
            background-color: #b300ae;
        }
        .color-youtube {
            color: #f60000;
        }
        .background-color-youtube {
            color: #fff;
            background-color: #f60000;
        }
        .color-linkedin {
            color: #0074b3;
        }
        .background-color-linkedin {
            color: #fff;
            background-color: #0074b3;
        }
        .color-tumblr {
            color: #33445a;
        }
        .background-color-tumblr {
            color: #fff;
            background-color: #33445a;
        }
        .color-pinterest {
            color: #c62026;
        }
        .background-color-pinterest {
            color: #fff;
            background-color: #c62026;
        }
        .color-android {
            color: #30d780;
        }
        .background-color-android {
            color: #fff;
            background-color: #30d780;
        }
        .color-apple {
            color: #000;
        }
        .background-color-apple {
            color: #fff;
            background-color: #000;
        }
        .color-blogger {
            color: #e36c20;
        }
        .background-color-blogger {
            color: #fff;
            background-color: #e36c20;
        }
        html,
        body {
            cursor: default;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
        .white-space-pre-wrap {
            white-space: pre-wrap;
        }

    </style>

    @stack("css")
@endsection

@section("script")
    <script src="{{ asset("js/lib/bootstrap.bundle.min.js") }}"></script>
    <script type="module" src="{{ asset("https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js") }}"></script>
    <script src="{{ asset("js/plugins/splide/splide.min.js") }}"></script>
    <script src="{{ asset("js/base.js") }}"></script>

    <script>
        AddtoHome("2000", "once");
    </script>

    {{-- <script>
        $(document).ready(function(e){
            $(window).on("beforeunload",function(e){
                $("#leave-a-site").modal("show")
                e.preventDefault()
                return
            })
        })
    </script>

    <div class="modal fade dialogbox" id="leave-a-site" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure to leave ?</h5>
                </div>
                <div class="modal-body">
                    Are you sure about that?
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                            CANCEL
                        </a>
                        <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">
                            <ion-icon name="checkmark-outline"></ion-icon>
                            SEND
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @stack("script")
@endsection

@section("header")
    <div class="appHeader bg-primary text-light no-border">
        <div class="left">
            @if (Route::is("index"))
                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.navigation_menu") }}">
                    <a draggable="false" href="javascript:;" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                        <ion-icon name="menu-outline"></ion-icon>
                    </a>
                </div>
            @else
                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.go_back") }}">
                    <a draggable="false" href="{{ url()->previous() == Request::fullUrl() && !trim($__env->yieldContent("error")) ? route("index") : url()->previous() }}" class="headerButton goBack">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </a>
                </div>
            @endif

            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.change_language") }}">
                <a draggable="false" href="javascript:;" class="headerButton" data-bs-toggle="modal" data-bs-target="#changeLanguage">
                    <ion-icon class="icon" name="language-outline"></ion-icon>
                    <span class="badge badge-danger text-uppercase">{{ App::getLocale() }}</span>
                </a>
            </div>
        </div>

        <div class="pageTitle">
            {{-- @yield("title") --}}
            <a draggable="false" href="{{ route("index") }}">
                @if (now()->format("m") == 12)
                    <span data-bs-toggle="tooltip" data-bs-placement="left" title="{{ trans("index.merry_christmas") }} {{ now()->format("Y") }}">🎅🏻</span>
                @endif
                <img draggable="false" src="{{ asset("images/logo.webp") }}" class="logo" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ env("APP_TITLE") }}">
                @if (now()->format("m") == 12)
                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="{{ trans("index.merry_christmas") }} {{ now()->format("Y") }}">🎄</span>
                @endif
            </a>
        </div>

        <div class="right">
            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.search") }}">
                <a draggable="false" href="javascript:;" class="headerButton toggle-searchbox">
                    <ion-icon name="search-outline"></ion-icon>
                </a>
            </div>
            @auth
                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.profile") }}">
                    <a draggable="false" href="{{ route("profile.index") }}" class="headerButton">
                        <img draggable="false" class="imaged w32" src="{{ Auth::user()->assetImage() }}" alt="{{ Auth::user()->altImage() }}">
                        <span class="badge badge-danger">99</span>
                    </a>
                </div>
            @else
                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.login") }}">
                    <a draggable="false" href="{{ route("login.index") }}" class="headerButton">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </a>
                </div>
            @endauth
        </div>
    </div>
@endsection

@section("footer")
    <div class="appFooter">
        <div class="footer-title">
            &copy; {{ trans("index.copyright") }}
            @if (env("APP_YEAR") && env("APP_YEAR") != now()->format("Y")) {{ env("APP_YEAR") . " - " }} @endif
            {{ now()->format("Y") }} &reg;
            <a draggable="false" href="{{ route("index") }}" target="_blank">
                <strong>{{ env("APP_NAME") }}</strong>&trade;
            </a>
            <br class="d-block d-sm-none">
            {{ trans("index.all_rights_reserved") }}.
        </div>

        <div>
            {{ env("APP_TITLE") }}
        </div>

        <div class="mt-2">
            <a draggable="false" class="btn btn-icon btn-sm background-color-facebook me-1" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.follow_our_facebook_page") }} {{ "@".env("SOCIAL_MEDIA_FACEBOOK") }}">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-twitter me-1" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.follow_our_twitter") }} {{ "@".env("SOCIAL_MEDIA_TWITTER") }}">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-google me-1" href="https://www.g.page/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.our_google_page") }} {{ "@".env("SOCIAL_MEDIA_GOOGLE") }}">
                <ion-icon name="logo-google"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-instagram me-1" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.follow_our_instagram") }} {{ "@".env("SOCIAL_MEDIA_INSTAGRAM") }}">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-youtube me-sm-2" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.subscribe_our_youtube_channel") }} {{ env("APP_NAME") }}">
                <ion-icon name="logo-youtube"></ion-icon>
            </a>
            <br class="d-inline d-sm-none">
            <br class="d-inline d-sm-none">
            <a draggable="false" class="btn btn-icon btn-sm background-color-linkedin me-1" href="https://www.linkedin.com/{{ env("SOCIAL_MEDIA_LINKEDIN") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.follow_our_linkedin_company") }} {{ env("APP_NAME") }}">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-tumblr me-1" href="https://{{ env("SOCIAL_MEDIA_TUMBLR") }}.tumblr.com" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.follow_our_tumblr") }} {{ "@".env("SOCIAL_MEDIA_TUMBLR") }}">
                <ion-icon name="logo-tumblr"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-pinterest me-1" href="https://www.pinterest.com/{{ env("SOCIAL_MEDIA_PINTEREST") }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.follow_our_pinterest") }} {{ "@".env("SOCIAL_MEDIA_PINTEREST") }}">
                <ion-icon name="logo-pinterest"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-android me-1" href="https://play.google.com/store/apps/details?id=com.diw.crm" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.get_in_on_google_play") }}">
                <ion-icon name="logo-android"></ion-icon>
            </a>
            <a draggable="false" class="btn btn-icon btn-sm background-color-apple" href="https://www.apple.com/app-store/" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.available_on_the_app_store") }}">
                <ion-icon name="logo-apple"></ion-icon>
            </a>
        </div>
    </div>
@endsection

@section("sidebarLeft")
    @if (!trim($__env->yieldContent("code")))
        <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        @auth
                            <div class="profileBox pt-2 pb-2">
                                <div class="image-wrapper">
                                    <img draggable="false" src="{{ Auth::user()->assetImage() }}" class="imaged w36" alt="{{ Auth::user()->altImage() }}">
                                </div>
                                <div class="in">
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <div class="text-muted">{{ Auth::user()->email }}</div>
                                </div>
                                <a draggable="false" href="javascript:;" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                                    <ion-icon name="close-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="sidebar-balance">
                                <div class="listview-title">{{ trans("index.balance") }}</div>
                                <div class="in">
                                    <h1 class="amount">Rp. 1.000.000</h1>
                                </div>
                            </div>

                            <div class="action-group">
                                <a draggable="false" href="{{ route("profile.index") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="person-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.profile") }}
                                    </div>
                                </a>
                                <a draggable="false" href="{{ route("profile.edit-profile") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="pencil-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.edit-profile") }}
                                    </div>
                                </a>
                                <a draggable="false" href="{{ route("profile.change-password") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="lock-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.change-password") }}
                                    </div>
                                </a>
                                <a draggable="false" href="{{ route("logout.index") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="sign-out-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.logout") }}
                                    </div>
                                </a>
                            </div>
                        @endauth

                        <div class="listview-title mt-1">{{ trans("index.navigation_menu") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a draggable="false" class="item" href="{{ route("index") }}">
                                    <div class="icon-box bg-primary">
                                        @if (now()->format("m") == 12)
                                            <ion-icon name="snow-outline" class="fa-spin"></ion-icon>
                                        @else
                                            <ion-icon name="home-outline"></ion-icon>
                                        @endif
                                    </div>
                                    <div class="in">
                                        {{ trans("index.home") }}
                                        <span class="badge badge-success">{{ trans("index.updated") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("game.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="game-controller-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.game") }}
                                        <span class="badge badge-primary">{{ $totalGame }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("news.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="newspaper-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.news") }}
                                        <span class="badge badge-primary">{{ $totalNews }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("blog.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="images-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.blog") }}
                                        <span class="badge badge-primary">{{ $totalBlog }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("quote.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.quote") }}
                                        <span class="badge badge-primary">{{ $totalQuote }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("contact.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="call-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.contact") }}
                                        <span class="badge badge-success">{{ trans("index.updated") }}</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-1">{{ trans("index.about_us") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a draggable="false" class="item" href="{{ route("history.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="receipt-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.history") }}
                                        <span class="badge badge-primary">{{ $experience }} {{ trans("index.years") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("our-team.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="people-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.our_team") }}
                                        <span class="badge badge-primary">{{ $totalTeam }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("testimonials.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.testimonials") }}
                                        <span class="badge badge-primary">{{ $totalTestimonial }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("endorsement.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="heart-circle-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.endorsement") }}
                                        <span class="badge badge-primary">{{ $totalEndorsement }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("career.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="rocket-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.career") }}
                                        <span class="badge badge-primary">{{ $totalCareer }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("terms-and-conditions.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="library-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.terms_and_conditions") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("privacy-policy.index") }}">
                                    <div class="icon-box bg-info">
                                        <ion-icon name="reader-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.privacy_policy") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-1">{{ trans("index.portfolio") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a draggable="false" class="item" href="{{ route("portfolio.index") }}">
                                    <div class="icon-box bg-success">
                                        <ion-icon name="grid-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.all_portfolio") }}
                                        <span class="badge badge-primary">{{ $totalPortfolio }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("portfolio.timeline") }}">
                                    <div class="icon-box bg-success">
                                        <ion-icon name="list-circle-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.timeline") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("portfolio.category.index") }}">
                                    <div class="icon-box bg-success">
                                        <ion-icon name="pricetags-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.category") }}
                                        <span class="badge badge-primary">{{ $totalPortfolioCategory }}</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-1">{{ trans("index.order_website") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a draggable="false" class="item" href="{{ route("submit-your-concept.index") }}">
                                    <div class="icon-box bg-warning">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.submit_your_concept") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("price-list.index") }}">
                                    <div class="icon-box bg-warning">
                                        <ion-icon name="cash-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.price_list") }}
                                        <span class="badge badge-primary">{{ $totalPriceList }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("check-domain.index") }}">
                                    <div class="icon-box bg-warning">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.check_domain") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("payment-methods.index") }}">
                                    <div class="icon-box bg-warning">
                                        <ion-icon name="card-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.payment_methods") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("proposal-document.index") }}">
                                    <div class="icon-box bg-warning">
                                        <ion-icon name="document-text-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.proposal_document") }}
                                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("faq.index") }}">
                                    <div class="icon-box bg-warning">
                                        <ion-icon name="help-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.faq") }}
                                        <span class="badge badge-primary">{{ $totalFaq }}</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-1">{{ trans("index.contact") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a draggable="false" class="item" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ App::isLocale('en') == "en" ? "Hello, I know this number from the website www.diw.co.id for website development" : "Halo, saya mengetahui nomor ini dari website www.diw.co.id untuk pembuatan website" }}" target="_blank">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="logo-whatsapp"></ion-icon>
                                    </div>
                                    <div class="in">
                                        WA : {{ env("CONTACT_WHATSAPP") }}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="mailto:{{ env("CONTACT_EMAIL") }}?subject={{ App::isLocale('en') == "en" ? "Ask About Website Development Services" : "Tanya Tentang Jasa Pembuatan Website" }}&body={{ App::isLocale('en') == "en" ? "Hello, I know this number from the website www.diw.co.id for website development" : "Halo, saya mengetahui nomor ini dari website www.diw.co.id untuk pembuatan website" }}">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="mail-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        Email : {{ env("CONTACT_EMAIL") }}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="tel:+62{{ Str::substr(str_replace(array("-", " ", "+", "(", ")"), "", env("CONTACT_PHONE")), 2) }}">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="call-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.call") }} : {{ env("CONTACT_PHONE") }}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="sms:+{{ Str::phone(env("CONTACT_PHONE")) }}?&body={{ App::isLocale('en') == "en" ? "Hello, I know this number from the website www.diw.co.id for website development" : "Halo, saya mengetahui nomor ini dari website www.diw.co.id untuk pembuatan website" }}">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="chatbox-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        SMS : {{ env("CONTACT_PHONE") }}
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mb-3">
                            {{ trans("index.business_hours") }} : {{ trans("index.monday") }} - {{ trans("index.friday") }}<br>
                            {{ trans("index.09_00") }} {{ trans("index.am") }} - {{ trans("index.06_00") }} {{ trans("index.pm") }}
                        </div>

                        {{-- <div class="listview-title mt-1">{{ trans("index.friends") }}</div>
                        <ul class="listview image-listview flush transparent no-line">
                            <li>
                                <a draggable="false" href="#" class="item">
                                    <img draggable="false" src="{{ asset("img/sample/avatar/avatar2.jpg") }}" alt="Image" class="image">
                                    <div class="in">
                                        <div>Andri Sunardi</div>
                                    </div>
                                </a>
                            </li>
                        </ul> --}}

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section("sidebarRight")
    @if (!trim($__env->yieldContent("code")))
        <div class="modal fade panelbox panelbox-right" id="sidebar-right" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans("index.setting") }}</h5>
                        <a href="javascript:;" data-bs-dismiss="modal">{{ trans("index.close") }}</a>
                    </div>
                    <div class="modal-body p-0">
                        @auth
                            <div class="profileBox pt-2 pb-2">
                                <div class="image-wrapper">
                                    <img draggable="false" src="{{ asset("images/user/" . Auth::user()->image) }}" class="imaged w36" alt="{{ trans("index.user") }} - {{ Auth::user()->name }} - {{ env("APP_TITLE") }}">
                                </div>
                                <div class="in">
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <div class="text-muted">{{ Auth::user()->email }}</div>
                                </div>
                                <a draggable="false" href="javascript:;" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                                    <ion-icon name="close-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="sidebar-balance">
                                <div class="listview-title">{{ trans("index.balance") }}</div>
                                <div class="in">
                                    <h1 class="amount">Rp. 1.000.000</h1>
                                </div>
                            </div>

                            <div class="action-group">
                                <a draggable="false" href="{{ route("profile.index") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="person-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.profile") }}
                                    </div>
                                </a>
                                <a draggable="false" href="{{ route("profile.edit-profile") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="pencil-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.edit-profile") }}
                                    </div>
                                </a>
                                <a draggable="false" href="{{ route("profile.change-password") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="lock-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.change-password") }}
                                    </div>
                                </a>
                                <a draggable="false" href="{{ route("logout.index") }}" class="action-button">
                                    <div class="in">
                                        <div class="iconbox">
                                            <ion-icon name="sign-out-outline"></ion-icon>
                                        </div>
                                        {{ trans("index.logout") }}
                                    </div>
                                </a>
                            </div>
                        @endauth

                        <div class="listview-title mt-1">{{ trans("index.account") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <a draggable="false" class="item" href="{{ route("login.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="log-in-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.login") }}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("register.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.register") }}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="item" href="{{ route("forgot-password.index") }}">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="help-circle-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        {{ trans("index.forgot_password") }}
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="listview-title mt-1">{{ trans("index.theme") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="moon-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ trans("index.dark_mode") }} <p class="text-muted mb-0">{{ trans("index.off") }}</p></div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                                            <label class="form-check-label" for="darkmodeSwitch"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="listview-title mt-1">{{ trans("index.control") }}</div>
                        <ul class="listview flush transparent no-line image-listview">
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="musical-notes-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ trans("index.music") }} <p class="text-muted mb-0">{{ trans("index.off") }}</p></div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="music">
                                            <label class="form-check-label" for="music"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="volume-high-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ trans("index.sound") }} <p class="text-muted mb-0">{{ trans("index.off") }}</p></div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="sound">
                                            <label class="form-check-label" for="sound"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="notifications-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ trans("index.notification") }} <p class="text-muted mb-0">{{ trans("index.off") }}</p></div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notification">
                                            <label class="form-check-label" for="notification"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section("loader")
    <div id="loader">
        <div class="spinner-border text-white me-1" role="status"></div>
        {{-- <img draggable="false" src="{{ asset("images/loading.webp") }}" class="loading-icon me-1" alt="{{ trans("index.loading") }} - {{ env("APP_TITLE") }}"> --}}
        <span class="text-white">{{ trans("index.now_loading") }}...</span>
    </div>
@endsection

@section("search")
    <div id="search" class="appHeader">
        <form role="form" class="search-form" method="GET" action="{{ route("search.index") }}">
            <div class="form-group searchbox">
                <input type="search" class="form-control" pattern="[^\s*].*[^\s*]" name="search" value="{{ Request::get("search") }}" placeholder="{{ trans("index.search") }}..." autocomplete="off" autocapitalize="none" required onfocus="this.setSelectionRange(this.value.length,this.value.length);">
                <i class="input-icon icon ion-ios-search"></i>
                <a draggable="false" href="javascript:;" class="ms-1 close toggle-searchbox">
                    <i class="icon ion-ios-close-circle"></i>
                </a>
            </div>
        </form>
    </div>
@endsection

@section("bottomMenu")
    <div class="appBottomMenu">
        {{-- <a draggable="false" href="{{ route("order.index") }}" class="item @yield("order-active")">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.order") }}">
                <ion-icon name="create-outline"></ion-icon>
                <strong>{{ trans("index.order") }}</strong>
            </div>
        </a> --}}
        <a draggable="false" href="{{ route("portfolio.index") }}" class="item @yield("portfolio-active")">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.portfolio") }}">
                <ion-icon name="grid-outline"></ion-icon>
                <strong>{{ trans("index.portfolio") }}</strong>
            </div>
        </a>
        {{-- <a draggable="false" href="{{ route("cart.index") }}" class="item @yield("cart-active")">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.cart") }}">
                <ion-icon name="cart-outline"></ion-icon>
                <strong>{{ trans("index.cart") }}</strong>
            </div>
        </a> --}}
        <a draggable="false" href="{{ route("price-list.index") }}" class="item @yield("price-list-active")">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.price_list") }}">
                <ion-icon name="cash-outline"></ion-icon>
                <strong>{{ trans("index.price_list") }}</strong>
            </div>
        </a>
        <a draggable="false" href="{{ route("index") }}" class="item">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.home") }}">
                <div class="action-button">
                    @if (now()->format("m") == 12)
                        <ion-icon name="snow-outline" class="fa-spin"></ion-icon>
                    @else
                        <ion-icon name="home-outline"></ion-icon>
                    @endif
                </div>
            </div>
        </a>
        {{-- <a draggable="false" href="{{ route("chat.index") }}" class="item @yield("chat-active")">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.chat") }}">
                <ion-icon name="chatbubbles-outline"></ion-icon>
                <strong>{{ trans("index.chat") }}</strong>
            </div>
        </a> --}}
        <a draggable="false" href="{{ route("contact.index") }}" class="item @yield("contact-active")">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.contact") }}">
                <ion-icon name="call-outline"></ion-icon>
                <strong>{{ trans("index.contact") }}</strong>
            </div>
        </a>
        <a draggable="false" href="#sidebar-right" class="item @yield("setting-active")" data-bs-toggle="modal" data-bs-target="#sidebar-right">
            <div class="col" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.setting") }}">
                <ion-icon name="settings-outline" class="fa-spin"></ion-icon>
                <strong>{{ trans("index.setting") }}</strong>
            </div>
        </a>
    </div>
@endsection

@section("errorContent")
    <div class="section h-100 d-flex justify-content-center align-items-center">
        <div class="splash-page">
            <div class="iconbox mb-3">
                <ion-icon name="warning-outline"></ion-icon>
            </div>
            <h1 class="h1">@yield("code")</h1>
            <h2 class="mb-2">@yield("message")</h2>
            <p>@yield("description")</p>
        </div>
    </div>

    <div class="fixed-bar">
        <div class="row">
            <div class="col-6">
                <a draggable="false" href="{{ url()->previous() == Request::fullUrl() && !trim($__env->yieldContent("error")) ? route("index") : url()->previous() }}" class="btn btn-lg btn-outline-secondary btn-block">{{ trans("index.cancel") }}</a>
            </div>
            <div class="col-6">
                <a draggable="false" href="{{ Request::fullUrl() }}" onclick='window.location.reload(true);' class="btn btn-lg btn-primary btn-block">{{ trans("index.try_again") }}</a>
            </div>
        </div>
    </div>
@endsection

@section("addToHome")
    <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1"><img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>{{ env("APP_NAME") }}</strong> on your iPhone's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1">
                            <img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>{{ env("APP_NAME") }}</strong> on your Android's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("changeLanguage")
    <div class="modal fade dialogbox" id="changeLanguage" data-bs-backdrop="dynamic" data-bs-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans("index.change_language") }}</h5>
                </div>
                <div class="modal-body">
                    {{ trans("index.please_select_language_to_change_language") }}
                </div>
                <div class="modal-footer">
                    <div class="btn-list">
                        <a draggable="false" href="{{ App::isLocale("en") ? "javascript:;" : route("locale", ["locale" => "en"]) }}" class="btn btn-text-{{ App::isLocale("en") ? "primary" : "secondary" }} btn-block">
                            <img draggable="false" src="{{ asset("images/flag/en.webp") }}" alt="{{ trans("index.flag") }}  - {{ trans("index.english") }} - {{ env("APP_TITLE") }}" class="imaged rounded-circle w24 me-1" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.english") }}">
                            {{ trans("index.english") }}
                        </a>
                        <a draggable="false" href="{{ App::isLocale("id") ? "javascript:;" : route("locale", ["locale" => "id"]) }}" class="btn btn-text-{{ App::isLocale("id") ? "primary" : "secondary" }} btn-block">
                            <img draggable="false" src="{{ asset("images/flag/id.webp") }}" alt="{{ trans("index.flag") }} - {{ trans("index.indonesia") }} - {{ env("APP_TITLE") }}" class="imaged rounded-circle w24 me-1" data-toggle="tooltip" data-placement="bottom" title="{{ trans("index.indonesia") }}">
                            {{ trans("index.indonesia") }}
                        </a>
                        <a draggable="false" href="javascript:;" class="btn btn-text-secondary btn-block" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                            {{ trans("index.cancel") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("google-adsense")
    <div class="section mt-2">
        <div class="card text-center">
            <div class="card-header text-center">Google Adsense</div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block;width:100% !important"
                data-ad-client="{{ env("GOOGLE_ADSENSE") }}"
                data-ad-slot="4053874043"
                data-ad-format="auto"
                data-full-width-responsive="false"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <div class="card-footer text-center">{{ trans("index.collaboration_with") }} Google Adsense</div>
        </div>
    </div>
@endsection

@section("domainesia")
    @php $domainesia = Arr::shuffle(["v9ev4", "32ar4", "4gnsc"]) @endphp
    <div class="section mt-2 mb-2 d-none d-sm-block">
        <div class="card">
            <div class="card-header text-center">Domainesia</div>
            <div class="card-body p-0">
                <a draggable="false"href="https://www.domainesia.com/?aff=13708" target="_blank">
                    <img draggable="false" class="w-100" src="https://dnva.me/{{ $domainesia[0] }}" onerror='this.src = "{{ asset("images/image-not-available.png") }}"' alt="Domainesia - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.click_to_get_limited_promo") }}">
                </a>
            </div>
            <div class="card-footer text-center">{{ trans("index.affiliate_with") }} Domainesia</div>
        </div>
    </div>

    @php $domainesia = Arr::shuffle(["c2qau", "opq2h", "kw7xi"]) @endphp
    <div class="section mt-2 mb-2 d-block d-sm-none">
        <div class="card">
            <div class="card-header text-center">Domainesia</div>
            <div class="card-body p-0">
                <a draggable="false"href="https://www.domainesia.com/?aff=13708" target="_blank">
                    <img draggable="false" class="w-100" src="https://dnva.me/{{ $domainesia[0] }}" onerror='this.src = "{{ asset("images/image-not-available.png") }}"' alt="Domainesia - {{ env("APP_TITLE") }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.click_to_get_limited_promo") }}">
                </a>
            </div>
            <div class="card-footer text-center">{{ trans("index.affiliate_with") }} Domainesia</div>
        </div>
    </div>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env("APP_LANGUAGE") }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ env("APP_LANGUAGE") }}">

    <head>

        <title>@if (!Route::is("index"))@yield("title") | @endif{{ env("APP_TITLE") }}</title>

        @yield("vendors")

        @yield("css")

        @livewireStyles

    </head>

    <body {{-- style="background-image: url('{{ asset("images/christmas/background.webp") }}'); background-repeat: repeat;" --}}>

        @yield("loader")

        @yield("header")

        @yield("search")

        <div id="appCapsule" class="
            full-height
            {{ Route::is("search.index") ? "extra-header-active" : null }}
            @if (trim($__env->yieldContent("code"))) vh-100 @endif
            {{-- @if (Route::is("search.index") && !$search) vh-100 @endif --}}
            @if (Route::is("check-domain.index")) vh-100 @endif
        ">

            @if (!Route::is("index"))

                @include("layouts.breadcrumbs")

            @endif

            @if (!trim($__env->yieldContent("code")))

                @yield("google-adsense")

                @yield("content")

                @yield("domainesia")

                @yield("footer")

            @else

                @yield("errorContent")

            @endif

        </div>

        @if (!trim($__env->yieldContent("code")))

            @yield("bottomMenu")

        @endif

        @yield("sidebarLeft")

        @yield("sidebarRight")

        @yield("addToHome")

        @yield("changeLanguage")

        @include("layouts.dialogbox")

        @yield("script")

        @livewireScripts

    </body>

</html>
