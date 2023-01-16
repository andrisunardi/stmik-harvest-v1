@section("title", trans("index.contact"))
@section("icon", "fas fa-phone")
@section("contact-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                If You Got Any Questions Please Do Not Hesitate To Send Us A Message
            @else
                Jika Anda Memiliki Pertanyaan, Jangan Ragu Untuk Mengirim Pesan Kepada Kami
            @endif
        </h6>
    </div>

    <div class="section mt-2">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-whatsapp fa-4x color-whatsapp"></i>
                    </div>
                    <div class="price color-whatsapp">{{ trans("index.whatsapp") }}</div>
                    <p class="color-whatsapp">{{ env("CONTACT_WHATSAPP") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-whatsapp" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ App::isLocale('en') == "en" ? "Hello, I know this number from the website www.diw.co.id for website development" : "Halo, saya mengetahui nomor ini dari website www.diw.co.id untuk pembuatan website" }}" target="_blank">{{ trans("index.send_message") }}
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-line fa-4x color-line"></i>
                    </div>
                    <div class="price color-line">{{ trans("index.line") }}</div>
                    <p class="color-line">{{ "@" . env("CONTACT_LINE") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-line" href="https://line.me/ti/p/~{{ env("CONTACT_LINE") }}" target="_blank">{{ trans("index.add_our_line") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-telegram fa-4x color-telegram"></i>
                    </div>
                    <div class="price color-telegram">{{ trans("index.telegram") }}</div>
                    <p class="color-telegram">{{ "@" . env("CONTACT_LINE") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-telegram" href="https://t.me/{{ env("CONTACT_TELEGRAM") }}" target="_blank">{{ trans("index.write_a_message") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-viber fa-4x color-viber"></i>
                    </div>
                    <div class="price color-viber">{{ trans("index.viber") }}</div>
                    <p class="color-viber">{{ env("CONTACT_VIBER") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-viber" href="viber://contact?number=62{!! substr(str_replace(array("-", " ", "+", "(", ")"), "", env("CONTACT_WHATSAPP")), 2) !!}" target="_blank">{{ trans("index.chat_and_call") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-skype fa-4x color-skype"></i>
                    </div>
                    <div class="price color-skype">{{ trans("index.skype") }}</div>
                    <p class="color-skype">{{ "@" . env("CONTACT_SKYPE") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-skype" href="skype:{{ env("CONTACT_SKYPE") }}?chat" target="_blank">{{ trans("index.chat_with_us") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-facebook-messenger fa-4x color-facebook-messenger"></i>
                    </div>
                    <div class="price color-facebook-messenger">{{ trans("index.fb_messenger") }}</div>
                    <p class="color-facebook-messenger">{{ "@" . env("CONTACT_LINE") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-facebook-messenger" href="https://m.me/{{ env("CONTACT_MESSENGER") }}" target="_blank">{{ trans("index.chat_with_us") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fas fa-envelope fa-4x text-primary"></i>
                    </div>
                    <div class="price text-primary">{{ trans("index.email") }}</div>
                    <p class="text-primary">{{ env("CONTACT_EMAIL") }}</p>
                    <a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}?subject={{ App::isLocale('en') == "en" ? "Ask About Website Development Services" : "Tanya Tentang Jasa Pembuatan Website" }}&body={{ App::isLocale('en') == "en" ? "Hello, I know this number from the website www.diw.co.id for website development" : "Halo, saya mengetahui nomor ini dari website www.diw.co.id untuk pembuatan website" }}" class="btn btn-primary btn-block btn-sm">{{ trans("index.send_email_at") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fas fa-phone fa-4x text-info"></i>
                    </div>
                    <div class="price text-info">{{ trans("index.call") }}</div>
                    <p class="text-info">{{ env("CONTACT_PHONE") }}</p>
                    <a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}" class="btn btn-info btn-block btn-sm">{{ trans("index.call_for_project") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fas fa-sms fa-4x text-warning"></i>
                    </div>
                    <div class="price text-warning">{{ trans("index.sms") }}</div>
                    <p class="text-warning">{{ env("CONTACT_PHONE") }}</p>
                    <a draggable="false" href="sms:+{{ Str::phone(env("CONTACT_PHONE")) }}?&body={{ App::isLocale('en') == "en" ? "Hello, I know this number from the website www.diw.co.id for website development" : "Halo, saya mengetahui nomor ini dari website www.diw.co.id untuk pembuatan website" }}" class="btn btn-warning btn-block btn-sm">{{ trans("index.send_message") }}</a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fas fa-clock fa-4x text-danger"></i>
                    </div>
                    <div class="price text-danger">{{ trans("index.business_hours") }}</div>
                    <p class="text-danger">
                        {{ trans("index.monday") }} - {{ trans("index.friday") }}<br>
                        {{ trans("index.09_00") }} {{ trans("index.am") }}<br>
                        {{ trans("index.06_00") }} {{ trans("index.pm") }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <h2 class="text-center">{{ trans("index.our_social_media") }}</h2>
    </div>

    <div class="section mt-2">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-facebook fa-4x color-facebook" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_facebook_page") }} {{ "@".env("SOCIAL_MEDIA_FACEBOOK") }}"></i>
                    </div>
                    <div class="price color-facebook" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_facebook_page") }} {{ "@".env("SOCIAL_MEDIA_FACEBOOK") }}">Facebook</div>
                    <p class="color-facebook" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_facebook_page") }} {{ "@".env("SOCIAL_MEDIA_FACEBOOK") }}">{{ "@" . env("SOCIAL_MEDIA_FACEBOOK") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-facebook" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_facebook_page") }} {{ "@".env("SOCIAL_MEDIA_FACEBOOK") }}">{{ trans("index.follow") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-twitter fa-4x color-twitter" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_twitter") }} {{ "@".env("SOCIAL_MEDIA_TWITTER") }}"></i>
                    </div>
                    <div class="price color-twitter" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_twitter") }} {{ "@".env("SOCIAL_MEDIA_TWITTER") }}">Twitter</div>
                    <p class="color-twitter" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_twitter") }} {{ "@".env("SOCIAL_MEDIA_TWITTER") }}">{{ "@" . env("SOCIAL_MEDIA_TWITTER") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-twitter" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_twitter") }} {{ "@".env("SOCIAL_MEDIA_TWITTER") }}">{{ trans("index.follow") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-google fa-4x color-google" data-toggle="tooltip" data-placement="top" title="{{ trans("index.our_google_page") }} {{ "@".env("SOCIAL_MEDIA_GOOGLE") }}"></i>
                    </div>
                    <div class="price color-google" data-toggle="tooltip" data-placement="top" title="{{ trans("index.our_google_page") }} {{ "@".env("SOCIAL_MEDIA_GOOGLE") }}">Google</div>
                    <p class="color-google" data-toggle="tooltip" data-placement="top" title="{{ trans("index.our_google_page") }} {{ "@".env("SOCIAL_MEDIA_GOOGLE") }}">{{ "@" . env("SOCIAL_MEDIA_GOOGLE") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-google" href="https://www.g.page/{{ env("SOCIAL_MEDIA_GOOGLE") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.our_google_page") }} {{ "@".env("SOCIAL_MEDIA_GOOGLE") }}">{{ trans("index.google-page") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-instagram fa-4x color-instagram" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_instagram") }} {{ "@".env("SOCIAL_MEDIA_INSTAGRAM") }}"></i>
                    </div>
                    <div class="price color-instagram" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_instagram") }} {{ "@".env("SOCIAL_MEDIA_INSTAGRAM") }}">Instagram</div>
                    <p class="color-instagram" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_instagram") }} {{ "@".env("SOCIAL_MEDIA_INSTAGRAM") }}">{{ "@" . env("SOCIAL_MEDIA_INSTAGRAM") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-instagram" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_instagram") }} {{ "@".env("SOCIAL_MEDIA_INSTAGRAM") }}">{{ trans("index.follow") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-youtube fa-4x color-youtube" data-toggle="tooltip" data-placement="top" title="{{ trans("index.subscribe_our_youtube_channel") }} {{ env("APP_NAME") }}"></i>
                    </div>
                    <div class="price color-youtube" data-toggle="tooltip" data-placement="top" title="{{ trans("index.subscribe_our_youtube_channel") }} {{ env("APP_NAME") }}">Youtube</div>
                    <p class="color-youtube" data-toggle="tooltip" data-placement="top" title="{{ trans("index.subscribe_our_youtube_channel") }} {{ env("APP_NAME") }}">{{ env("APP_NAME") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-youtube" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.subscribe_our_youtube_channel") }} {{ env("APP_NAME") }}">{{ trans("index.subscribe") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-linkedin fa-4x color-linkedin" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_linkedin_company") }} {{ env("APP_NAME") }}"></i>
                    </div>
                    <div class="price color-linkedin" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_linkedin_company") }} {{ env("APP_NAME") }}">Linkedin</div>
                    <p class="color-linkedin" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_linkedin_company") }} {{ env("APP_NAME") }}">{{ env("APP_NAME") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-linkedin" href="https://www.linkedin.com/{{ env("SOCIAL_MEDIA_LINKEDIN") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_linkedin_company") }} {{ env("APP_NAME") }}">{{ trans("index.follow") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-tumblr fa-4x color-tumblr" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_tumblr") }} {{ "@".env("SOCIAL_MEDIA_TUMBLR") }}"></i>
                    </div>
                    <div class="price color-tumblr" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_tumblr") }} {{ "@".env("SOCIAL_MEDIA_TUMBLR") }}">Tumblr</div>
                    <p class="color-tumblr" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_tumblr") }} {{ "@".env("SOCIAL_MEDIA_TUMBLR") }}">{{ "@" . env("SOCIAL_MEDIA_TUMBLR") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-tumblr" href="https://{{ env("SOCIAL_MEDIA_TUMBLR") }}.tumblr.com" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_tumblr") }} {{ "@".env("SOCIAL_MEDIA_TUMBLR") }}">{{ trans("index.follow") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-pinterest fa-4x color-pinterest" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_pinterest") }} {{ "@".env("SOCIAL_MEDIA_PINTEREST") }}"></i>
                    </div>
                    <div class="price color-pinterest" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_pinterest") }} {{ "@".env("SOCIAL_MEDIA_PINTEREST") }}">Pinterest</div>
                    <p class="color-pinterest" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_pinterest") }} {{ "@".env("SOCIAL_MEDIA_PINTEREST") }}">{{ "@" . env("SOCIAL_MEDIA_PINTEREST") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-pinterest" href="https://www.pinterest.com/{{ env("SOCIAL_MEDIA_PINTEREST") }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.follow_our_pinterest") }} {{ "@".env("SOCIAL_MEDIA_PINTEREST") }}">{{ trans("index.follow") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-android fa-4x color-android" data-toggle="tooltip" data-placement="top" title="{{ trans("index.get_in_on_google_play") }}"></i>
                    </div>
                    <div class="price color-android" data-toggle="tooltip" data-placement="top" title="{{ trans("index.get_in_on_google_play") }}">Android</div>
                    <p class="color-android" data-toggle="tooltip" data-placement="top" title="{{ trans("index.get_in_on_google_play") }}">{{ "@" . env("APP_DOMAIN") }}</p>
                    <a draggable="false" class="btn btn-block btn-sm background-color-android" href="https://play.google.com/store/apps/details?id=com.diw.crm" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.get_in_on_google_play") }}">{{ trans("index.download") }}</a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="bill-box h-100">
                    <div class="img-wrapper">
                        <i class="fab fa-apple fa-4x color-apple" data-toggle="tooltip" data-placement="top" title="{{ trans("index.available_on_the_app_store") }}"></i>
                    </div>
                    <div class="price color-apple" data-toggle="tooltip" data-placement="top" title="{{ trans("index.available_on_the_app_store") }}">Ios</div>
                    <p class="color-apple" data-toggle="tooltip" data-placement="top" title="{{ trans("index.available_on_the_app_store") }}">{{ "@" . env("APP_DOMAIN") }}</p>
                    <a draggable="false" class="btn btn-dark btn-block btn-sm background-color-apple" href="https://www.apple.com/app-store/" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("index.available_on_the_app_store") }}">{{ trans("index.download") }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section mb-2" id="message">
        <div class="card">
            <div class="card-body">
                <div class="p-1">
                    <div class="text-center">
                        <h2 class="text-primary">{{ trans("index.leave_a_message") }}</h2>
                        <p>{{ trans("index.feel_free_to_contact_us_we_will_reply_your_message_1_24_hours") }}</p>
                    </div>

                    <form wire:submit.prevent="submit" role="form">
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label @if (old()){{ $errors->has("name") ? "text-danger" : "text-success" }}@endif" for="name">{{ trans("index.your-full-name") }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @if (old()){{ $errors->has("name") ? "border-bottom border-danger" : "border-bottom border-success" }}@endif" pattern="[^\s*].*[^\s*]" maxlength="50" id="name" name="name" value="{{ old("name") }}" placeholder="{{ trans("index.your-full-name") }} *" autocomplete="off" autocapitalize="none" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            {{--  <div class="invalid-feedback">{{ trans("index.search") }} {{ trans("index.required") }}</div>
                            <div class="valid-feedback">{{ trans("index.looks-good") }}</div>
                            @error("search")<div class="invalid-feedback">{{ $message }}</div>@enderror  --}}
                            <div class="input-info @if (old()){{ $errors->has("name") ? "text-danger" : "text-success" }}@endif">{{ trans("index.please-input-your-full-name") }}</div>
                            @error("name")<div class="input-info text-danger">{{ $message }}</div>@enderror
                        </div>



                        <div class="row">
                            @php $input = "name" @endphp
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="{{ $input }}">
                                    {{ trans("validation.attributes.{$input}") }}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="bi bi-fonts"></span></div>
                                    <input
                                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                        wire:model="{{ $input }}"
                                        id="{{ $input }}"
                                        type="text"
                                        minlength="1"
                                        maxlength="50"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off"
                                        autocapitalize="none"
                                        required
                                    >
                                    @error($input)
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>





                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label @if (old()){{ $errors->has("company") ? "text-danger" : "text-success" }}@endif" for="company">{{ trans("index.your-company") }}</label>
                                <input type="text" class="form-control @if (old()){{ $errors->has("company") ? "border-bottom border-danger" : "border-bottom border-successborder-bottom border-success" }}@endif" pattern="[^\s*].*[^\s*]" maxlength="50" id="company" name="company" value="{{ old("company") }}" placeholder="{{ trans("index.your-company") }}" autocomplete="off" autocapitalize="none">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-info @if (old()){{ $errors->has("company") ? "text-danger" : "text-success" }}@endif">{{ trans("index.please-input-your-company") }}</div>
                            @error("company")<div class="input-info text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label @if (old()){{ $errors->has("email") ? "text-danger" : "text-success" }}@endif" for="email">{{ trans("index.your-email-address") }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @if (old()){{ $errors->has("email") ? "border-bottom border-danger" : "border-bottom border-success" }}@endif" pattern="[^\s*].*[^\s*]" maxlength="50" id="email" name="email" value="{{ old("email") }}" placeholder="{{ trans("index.your-email-address") }} *" autocomplete="off" autocapitalize="none" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-info @if (old()){{ $errors->has("email") ? "text-danger" : "text-success" }}@endif">{{ trans("index.please-input-your-email-address") }}</div>
                            @error("email")<div class="input-info text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label @if (old()){{ $errors->has("phone") ? "text-danger" : "text-success" }}@endif" for="phone">{{ trans("index.your-phone-number") }}</label>
                                <input type="text" class="form-control @if (old()){{ $errors->has("phone") ? "border-bottom border-danger" : "border-bottom border-success" }}@endif" pattern="[^\s*].*[^\s*]" maxlength="15" id="phone" name="phone" value="{{ old("phone") }}" placeholder="{{ trans("index.your-phone-number") }}" autocomplete="off" autocapitalize="none">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-info @if (old()){{ $errors->has("phone") ? "text-danger" : "text-success" }}@endif">{{ trans("index.please-input-your-phone-number") }}</div>
                            @error("phone")<div class="input-info text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label @if (old()){{ $errors->has("subject") ? "text-danger" : "text-success" }}@endif" for="subject">{{ trans("index.subject") }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @if (old()){{ $errors->has("subject") ? "border-bottom border-danger" : "border-bottom border-success" }}@endif" pattern="[^\s*].*[^\s*]" maxlength="100" id="subject" name="subject" value="{{ old("subject") }}" placeholder="{{ trans("index.subject") }} *" autocomplete="off" autocapitalize="none" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-info @if (old()){{ $errors->has("subject") ? "text-danger" : "text-success" }}@endif">{{ trans("index.please-input-your-subject") }}</div>
                            @error("subject")<div class="input-info text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label @if (old()){{ $errors->has("message") ? "text-danger" : "text-success" }}@endif" for="message">{{ trans("index.message") }} <span class="text-danger">*</span></label>
                                <textarea class="form-control @if (old()){{ $errors->has("message") ? "border-bottom border-danger" : "border-bottom border-success" }}@endif" pattern="[^\s*].*[^\s*]" maxlength="1000" id="message" name="message" placeholder="{{ trans("index.message") }} *" autocomplete="off" autocapitalize="none" required>{{ old("message") }}</textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-info @if (old()){{ $errors->has("message") ? "text-danger" : "text-success" }}@endif">{{ trans("index.please-input-your-message") }}</div>
                            @error("message")<div class="input-info text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ trans("index.send") }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
