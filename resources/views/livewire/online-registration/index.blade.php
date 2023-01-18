@section("title", trans("index.online_registration"))
@section("icon", "fas fa-pencil")
@section("online-registration-active", "active")

<div>
    <section class="htc__login__container-delete text-center-delete ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login__area__wrap">
                        <div class="login__inner">
                            <div class="res__title">
                                <h2>@yield("title")</h2>
                                <div class="res__right">
                                    <h4>{{ trans("index.please_see_our_procedure_first") }}</h4>
                                    <div class="sign__btn">
                                        <a draggable="false" class="htc__sign__btn" href="{{ route("procedure.index") }}">{{ trans("index.procedure") }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="res__title mt-3 mb-3">
                                <h6>{{ trans("index.please_complete_registration_form_below_to_become_our_part") }}</h6>
                            </div>

                            @include("layouts.alert")

                            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                                <div class="login__form__box">

                                    <div class="login__form row">
                                        <div class="form-group col-sm-6">
                                            @php $input = "name" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.full_name") }}
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
                                                    placeholder="{{ trans("index.full_name") }}"
                                                    required />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            @php $input = "city" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.home_town") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                    <span class="fas fa-city fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                                </div>
                                                <input
                                                    class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                    wire:model.defer="{{ $input }}"
                                                    id="{{ $input }}"
                                                    type="text"
                                                    minlength="1"
                                                    maxlength="50"
                                                    placeholder="{{ trans("index.home_town") }}"
                                                    required />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__form row">
                                        <div class="form-group col-sm-6">
                                            @php $input = "email" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.email_address") }}
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
                                                    placeholder="{{ trans("index.email_address") }}"
                                                    required />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            @php $input = "phone" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.phone_number") }}
                                                <span class="text-danger">*</span>
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
                                                    placeholder="{{ trans("index.phone_number") }}"
                                                    required />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__form row">
                                        <div class="form-group col-sm-6">
                                            @php $input = "school" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.origin_high_school_or_vocational_school") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                    <span class="fas fa-school fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                                </div>
                                                <input
                                                    class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                    wire:model.defer="{{ $input }}"
                                                    id="{{ $input }}"
                                                    type="text"
                                                    minlength="1"
                                                    maxlength="50"
                                                    placeholder="{{ trans("index.origin_high_school_or_vocational_school") }}"
                                                    required />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            @php $input = "major" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.major_in_sma_or_smk") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                    <span class="fas fa-book fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                                                </div>
                                                <input
                                                    class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                    wire:model.defer="{{ $input }}"
                                                    id="{{ $input }}"
                                                    type="text"
                                                    minlength="1"
                                                    maxlength="15"
                                                    placeholder="{{ trans("index.major_in_sma_or_smk") }}"
                                                    required />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="form-group col-sm-6">
                                            @php $input = "gender" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("validation.attributes.{$input}") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="{{ $input }}-1" name="{{ $input }}" value="1" wire:model.defer="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-1">{{ trans("index.man") }}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="{{ $input }}-2" name="{{ $input }}" value="2" wire:model.defer="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-2">{{ trans("index.woman") }}</label>
                                                </div>
                                                @error($input)
                                                    <div class="text-danger">{{ $message }}</div>
                                                @else
                                                    @if ($gender)
                                                        <div class="text-success">{{ trans("validation.success") }}</div>
                                                    @endif
                                                @enderror
                                            </div>
                                        </div>

                                        @php $input = "type" @endphp
                                        <div class="form-group col-sm-6">
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("index.which_do_you_prefer") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                        wire:model.defer="{{ $input }}"
                                                        name="{{ $input }}"
                                                        id="{{ $input }}-1"
                                                        type="radio"
                                                        value="1"
                                                        required />
                                                    <label class="form-check-label" for="{{ $input }}-1">{{ trans("index.morning_afternoon_lecturer") }}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="{{ $input }}-2" name="{{ $input }}" value="2" wire:model.defer="{{ $input }}" required>
                                                    <label class="form-check-label" for="{{ $input }}-2">{{ trans("index.study_and_work_evening_lecture") }}</label>
                                                </div>
                                                @error($input)
                                                    <div class="text-danger">{{ $message }}</div>
                                                @else
                                                    @if ($type)
                                                        <div class="text-success">{{ trans("validation.success") }}</div>
                                                    @endif
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login__btn">
                                        <button class="btn htc__btn btn--theme" type="submit" wire:loading.attr="disabled">
                                            <i class="fas fa-paper-plane fa-fw"></i>
                                            {{ trans("index.submit") }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="login__social__link">
                                <h2>{{ trans("index.our_tuition_fees_and_our_scholarships") }}</h2>
                                <ul class="htc__social__btn">
                                    <li>
                                        <a draggable="false" href="{{ route("tuition-fees.index") }}">
                                            <i class="fas fa-money-check-dollar"></i><span>{{ trans("index.tuition_fees") }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ route("scholarships.index") }}">
                                            <i class="fas fa-hand-holding-dollar"></i><span>{{ trans("index.scholarships") }}</span>
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
