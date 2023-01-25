@section("title", $pageTitle)
@section("icon", $pageIcon)

<div>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-4 mt-md-5 mb-4">

                                <div class="card-header bg-white">
                                    <div class="text-center mt-3">
                                        <img draggable="false" class="w-50" src="{{ asset("images/logo.png") }}" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">
                                    </div>
                                    <h3 class="text-center text-uppercase font-weight-light my-4">
                                        @yield("title")
                                        {{-- {{ env("APP_NAME") }} --}}
                                    </h3>
                                </div>

                                <div class="card-body">

                                    <form wire:submit.prevent="submit" role="form" autocomplete="off">

                                        <div class="mb-3">
                                            @php $input = "username" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("validation.attributes.{$input}") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                    <i class="fas fa-id-card fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></i>
                                                </span>
                                                <input
                                                    class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                    wire:model.defer="{{ $input }}"
                                                    id="{{ $input }}"
                                                    type="text"
                                                    minlength="1"
                                                    maxlength="50"
                                                    placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                    required
                                                    autocapitalize="none"
                                                    autofocus />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            @php $input = "password" @endphp
                                            <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                                                {{ trans("validation.attributes.{$input}") }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                                                    <i class="fas fa-lock fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></i>
                                                </span>
                                                <input
                                                    class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                                                    wire:model.defer="{{ $input }}"
                                                    id="{{ $input }}"
                                                    type="password"
                                                    minlength="1"
                                                    maxlength="50"
                                                    placeholder="{{ trans("validation.attributes.{$input}") }}"
                                                    required
                                                    autocapitalize="none" />
                                                @error($input)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @else
                                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check mb-3">
                                            @php $input = "remember" @endphp
                                            <label class="form-check-label" for="{{ $input }}">
                                                {{ trans("index.stay_login") }}
                                            </label>
                                            <input
                                                class="form-check-input"
                                                wire:model.defer="{{ $input }}"
                                                id="{{ $input }}"
                                                type="checkbox"
                                                value="1" />
                                            @error($input)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @else
                                                <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a draggable="false" class="small" href="{{ route("cms.forgot-password.index") }}">
                                                {{ trans("index.forgot_password") }} ?
                                            </a>
                                            <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                                                <i class="fas fa-sign-in-alt me-1"></i> {{ trans("index.login") }}
                                                <div wire:loading wire:target="submit"><i class="fas fa-spinner fa-spin"></i></div>
                                            </button>
                                        </div>

                                    </form>

                                </div>

                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        CMS {{ env("APP_NAME") }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
