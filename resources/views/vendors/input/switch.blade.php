@if ($input_class == "switch")
    <div class="form-check form-switch form-switch-lg" dir="ltr">
        <input type="{{ $input_type }}" class="form-check-input {{ $input_class }}" id="{{ $input_id }}" name="{{ $input_name }}" value="1" {{ old($input_name) == "1" ? "checked" : "" }}>
        <label class="form-check-label" for="{{ $input_id }}">{{ $input_label_name }}</label>
    </div>
@endif
