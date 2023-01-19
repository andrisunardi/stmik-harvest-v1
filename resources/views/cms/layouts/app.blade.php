@section("vendors")
    @include("vendors.meta")

    @stack("meta")

    @include("vendors.jquery")

    {{-- @include("vendors.autonumeric") --}}

    {{-- @include("vendors.bootstrap") --}}

    {{-- @include("vendors.ckeditor") --}}

    {{-- @include("vendors.clarity-microsoft-tag") --}}

    @include("vendors.created-and-designed-by")

    {{-- @include("vendors.custom-file-input-upload") --}}

    {{-- @include("vendors.datatable") --}}

    @include("vendors.disabled-ctrl-u-and-f12")

    @include("vendors.disabled-right-click-image")

    @include("vendors.disabled-right-click")

    @include("vendors.disabled-zoom")

    {{-- @include("vendors.dropify") --}}

    {{-- @include("vendors.dropzone") --}}

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

    {{-- @include("vendors.trix") --}}
@endsection

@section("css")
    <link href="{{ asset("{$subDomain}/css/styles.css") }}" rel="stylesheet">
    <script src="{{ asset("https://use.fontawesome.com/releases/v6.1.0/js/all.js") }}" crossorigin="anonymous"></script>

    <style>
        .pointer {
            cursor: pointer;
        }

        .text-pre {
            white-space: pre;
        }

        .background-primary {
            background: #{{ env("APP_COLOR") }};
        }

        .text-primary {
            color: #{{ env("APP_COLOR") }};
        }

        a {
            text-decoration: none;
            color: #{{ env("APP_COLOR") }};
        }
    </style>

    @stack("css")
@endsection

@section("script")
    <script src="{{ asset("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js") }}" crossorigin="anonymous"></script>
    <script src="{{ asset("{$subDomain}/js/scripts.js") }}"></script>

    @stack("script")
@endsection

