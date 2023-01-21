@section("title", trans("index.contact_us"))
@section("icon", "fas fa-phone")
@section("contact-us-active", "active")

<div>
    <section class="htc__contact__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact__wrap">
                        <h2 class="title__style--2">{{ trans("index.contact_information") }}</h2>
                        <p>{{ env("APP_DESCRIPTION") }}</p>
                        <div class="htc__contact__inner">

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-whatsapp fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.whatsapp") }}</span>
                                </div>
                                <p><a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("index.hello_i_know_this_number_from_the_website") }} {{ env("APP_DOMAIN") }}" target="_blank">{{ env("CONTACT_WHATSAPP") }}</a></p>
                            </div>

                            {{-- <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-line fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.line") }}</span>
                                </div>
                                <p><a draggable="false" href="https://line.me/ti/p/~{{ env("CONTACT_LINE") }}" target="_blank">{{ env("CONTACT_WHATSAPP") }}</a></p>
                            </div> --}}

                            {{-- <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-blackberry fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.bbm") }}</span>
                                </div>
                                <p><a draggable="false" href="http://www.pin.bbm.com/{{ env("CONTACT_BBM") }}" target="_blank">{{ env("CONTACT_WHATSAPP") }}</a></p>
                            </div> --}}

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-phone-alt fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.phone") }}</span>
                                </div>
                                <p><a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}">{{ env("CONTACT_PHONE") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-sms fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.sms") }}</span>
                                </div>
                                <p><a draggable="false" href="sms:+{{ Str::phone(env("CONTACT_PHONE")) }}">{{ env("CONTACT_PHONE") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-envelope fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.email") }}</span>
                                </div>
                                <p><a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">{{ env("CONTACT_EMAIL") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-map-marked-alt fa-fw me-1"></i>
                                    <span>{{ trans("validation.attributes.address") }}</span>
                                </div>
                                <p><a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank"> <strong>STMIK Kuwera</strong><br>{{ env("CONTACT_ADDRESS") }} </a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 sm-mt-40 xs-mt-40">
                    <div class="htc__contact__form__wrap">
                        <h2 class="contact__title mb-4">{{ trans("index.send_a_message") }}</h2>

                        @include("layouts.alert")

                        <div class="contact-form-wrap">
                            <form wire:submit.prevent="submit" role="form" id="contact-form" autocomplete="off">

                                <div class="row">
                                    <div class="form-group col-sm-6 mb-3">
                                        @php $input = "name" @endphp
                                        <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                            {{ trans("validation.attributes.{$input}") }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                <span class="fas fa-user fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                            </div>
                                            <input
                                                class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                type="text"
                                                minlength="1"
                                                maxlength="50"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                required />
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 mb-3">
                                        @php $input = "company" @endphp
                                        <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                            {{ trans("validation.attributes.{$input}") }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                <span class="fas fa-building fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                            </div>
                                            <input
                                                class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                type="text"
                                                minlength="1"
                                                maxlength="50"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}" />
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-6 mb-3">
                                        @php $input = "email" @endphp
                                        <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                            {{ trans("validation.attributes.{$input}") }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                <span class="fas fa-envelope fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                            </div>
                                            <input
                                                class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                type="email"
                                                minlength="1"
                                                maxlength="50"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                required />
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 mb-3">
                                        @php $input = "phone" @endphp
                                        <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                            {{ trans("validation.attributes.{$input}") }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                <span class="fas fa-phone fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                            </div>
                                            <input
                                                class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                type="text"
                                                minlength="1"
                                                maxlength="15"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                required />
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 mb-3">
                                        @php $input = "subject" @endphp
                                        <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                            {{ trans("validation.attributes.{$input}") }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                <span class="fas fa-heading fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                            </div>
                                            <input
                                                class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                type="text"
                                                minlength="1"
                                                maxlength="100"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                required />
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 mb-3">
                                        @php $input = "message" @endphp
                                        <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                            {{ trans("validation.attributes.{$input}") }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                <span class="fas fa-pencil fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                            </div>
                                            <textarea
                                                class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                minlength="1"
                                                maxlength="1000"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                required>
                                            </textarea>
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="contact-btn">
                                    <button class="btn htc__btn btn--theme" type="submit" wire:loading.attr="disabled">
                                        <i class="fas fa-paper-plane fa-fw"></i>
                                        {{ trans("index.submit") }}
                                        <div wire:loading wire:target="submit"><i class="fas fa-spinner fa-spin"></i></div>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>

                    <div class="contact__wrap pt-5">
                        <div class="htc__contact__inner">

                            <h2 class="contact__title">{{ trans("index.social_media_contact") }}</h2>
                            <p>{{ trans("index.follow_and_subscribe_our_social_media_to_get_our_latest_news") }}</p>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-facebook"></i>
                                    <span>{{ trans("validation.attributes.facebook") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank">{{ env("SOCIAL_MEDIA_FACEBOOK") }}</a>
                                </div>
                            </div>

                            {{-- <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-twitter"></i>
                                    <span>{{ trans("validation.attributes.twitter") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank">{{ env("SOCIAL_MEDIA_TWITTER") }}</a>
                                </div>
                            </div> --}}

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-instagram"></i>
                                    <span>{{ trans("validation.attributes.instagram") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank">{{ env("SOCIAL_MEDIA_INSTAGRAM") }}</a>
                                </div>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-google"></i>
                                    <span>{{ trans("validation.attributes.google") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.g.page/{{ env("SOCIAL_MEDIA_GOOGLE") }}" target="_blank">{{ env("SOCIAL_MEDIA_GOOGLE") }}</a>
                                </div>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-youtube"></i>
                                    <span>{{ trans("validation.attributes.youtube") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank">STMIK Kuwera</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-contacts">
        <div id="googleMap">
            <iframe src="{{ env("CONTACT_GOOGLE_MAPS_IFRAME") }}"></iframe>
        </div>
    </div>
</div>
