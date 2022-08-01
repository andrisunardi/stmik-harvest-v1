@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    {{-- <body id="login_bg">

        <nav id="menu" class="fake_menu"></nav>

        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>

        <div id="login">
            <aside>
                <figure>
                    <a draggable="false" href="{{ route("index") }}">
                        <img draggable="false" src="{{ asset("images/logo.png") }}" width="150" alt="{{ trans("index.logo") }}">
                    </a>
                </figure> --}}
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form role="form" action="{{ route("{$menu_slug}.index") }}">
                            {{-- <div class="access_social">
                                <a draggable="false" href="#0" class="social_bt facebook">Login with Facebook</a>
                                <a draggable="false" href="#0" class="social_bt google">Login with Google</a>
                                <a draggable="false" href="#0" class="social_bt linkedin">Login with Linkedin</a>
                            </div>
                            <div class="divider"><span>{{ trans("index.OR") }}</span></div> --}}
                            <div class="form-group">
                                <span class="input">
                                    <input class="input_field" type="email" autocomplete="off" name="email">
                                        <label class="input_label">
                                        <span class="input__label-content">Your email</span>
                                    </label>
                                </span>

                                <span class="input">
                                    <input class="input_field" type="password" autocomplete="new-password" name="password">
                                        <label class="input_label">
                                        <span class="input__label-content">Your password</span>
                                    </label>
                                </span>
                                <small><a draggable="false" href="#0">Forgot password?</a></small>
                            </div>
                            <a draggable="false" href="#0" class="btn_1 rounded full-width add_top_60">Login to Udema</a>
                            <div class="text-center add_top_10">
                                New to Udema? <strong><a draggable="false" href="register.html">Sign up!</a></strong>
                            </div>
                        </form>
                        <div class="copy">© 2021 Udema</div>
                    </div>
                </div>
            {{-- </aside>
        </div>
    </body> --}}
</div>
