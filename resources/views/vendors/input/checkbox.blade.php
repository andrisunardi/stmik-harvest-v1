@if ($input_type == "checkbox")
    <input type="checkbox" id="{{ $input_id }}" name="{{ $input_name }}" value="1" switch="none" {{ old($input_name) == "1" ? "checked" : "" }}>
    <label for="{{ $input_id }}" data-on-label="{{ trans("index.Yes") }}" data-off-label="{{ trans("index.No") }}"></label>
@endif
