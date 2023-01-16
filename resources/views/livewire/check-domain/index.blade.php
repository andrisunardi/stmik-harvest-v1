@section("title", trans("index.check_domain"))
@section("icon", "fas fa-globe")
@section("check-domain-active", "active")

<div>
    <div class="h-100">
        <div class="section mt-2">
            <h2 class="text-center h2">@yield("title")</h2>
            <h6 class="text-center h6">
                @if (App::isLocale("en"))
                    Check domain availability to build your website
                @else
                    Periksa ketersediaan domain untuk membangun situs web Anda
                @endif
            </h6>
        </div>

        <div class="section mt-2 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="text-center">
                            <h2 class="text-primary">
                                @if (App::isLocale("en"))
                                    Cheap Domain For Your Website Check your Domain and Buy Your Cheap Domain
                                @else
                                    Domain Murah Untuk Website Anda Cek Domain dan Beli Domain Murah Anda
                                @endif
                            </h2>
                            <p>
                                @if (App::isLocale("en"))
                                    Looking for a domain name? Check domain names and find your dream domain with just one click
                                @else
                                    Sedang mencari nama domain? Cek nama domain dan temukan domain impian Anda hanya dengan satu klik
                                @endif
                            </p>
                        </div>

                        {{-- @include("alert") --}}

                        <form class="mt-2" role="form">
                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="domain">{{ trans("index.domain_address") }}</label>
                                    <input type="text" class="form-control" pattern="[^\s*].*[^\s*]" id="domain" placeholder="{{ trans("index.type_in_the_domain_name") }}" autocomplete="off" autocapitalize="none" autofocus required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ trans("index.check_domain") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
