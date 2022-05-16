@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__login__container text-center ptb--80 bg__white">
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
                                    @php $input = "name" @endphp
                                    <div class="login__form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="{{ trans("validation.attributes.{$input}") }}" wire:model="{{ $input }}">
                                            @error($input)
                                                <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="login__form">
                                        <input type="email" placeholder="Email Address">
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
