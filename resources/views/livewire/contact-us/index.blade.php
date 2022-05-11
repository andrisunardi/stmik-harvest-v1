@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="contact_info">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <i class="pe-7s-map-marker"></i>
                    <h4>{{ trans("general.Address") }}</h4>
                    <span><a draggable="false" href="{{ env("CONTACT_GOOGLE_MAPS") }}" target="_blank" class="text-white">{{ env("CONTACT_ADDRESS") }}</a></span>
                </li>
                <li>
                    <i class="pe-7s-mail-open-file"></i>
                    <h4>{{ trans("general.Email") }}</h4>
                    <span>
                        <a draggable="false" href="mailto:{{ Str::phone(env("CONTACT_EMAIL")) }}" class="text-white">{{ env("CONTACT_EMAIL") }}</a><br>
                        {{-- <small>{{ trans("datetime.Monday") }} {{ trans("general.to") }} {{ trans("datetime.Friday") }} {{ trans("datetime.08:00") }} - {{ trans("datetime.17:00") }}</small> --}}
                    </span>
                </li>
                <li>
                    <i class="pe-7s-call"></i>
                    <h4>{{ trans("general.Whatsapp") }}</h4>
                    <span>
                        <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone(env("CONTACT_WHATSAPP")) }}&text={{ trans("general.Hello, I know this number from the website") }} {{ env("APP_DOMAIN") }}" target="_blank" class="text-white">{{ env("CONTACT_WHATSAPP") }}</a><br>
                        {{-- <small>{{ trans("datetime.Monday") }} {{ trans("general.to") }} {{ trans("datetime.Friday") }} {{ trans("datetime.08:00") }} - {{ trans("datetime.17:00") }}</small> --}}
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="contact_info">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <i class="ti-facebook"></i>
                    <h4 class="mt-2">{{ trans("general.Facebook") }}</h4>
                    <span>
                        <a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank" class="text-white">{{ env("SOCIAL_MEDIA_FACEBOOK") }}</a><br>
                        <small>Harvest International Theological Seminary</small>
                    </span>
                </li>
                <li>
                    <i class="ti-instagram"></i>
                    <h4 class="mt-2">{{ trans("general.Instagram") }}</h4>
                    <span>
                        <a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank" class="text-white">{{ env("SOCIAL_MEDIA_INSTAGRAM") }}</a><br>
                        <small>STT International Harvest</small>
                    </span>
                </li>
                <li>
                    <i class="ti-youtube"></i>
                    <h4>{{ trans("general.Youtube") }}</h4>
                    <span>
                        <a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank" class="text-white">
                        Youtube Channel</a><br>
                        <small>STT Internasional Harvest - HITS Jakarta</small>
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="map_contact">
                        <iframe id="iframemap" src="{{ env("CONTACT_GOOGLE_MAPS_IFRAME") }}" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>{{ trans("general.Send Us A Message") }}</h4>
                    <p>{{ trans("general.Feel Free To Send Us A Message") }}</p>
                    <div id="message-contact"></div>
                    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$menu_slug}.index") }}" id="contactform" autocomplete="off">
                        @csrf
                        <div class="row">
                            @php $input = "name" @endphp
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <div class="input-group-text"><span class="icon-user"></span></div>
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old(Str::slug($input, "_")) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error(Str::slug($input, "_"))
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror
                                </div>
                            </div>

                            @php $input = "phone" @endphp
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                                <div class="input-group has-validation">
                                    <div class="input-group-text"><span class="icon-call"></span></div>
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="15" value="{{ old(Str::slug($input, "_")) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none">
                                    @error(Str::slug($input, "_"))
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @php $input = "email" @endphp
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <div class="input-group-text"><span class="icon-email"></span></div>
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old(Str::slug($input, "_")) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>
                                    @error(Str::slug($input, "_"))
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror
                                </div>
                            </div>

                            @php $input = "company" @endphp
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                                <div class="input-group has-validation">
                                    <div class="input-group-text"><span class="icon-building"></span></div>
                                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old(Str::slug($input, "_")) }}"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none">
                                    @error(Str::slug($input, "_"))
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @php $input = "message" @endphp
                            <div class="form-group col-12">
                                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <div class="input-group-text"><span class="icon-pencil"></span></div>
                                    <textarea wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                        class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="1000"
                                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                        autocomplete="off" autocapitalize="none" required>{{ old(Str::slug($input, "_")) }}</textarea>
                                    @error(Str::slug($input, "_"))
                                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                    @else
                                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            {{-- <input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"> --}}
                            <button class="btn_1 rounded" type="button" wire:click="submit">
                                <i class="icon-paper-plane me-1"></i>
                                {{ trans("button.Send Request") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
