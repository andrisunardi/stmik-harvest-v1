@section("title", trans("index.forgot_password"))
@section("icon", "fas fa-question")
@section("forgot-password-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                No need to worry if you forget your password. We will reset your old password
            @else
                Tidak perlu khawatir jika lupa anda lupa password. Kami akan mereset password lama anda
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <div class="card-body">

                @include("vendors.alert")

                <form class="mt-2" role="form">
                    @csrf

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            @php $input = "email" @endphp
                            <label class="label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                            <input type="email" class="form-control" pattern="[^\s*].*[^\s*]" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}" autocomplete="off" autocapitalize="none" required>
                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            @php $input = "phone" @endphp
                            <label class="label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                            <input type="text" class="form-control" pattern="[^\s*].*[^\s*]" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}" autocomplete="off" autocapitalize="none" required>
                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                        </div>
                    </div>
                    <div class="form-group row mt-2 mb-2">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                @php $input = "confirm_reset" @endphp
                                <input type="checkbox" class="custom-control-input" id="{{ $input }}" required />
                                <label class="custom-control-label text-muted" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">{{ trans("index.send_request") }}</button>
                    </div>
                </form>

                <div class="form-links mt-2">
                    <div><a draggable="false" href="{{ route("login.index") }}">{{ trans("index.login") }}</a></div>
                    <div><a draggable="false" href="{{ route("register.index") }}" class="text-muted">{{ trans("index.register") }}</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
