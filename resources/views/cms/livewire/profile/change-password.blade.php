@section("title", $pageTitle)
@section("icon", $pageIcon)

<div>

    @include("{$subDomain}.livewire.{$pageCategorySlug}.button")

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header text-white bg-warning">
                    <i class="@yield("icon") fa-fw"></i>
                    @yield("title")
                </div>

                <div class="card-body">

                    <form wire:submit.prevent="submit" role="form" autocomplete="off">

                        @php $input = "current_password" @endphp
                        <div class="mb-3">
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
                                    autocapitalize="none"
                                    autofocus />
                                @error($input)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback">{{ trans("validation.success") }}</div>
                                @enderror
                            </div>
                        </div>

                        @php $input = "new_password" @endphp
                        <div class="mb-3">
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

                        @php $input = "confirm_password" @endphp
                        <div class="mb-3">
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

                        <div class="row">
                            <div class="col-6 col-sm-auto">
                                <button class="btn btn-primary w-100" type="submit" wire:loading.attr="disabled">
                                    <i class="fas fa-save"></i>
                                    {{ trans("index.save") }}
                                </button>
                            </div>
                            <div class="col-6 col-sm-auto">
                                <button class="btn btn-secondary w-100" type="button" wire:click="resetForm" wire:loading.attr="disabled">
                                    <i class="fas fa-rotate-left"></i>
                                    {{ trans("index.reset") }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="card-footer bg-warning"></div>
            </div>
        </div>
    </div>
</div>
