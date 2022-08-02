@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__login__container-delete text-center-delete ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login__area__wrap">
                        <div class="login__inner">
                            <div class="res__title">
                                <h2>{{ trans("index." . Str::slug($menu_name, "_")) }}</h2>
                                <div class="res__right">
                                    <h4>{{ trans("index.Please see our procedure first") }}</h4>
                                    <div class="sign__btn">
                                        <a draggable="false" class="htc__sign__btn" href="{{ route("procedure.index") }}">{{ trans("index.Procedure") }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="res__title mt-3 mb-3">
                                <h6>{{ trans("index.Please complete registration form below to become our part") }}</h6>
                            </div>

                            @include("layouts.alert")

                            <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$menu_slug}.index") }}" id="contact-form" autocomplete="off">
                                @csrf

                                <div class="login__form__box">

                                    <div class="login__form row">
                                        @php $input = "name" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Full Name") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("index.Full Name") }}" aria-label="{{ trans("index.Full Name") }}" aria-describedby="{{ trans("index.Full Name") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "email" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Email Address") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("index.Email Address") }}" aria-label="{{ trans("index.Email Address") }}" aria-describedby="{{ trans("index.Email Address") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__form row">
                                        @php $input = "phone" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Phone Number") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="20" value="{{ old($input) }}"
                                                    placeholder="{{ trans("index.Phone Number") }}" aria-label="{{ trans("index.Phone Number") }}" aria-describedby="{{ trans("index.Phone Number") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "school" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Origin High School / Vocational School") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("index.Origin High School / Vocational School") }}" aria-label="{{ trans("index.Origin High School / Vocational School") }}" aria-describedby="{{ trans("index.Origin High School / Vocational School") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__form row">
                                        @php $input = "major" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Major In SMA / SMK") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="20" value="{{ old($input) }}"
                                                    placeholder="{{ trans("index.Major In SMA / SMK") }}" aria-label="{{ trans("index.Major In SMA / SMK") }}" aria-describedby="{{ trans("index.Major In SMA / SMK") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "city" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Home Town") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("index.Home Town") }}" aria-label="{{ trans("index.Home Town") }}" aria-describedby="{{ trans("index.Home Town") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        @php $input = "gender" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                                            <div class="input-group-delete has-validation">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{ $input }}" id="{{ $input }}-1" value="1" wire:model="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-1">{{ trans("index.Man") }}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{ $input }}" id="{{ $input }}-2" value="2" wire:model="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-2">{{ trans("index.Woman") }}</label>
                                                </div>
                                                @error($input)
                                                    <div class="invalid-feedback-delete rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    @if($this->gender)
                                                        <div class="valid-feedback-delete rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                    @endif
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "type" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="{{ $input }}">{{ trans("index.Which Do You Prefer") }} <span class="text-danger">*</span></label>
                                            <div class="input-group-delete has-validation">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{ $input }}" id="{{ $input }}-1" value="1" wire:model="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-1">{{ trans("index.Morning - Afternoon Lecturer") }}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{ $input }}" id="{{ $input }}-2" value="2" wire:model="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-2">{{ trans("index.Study & Work (Evening Lecture)") }}</label>
                                                </div>
                                                @error($input)
                                                    <div class="invalid-feedback-delete rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    @if($this->type)
                                                        <div class="valid-feedback-delete rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                                                    @endif
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__btn">
                                        <button type="button" class="htc__btn btn--theme" wire:click="submit">{{ trans("index.Submit") }}</button>
                                    </div>
                                </div>
                            </form>

                            <div class="login__social__link">
                                <h2>{{ trans("index.Our Tuition Fees and Our Scholarships") }}</h2>
                                <ul class="htc__social__btn">
                                    <li>
                                        <a draggable="false" href="{{ route("tuition-fees.index") }}">
                                            <i class="fas fa-money-check-dollar"></i><span>{{ trans("index.Tuition Fees") }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ route("scholarships.index") }}">
                                            <i class="fas fa-hand-holding-dollar"></i><span>{{ trans("index.Scholarships") }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
