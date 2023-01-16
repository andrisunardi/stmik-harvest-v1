@section("title", trans("index.login"))
@section("icon", "fas fa-sign-in-alt")
@section("login-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Login to access your account
            @else
                Masuk untuk mengakses akun Anda
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <div class="card-body">

                @include("layouts.alert")

                <form class="mt-2" role="form">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            @php $input = "email" @endphp
                            <label class="label" for="email">{{ trans("index.email") }}</label>
                            <input type="email" class="form-control" pattern="[^\s*].*[^\s*]" id="email" name="email" value="{{ old("email") }}" placeholder="{{ trans("index.email") }}" autocomplete="off" autocapitalize="none" required>
                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            @php $input = "password" @endphp
                            <label class="label" for="password">Password</label>
                            <input type="password" class="form-control" pattern="[^\s*].*[^\s*]" id="password" name="password" value="{{ old("password") }}" placeholder="{{ trans("index.password") }}" autocomplete="off" autocapitalize="none" required>
                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                        </div>
                    </div>
                    <div class="form-group row mt-2 mb-2">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                @php $input = "remember_me" @endphp
                                <input type="checkbox" class="custom-control-input" id="remember" />
                                <label class="custom-control-label text-muted" for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">{{ trans("index.sign_in") }}</button>
                    </div>
                </form>

                <div class="form-links mt-2">
                    <div><a draggable="false" href="{{ route("register.index") }}">{{ trans("index.register") }}</a></div>
                    <div><a draggable="false" href="{{ route("forgot-password.index") }}" class="text-muted">{{ trans("index.forgot_password") }}</a></div>
                </div>

                <hr>

                <div class="text-muted text-center mb-2">{{ trans("index.or_login_with") }}</div>
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                        <button type="button" class="btn btn-block background-color-facebook">
                            <i class="icon ion-logo-facebook"></i>
                            Facebook
                        </button>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                        <button type="button" class="btn btn-block background-color-twitter">
                            <i class="icon ion-logo-twitter"></i>
                            Twitter
                        </button>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                        <button type="button" class="btn btn-block background-color-google">
                            <i class="icon ion-logo-google"></i>
                            Google
                        </button>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                        <button type="button" class="btn btn-block background-color-instagram">
                            <i class="icon ion-logo-instagram"></i>
                            Instagram
                        </button>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                        <button type="button" class="btn btn-block background-color-linkedin">
                            <i class="icon ion-logo-linkedin"></i>
                            Linkedin
                        </button>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-2">
                        <button type="button" class="btn btn-block background-color-line">
                            <i class="icon fab fa-line"></i>
                            Line
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
