<div>
    <form wire:submit.prevent="submit" role="form" autocomplete="off">

        <div class="row">
            <div class="form-group col-sm-6 mb-3">
                @php $input = "value" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-font fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
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

            <div class="form-group col-sm-6 mb-3">
                @php $input = "type" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-list fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <select
                        class="form-select select2 @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        required>
                        <option value="">{{ trans("index.select") }} {{ trans("validation.attributes.{$input}") }}</option>
                        @foreach ($newsletterTypes as $newsletterType)
                            <option value="{{ $newsletterType->value }}" {{ $newsletterType->value == $type ? "selected" : null }}>{{ $newsletterType->name }}</option>
                        @endforeach
                    </select>
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
                @php $input = "is_active" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-check fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <select
                        class="form-select select2 @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        required>
                        <option value="">{{ trans("index.select") }} {{ trans("validation.attributes.{$input}") }}</option>
                        <option value="1" {{ 1 == $is_active ? "selected" : null }}>{{ trans("index.active") }}</option>
                        <option value="0" {{ 0 == $is_active ? "selected" : null }}>{{ trans("index.in_active") }}</option>
                    </select>
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-auto">
                <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                    <i class="fas fa-save me-1"></i>
                    {{ trans("index.save") }}
                    <div wire:loading wire:target="submit"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button type="button" class="btn btn-warning text-white w-100" wire:click="{{ $pageType == "add" ? "resetFilter" : "resetForm" }}" wire:loading.attr="disabled">
                    <i class="fas fa-rotate-left me-1"></i>
                    {{ trans("index.reset") }}
                    <div wire:loading wire:target="{{ $pageType == "add" ? "resetFilter" : "resetForm" }}"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        </div>
    </form>
</div>