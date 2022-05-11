<input
    wire:model="{{ $input_name }}"
    type="{{ $input_type }}"
    class="form-control {{ $input_class }}
        @if($errors->any() ||
            Session::has("info") ||
            Session::has("success") ||
            Session::has("warning") ||
            Session::has("danger"))
                {{ $errors->has($input_name) ? "is-invalid" : "is-valid" }}
        @endif"
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
    {{ $input_multiple == "true" ? "multiple" : null }}
    {{ $input_autofocus == "true" ? "autofocus" : null }}
    {{ $input_required == "true" ? "required" : null }}
    {{ $input_readonly == "true" ? "readonly" : null }}
    {{ $input_disabled == "true" ? "disabled" : null }}
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
/>
{{-- data-toggle="touchspin" data-step="0.1" data-decimals="2" data-bts-postfix="%" data-bts-prefix="$" --}}
