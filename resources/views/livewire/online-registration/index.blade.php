@section("name", trans("page.{$menu_name}"))
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
                                <h2>{{ trans("page.{$menu_name}") }}</h2>
                                <div class="res__right">
                                    <h4>Already have an account?</h4>
                                    <div class="sign__btn">
                                        <a class="htc__sign__btn" href="#">Sign In</a>
                                    </div>
                                </div>
                            </div>

                            <div class="res__title mt-3 mb-3">
                                <h6>{{ trans("general.Please complete registration form below to become our part") }}</h6>
                            </div>

                            @include("layouts.alert")

                            <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$menu_slug}.index") }}" id="contact-form" autocomplete="off">
                                @csrf

                                <div class="login__form__box">

                                    <div class="login__form row">
                                        @php $input = "name" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label text-start text-left" for="{{ $input }}">{{ trans("general.Full Name") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("general.Full Name") }}" aria-label="{{ trans("general.Full Name") }}" aria-describedby="{{ trans("general.Full Name") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "email" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label text-start text-left" for="{{ $input }}">{{ trans("general.Email Address") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("general.Email Address") }}" aria-label="{{ trans("general.Email Address") }}" aria-describedby="{{ trans("general.Email Address") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__form row">
                                        @php $input = "email" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label text-start text-left" for="{{ $input }}">{{ trans("general.Full Name") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("general.Full Name") }}" aria-label="{{ trans("general.Full Name") }}" aria-describedby="{{ trans("general.Full Name") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "school" @endphp
                                        <div class="form-group col-sm-6">
                                            <label class="form-label text-start text-left" for="{{ $input }}">{{ trans("general.Full Name") }} <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                                    placeholder="{{ trans("general.Full Name") }}" aria-label="{{ trans("general.Full Name") }}" aria-describedby="{{ trans("general.Full Name") }}"
                                                    autocomplete="off" autocapitalize="none" required>
                                                @error($input)
                                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__btn">
                                        <button type="button" class="htc__btn btn--theme" wire:click="submit">{{ trans("button.Submit") }}</button>
                                    </div>
                                </div>
                            </form>

                            <div class="login__social__link">
                                <h2>Contact With Social Network</h2>
                                <ul class="htc__social__btn">
                                    <li><a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank">
                                        <i class="icon ion-social-facebook"></i><span>facebook</span>
                                    </a></li>
                                    <li><a href="https://plus.google.com/" target="_blank">
                                        <i class="icon ion-social-googleplus"></i><span>google +</span>
                                    </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
