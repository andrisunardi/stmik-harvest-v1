@if ($input_label == "true")
    <label class="{{ $input_label_class }} @if(old()){{ $errors->has($input_name) ? "text-danger" : "text-success" }}@endif" for="{{ $input_id }}">{{ $input_label_name }} @if ($input_required == "true")<span class="text-danger">*</span>@endif</label>
@endif