@section("header")
    @auth
        <nav class="sb-topnav navbar navbar-expand navbar-dark background-primary">
            <a draggable="false" class="navbar-brand ps-3 pt-1" href="{{ route("{$subDomain}.index") }}">
                <i class="fas fa-cog fa-fw fa-spin"></i>
                <span><b>CMS</b> Panel</span>
            </a>

            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="javascript:;">
                <i class="fas fa-bars"></i>
            </button>

            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> --}}
            </form>

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item d-none d-lg-inline">
                    <a draggable="false" class="nav-link text-white" href="javascript:;">
                        @livewire("c-m-s.server-time-component")
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a draggable="false" class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-language fa-fw me-1"></i>
                        @if (App::isLocale("en"))
                            {{-- <img draggable="false" src="{{ asset("images/flag/en.webp") }}" width="16" alt="{{ trans("index.flag") }}  - {{ trans("index.english") }} - {{ env("APP_TITLE") }}" class="me-1"> --}}
                            <span class="d-none d-sm-inline">{{ trans("index.english") }}</span>
                        @else
                            {{-- <img draggable="false" src="{{ asset("images/flag/id.webp") }}" width="16" alt="{{ trans("index.flag") }}  - {{ trans("index.indonesia") }} - {{ env("APP_TITLE") }}" class="me-1"> --}}
                            <span class="d-none d-sm-inline">{{ trans("index.indonesia") }}</span>
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.locale", ["locale" => "en"]) }}">
                                {{-- <img draggable="false" src="{{ asset("images/flag/en.webp") }}" width="16" alt="{{ trans("index.flag") }}  - {{ trans("index.english") }} - {{ env("APP_TITLE") }}" class="me-1"> --}}
                                {{ trans("index.english") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.locale", ["locale" => "id"]) }}">
                                {{-- <img draggable="false" src="{{ asset("images/flag/id.webp") }}" width="16" alt="{{ trans("index.flag") }}  - {{ trans("index.indonesia") }} - {{ env("APP_TITLE") }}" class="me-1"> --}}
                                {{ trans("index.indonesia") }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a draggable="false" class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw me-1"></i>
                        {{-- <img draggable="false" src="{{ Auth::user()->assetImage() }}" width="40" alt="{{ Auth::user()->altImage() }}" class="rounded-circle me-1"> --}}
                        <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                    </a>
                    @php($menu = "profile")
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.{$menu}.index") }}">
                                <h6>{{ Auth::user()->name }}</h6>
                                <span>{{ Auth::user()->getRoleNames()->join(", ") }}</span>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.{$menu}.index") }}">
                                <i class="fas fa-id-card fa-fw me-1"></i>
                                {{ trans("index.profile") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.{$menu}.activity-log") }}">
                                <i class="fas fa-user-clock fa-fw me-1"></i>
                                {{ trans("index.activity_log") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.{$menu}.edit-profile") }}">
                                <i class="fas fa-user-edit fa-fw me-1"></i>
                                {{ trans("index.edit_profile") }}
                            </a>
                        </li>
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.{$menu}.change-password") }}">
                                <i class="fas fa-user-lock fa-fw me-1"></i>
                                {{ trans("index.change_password") }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a draggable="false" class="dropdown-item" href="{{ route("{$subDomain}.logout.index") }}">
                                <i class="fas fa-sign-out-alt fa-fw me-1"></i>
                                {{ trans("index.logout") }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endauth
@endsection

@section("sidebar")
    @auth
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">{{ trans("index.navigation_menu") }}</div>
                        <a draggable="false" class="nav-link {{ Route::is("{$subDomain}.index") ? "active" : null }}" href="{{ route("{$subDomain}.index") }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home fa-fw"></i></div> {{ trans("index.home") }}
                        </a>

                        @livewire("c-m-s.sidebar-component")

                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">{{ trans("index.login_as") }} :</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
    @endauth
@endsection

@section("footer")
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-sm-flex align-items-center justify-content-sm-between small text-center">
                <div class="text-muted">&copy; {{ trans("index.copyright") }}
                    @if (env("APP_YEAR") && env("APP_YEAR") != now()->format("Y")) {{ env("APP_YEAR") . " - " }} @endif
                    {{ now()->format("Y") }} &reg;
                    <a draggable="false" href="{{ route("index") }}" target="_blank">
                        <strong>{{ env("APP_NAME") }}</strong>&trade;
                    </a>
                    <br class="d-sm-none" />
                    {{ trans("index.all_rights_reserved") }}.
                </div>

                <div class="text-muted">
                    {{ trans("index.created_and_designed_by") }}
                    <a draggable="false" href="https://www.diw.co.id" target="_blank">
                        <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ trans("index.created_and_designed_by") }} DIW.co.id">
                    </a>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section("footer-login")
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-sm-flex align-items-center justify-content-sm-between small text-center">
                    <div class="text-muted">
                        &copy; {{ trans("index.copyright") }}
                        @if (env("APP_YEAR") && env("APP_YEAR") != now()->format("Y")) {{ env("APP_YEAR") . " - " }} @endif
                        {{ now()->format("Y") }} &reg;
                        <a draggable="false" href="{{ route("index") }}" target="_blank">
                            <strong>{{ env("APP_NAME") }}</strong>&trade;
                        </a>
                        <br class="d-sm-none" />
                        {{ trans("index.all_rights_reserved") }}.
                    </div>

                    <div class="text-muted">
                        {{ trans("index.created_and_designed_by") }}
                        <a draggable="false" href="https://www.diw.co.id" target="_blank">
                            <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ trans("index.created_and_designed_by") }} DIW.co.id">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section("error-content")
    <div id="layoutError" class="pt-5">
        <div id="layoutError_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mt-4">
                                <h1 class="display-1">@yield("code")</h1>
                                <h6 class="display-6">@yield("message")</h6>
                                <p class="lead">@yield("description")</p>
                                <a draggable="false" href="{{ route("{$subDomain}.index") }}" class="btn btn-light mt-3">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    {{ trans("index.back_to_home") }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutError_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-sm-flex align-items-center justify-content-sm-between small text-center">
                        <div class="text-muted">
                            &copy; {{ trans("index.copyright") }}
                            @if (env("APP_YEAR") && env("APP_YEAR") != now()->format("Y")) {{ env("APP_YEAR") . " - " }} @endif
                            {{ now()->format("Y") }} &reg;
                            <a draggable="false" href="{{ route("index") }}" target="_blank">
                                <strong>{{ env("APP_NAME") }}</strong>&trade;
                            </a>
                            <br class="d-sm-none" />
                            {{ trans("index.all_rights_reserved") }}.
                        </div>

                        <div class="text-muted">
                            {{ trans("index.created_and_designed_by") }}
                            <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ trans("index.created_and_designed_by") }} DIW.co.id">
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env("APP_LANGUAGE") }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ env("APP_LANGUAGE") }}">

    <head>

        <title>@yield("title") | CMS | {{ env("APP_TITLE") }}</title>

        @yield("vendors")

        @yield("css")

        @livewireStyles

    </head>

    <body class="@auth sb-nav-fixed @else background-primary @endauth @if (trim($__env->yieldContent("code"))) background-primary text-white @endif">

        @if (!trim($__env->yieldContent("code")))

            @auth

                @yield("header")

                <div id="layoutSidenav">

                    @yield("sidebar")

                    <div id="layoutSidenav_content">

                        <main>

                            <div class="container-fluid px-4">

                                <h1 class="mt-4">
                                    <i class="@yield("icon") fa-fw"></i> @yield("title")
                                </h1>

                                <div class="mb-3 bg-light rounded px-3">
                                    @include("layouts.breadcrumbs")
                                </div>

                                @yield("content")

                            </div>

                        </main>

                        @yield("footer")

                    </div>

                </div>

            @else

                @yield("content")

                @yield("footer-login")

            @endauth

        @else

            @yield("error-content")

        @endif

        @yield("script")

        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
        <x-livewire-alert::scripts />
        <x-livewire-alert::flash />

    </body>

</html>
