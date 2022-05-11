@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    {{-- <body id="register_bg">

        <nav id="menu" class="fake_menu"></nav>

        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>

        <div id="login">
            <aside>
                <figure>
                    <a draggable="false" href="{{ route("index") }}">
                        <img draggable="false" src="{{ asset("images/logo.png") }}" width="150" alt="{{ trans("general.Logo") }}">
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
                            <div class="divider"><span>{{ trans("general.OR") }}</span></div> --}}
                            <div class="form-group">

                                <span class="input">
                                    <input class="input_field" type="text">
                                        <label class="input_label">
                                        <span class="input__label-content">Your Name</span>
                                    </label>
                                </span>

                                    <span class="input">
                                    <input class="input_field" type="text">
                                        <label class="input_label">
                                        <span class="input__label-content">Your Last Name</span>
                                    </label>
                                    </span>

                                    <span class="input">
                                    <input class="input_field" type="email">
                                        <label class="input_label">
                                        <span class="input__label-content">Your Email</span>
                                    </label>
                                    </span>

                                    <span class="input">
                                    <input class="input_field" type="password" id="password1">
                                        <label class="input_label">
                                        <span class="input__label-content">Your password</span>
                                    </label>
                                    </span>

                                    <span class="input">
                                    <input class="input_field" type="password" id="password2">
                                        <label class="input_label">
                                        <span class="input__label-content">Confirm password</span>
                                    </label>
                                    </span>

                                    <div id="pass-info" class="clearfix"></div>
                                </div>
                                <a href="#0" class="btn_1 rounded full-width add_top_30">Register to Udema</a>
                                <div class="text-center add_top_10">Already have an acccount? <strong><a href="login.html">Sign In</a></strong></div>
                            </form>
                            <div class="copy">© 2021 Udema</div>
                    </div>
                </div>
            {{-- </aside>
        </div>
    </body> --}}
</div>
