<div class="form-group">
    @if ($input_group)<div class="input-group has-validation">@endif
        @if ($input_group)
            <span class="input-group-text">
                @if ($input_icon_text){{ $input_icon_text }}@else<span class="{{ $input_icon }}"></span>@endif
            </span>
        @endif
        <input
            wire:model.lazy="{{ $input_name }}"
            wire:keydown.enter="submit"
            type="{{ $input_type }}"
            id="{{ $input_id }}"
            name="{{ $input_name }}"
            min="{{ $input_min }}"
            max="{{ $input_max }}"
            minlength="{{ $input_minlength }}"
            maxlength="{{ $input_maxlength }}"
            value="{{ $input_value }}"
            placeholder="{{ $input_placeholder }}"
            aria-label="{{ $input_aria_label }}"
            aria-describedby="{{ $input_aria_describedby }}"
            autocomplete="{{ $input_autocomplete }}"
            autocapitalize="{{ $input_autocapitalize }}"
            {{ $input_multiple ? "multiple" : null }}
            {{ $input_autofocus ? "autofocus" : null }}
            {{ $input_required ? "required" : null }}
            {{ $input_readonly ? "readonly" : null }}
            {{ $input_disabled ? "disabled" : null }}
            accept="{{ $input_accept }}"
            data-allowed-file-extensions="{{ $input_data_allowed_file_extensions }}"
            data-max-file-size="{{ $input_data_max_file_size }}"
            data-default-file="{{ $input_data_default_file }}"
            @if ($input_pattern) pattern="{{ $input_pattern }}"@endif
            @if ($input_step) step="{{ $input_step }}"@endif
            data-date-format="dd M, yyyy"
            data-date-container="#datepicker2"
            data-provide="datepicker"
            data-date-autoclose="true"
            class="form-control
                @if($errors->any() ||
                Session::has("info") ||
                Session::has("success") ||
                Session::has("warning") ||
                Session::has("danger"))
                {{ $errors->has($input_name) ? "is-invalid" : "is-valid" }}
            @endif">
            @if ($input_type == "password")
                @if ($input_group_last)<span class="input-group-text">@endif
                    <div class="{{ $input_group_last ? null : "position-absolute" }}" id="password-visibility" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Click to Hide / Unhide" wire:ignore>
                        <i class="bi bi-eye"></i>
                        <i class="bi bi-eye-slash"></i>
                    </div>
                @if ($input_group_last)</span>@endif
            @endif
            @if ($input_group_last && $input_type != "password")
                <span class="input-group-text">
                    @if ($input_icon_text_last){{ $input_icon_text_last }}@else<span class="{{ $input_icon_last }}"></span>@endif
                </span>
            @endif

        @error($input_name)
            <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
        @else
            <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
        @enderror

    @if ($input_group)</div>@endif
</div>
