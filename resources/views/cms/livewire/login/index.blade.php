@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@push("meta")
@endpush

@push("css")
@endpush

@push("script")
@endpush

<div>
    <div class="login-back-button">
        <a draggable="false" href="{{ route("index") }}">
            <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
    </div>

    <div class="login-wrapper d-flex align-items-center justify-content-center">
        <div class="custom-container">
            <div class="text-center px-4">
                <img draggable="false" class="login-intro-img"
                    src="{{ asset("assets/{$sub_domain}/img/bg-img/36.png") }}"
                    alt="{{ trans("general.{$menu_name}") }} - {{ env("APP_TITLE") }}">
            </div>
            <div class="register-form mt-4">
                <h3 class="text-center">{{ trans("general.Welcome to") }} {{ trans("general.CMS") }}<br>{{ env("APP_NAME") }}</h3>
                <h6 class="mb-4 text-center">{{ trans("general.Sign in to your account to continue") }}</h6>

                @include("{$sub_domain}.layouts.alert")

                <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$sub_domain}.{$menu_slug}.index") }}">
                    @csrf

                    @php $input = "username" @endphp
                    <div class="form-group">
                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
                            <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                autocomplete="off" autocapitalize="none" autofocus required>
                            @error($input)
                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                            @else
                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                            @enderror
                        </div>
                    </div>

                    @php $input = "password" @endphp
                    <div class="form-group">
                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><span class="bi bi-lock-fill"></span></span>
                            <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="psw-input" name="{{ $input }}"
                                type="password" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                autocomplete="off" autocapitalize="none" required>
                            <div class="position-absolute" id="password-visibility" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Click to Hide / Unhide" wire:ignore>
                                <i class="bi bi-eye"></i>
                                <i class="bi bi-eye-slash"></i>
                            </div>
                            @error($input)
                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                            @else
                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                            @enderror
                        </div>
                    </div>

                    @php $input = "remember" @endphp
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input wire:model="{{ $input }}" type="checkbox" class="form-check-input form-check-primary" id="{{ $input }}" name="{{ $input }}" value="1" {{ old($input) ? "checked" : null }}>
                            <label class="form-check-label" for="{{ $input }}">{{ trans("general.Remember Me") }}</label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100" type="button" wire:click="submit">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        {{ trans("button.Sign In") }}
                    </button>
                </form>
            </div>

            <div class="login-meta-data text-center">
                <a draggable="false" class="stretched-link forgot-password d-block mt-3 mb-1" href="{{ route("{$sub_domain}.forgot-password.index") }}">
                    {{ trans("button.Forgot Password") }} ?
                </a>
            </div>

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
                    &copy; {{ trans("footer.Copyright") }} @if(env("APP_YEAR") && env("APP_YEAR") != date("Y")) {{ env("APP_YEAR") . " - " }} @endif {{ date("Y") }} &reg;&nbsp;
                    <br>
                    <a draggable="false" href="{{ URL::to("/") }}" target="_blank"><strong>{{ env("APP_NAME") }}</strong></a> &trade;
                    {{ trans("footer.All Rights Reserved") }}.
                </p>
                <p class="mt-2">
                    {{ trans("footer.Created and Designed by") }}
                    <a draggable="false" href="https://www.diw.co.id" target="_blank">
                        <img draggable="false" src="{{ asset("images/icon-diw.co.id.png") }}" alt="Icon DIW.co.id" title="{{ trans("footer.Created and Designed by") }} DIW.co.id">
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
