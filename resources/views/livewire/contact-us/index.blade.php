@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__contact__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact__wrap">
                        <h2 class="title__style--2">{{ trans("index.Contact Information") }}</h2>
                        <p>{{ env("APP_DESCRIPTION") }}</p>
                        <div class="htc__contact__inner">

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-whatsapp fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.whatsapp") }}</span>
                                </div>
                                <p><a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("index.Hello, I know this number from the website") }} {{ env("APP_DOMAIN") }}" target="_blank">{{ env("CONTACT_WHATSAPP") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-line fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.line") }}</span>
                                </div>
                                <p><a draggable="false" href="https://line.me/ti/p/~{{ env("CONTACT_LINE") }}" target="_blank">{{ env("CONTACT_WHATSAPP") }}</a></p>
                            </div>

                            {{-- <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-blackberry fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.bbm") }}</span>
                                </div>
                                <p><a draggable="false" href="http://www.pin.bbm.com/{{ env("CONTACT_BBM") }}" target="_blank">{{ env("CONTACT_WHATSAPP") }}</a></p>
                            </div> --}}

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-phone-alt fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.phone") }}</span>
                                </div>
                                <p><a draggable="false" href="tel:+{{ Str::phone(env("CONTACT_PHONE")) }}">{{ env("CONTACT_PHONE") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-sms fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.sms") }}</span>
                                </div>
                                <p><a draggable="false" href="sms:+{{ Str::phone(env("CONTACT_PHONE")) }}">{{ env("CONTACT_PHONE") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-envelope fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.email") }}</span>
                                </div>
                                <p><a draggable="false" href="mailto:{{ env("CONTACT_EMAIL") }}">{{ env("CONTACT_EMAIL") }}</a></p>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fas fa-map-marked-alt fa-fw me-2"></i>
                                    <span>{{ trans("validation.attributes.address") }}</span>
                                </div>
                                <p><a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank"> <strong>STMIK Harvest</strong><br>{{ env("CONTACT_ADDRESS") }} </a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 sm-mt-40 xs-mt-40">
                    <div class="htc__contact__form__wrap">
                        <h2 class="contact__title mb-4">{{ trans("index.Send A Message") }}</h2>

                        @include("layouts.alert")

                        <div class="contact-form-wrap">
                            <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$menu_slug}.index") }}" id="contact-form" autocomplete="off">
                                @csrf

                                <div class="row">
                                    @php $input = "name" @endphp
                                    <div class="form-group col-sm-6">
                                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                                            <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                autocomplete="off" autocapitalize="none" required>
                                            @error($input)
                                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    @php $input = "phone" @endphp
                                    <div class="form-group col-sm-6 mt-3 mt-sm-auto">
                                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                                        <div class="input-group has-validation">
                                            <div class="input-group-text"><span class="fas fa-phone-alt"></span></div>
                                            <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="20" value="{{ old($input) }}"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                autocomplete="off" autocapitalize="none">
                                            @error($input)
                                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    @php $input = "email" @endphp
                                    <div class="form-group col-sm-6">
                                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                            <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                autocomplete="off" autocapitalize="none" required>
                                            @error($input)
                                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    @php $input = "company" @endphp
                                    <div class="form-group col-sm-6 mt-3 mt-sm-auto">
                                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                                        <div class="input-group has-validation">
                                            <div class="input-group-text"><span class="fas fa-building"></span></div>
                                            <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                autocomplete="off" autocapitalize="none">
                                            @error($input)
                                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    @php $input = "message" @endphp
                                    <div class="form-group col-12">
                                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <div class="input-group-text"><span class="fas fa-pencil"></span></div>
                                            <textarea wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="1000"
                                                placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                                autocomplete="off" autocapitalize="none" required>{{ old($input) }}</textarea>
                                            @error($input)
                                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="contact-btn">
                                    <button class="htc__btn btn--theme" type="button" wire:click="submit">{{ trans("index.Submit") }}</button>
                                </div>
                            </form>
                        </div>

                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>


                    <div class="contact__wrap pt-5">
                        <div class="htc__contact__inner">

                            <h2 class="contact__title">{{ trans("index.Social Media Contact") }}</h2>
                            <p>{{ trans("index.Follow and Subscribe Our Social Media to get our latest news") }}</p>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-facebook"></i>
                                    <span>{{ trans("validation.attributes.facebook") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank">{{ env("SOCIAL_MEDIA_FACEBOOK") }}</a>
                                </div>
                            </div>

                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="fab fa-twitter"></i>
                                    <span>{{ trans("validation.attributes.twitter") }} :</span>
                                    <a draggable="false" class="text-dark" href="https://www.twitter.com/{{ env("SOCIAL_MEDIA_TWITTER") }}" target="_blank">{{ env("SOCIAL_MEDIA_TWITTER") }}</a>
                                </div>
                            </div>

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
                                    <a draggable="false" class="text-dark" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank">STMIK Harvest</a>
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
