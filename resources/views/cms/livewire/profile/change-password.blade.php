<div>
    <form wire:submit.prevent="changePasswordSubmit" wire:keydown.enter="changePasswordSubmit" class="was-validated-delete" method="post" role="form" action="{{ route("{$sub_domain}.{$menu_slug}.index") }}">
        @csrf

        @php $input = "current_password" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
            <div class="input-group has-validation">
                <div class="input-group-text">
                    <span class="bi bi-lock-fill"></span>
                </div>
                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                    class="form-control @if($errors->any()){{ $errors->has($input) ? "is-invalid" : "is-valid" }} @endif"
                    type="password" minlength="1" maxlength="50" value="{{ old($input) }}"
                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                    autocomplete="off" autocapitalize="none" required>
                @error($input)
                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                @else
                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                @enderror
            </div>
        </div>

        @php $input = "new_password" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
            <div class="input-group has-validation">
                <div class="input-group-text">
                    <span class="bi bi-lock-fill"></span>
                </div>
                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                    class="form-control @if($errors->any()){{ $errors->has($input) ? "is-invalid" : "is-valid" }} @endif"
                    type="password" minlength="1" maxlength="50" value="{{ old($input) }}"
                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                    autocomplete="off" autocapitalize="none" required>
                @error($input)
                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                @else
                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                @enderror
            </div>
        </div>

        @php $input = "confirm_password" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
            <div class="input-group has-validation">
                <div class="input-group-text">
                    <span class="bi bi-lock-fill"></span>
                </div>
                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                    class="form-control @if($errors->any()){{ $errors->has($input) ? "is-invalid" : "is-valid" }} @endif"
                    type="password" minlength="1" maxlength="50" value="{{ old($input) }}"
                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                    autocomplete="off" autocapitalize="none" required>
                @error($input)
                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                @else
                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-auto">
                <button class="btn btn-primary w-100" type="button" wire:click="changePasswordSubmit">
                    <i class="bi bi-save-fill me-1"></i>
                    {{ trans("index.save_changes") }}
                </button>
            </div>
        </div>
    </form>
</div>
