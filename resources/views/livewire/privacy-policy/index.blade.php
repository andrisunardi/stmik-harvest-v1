@section("title", trans("index.privacy_policy"))
@section("icon", "fas fa-file-text-alt")
@section("privacy-policy-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                Please Obey Our Privacy Policy
            @else
                Mohon Patuhi Kebijakan Pribadi Kami
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">@yield("title") {{ env("APP_NAME") }}</h2>
                {!! App::isLocale('en') ? Str::setting('privacy_policy') : Str::setting('privacy_policy_idn') !!}
            </div>
        </div>
    </div>
</div>
