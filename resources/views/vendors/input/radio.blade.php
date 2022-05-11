@if ($input_type == "radio")
    @foreach ($$input_data as $row)
        <label class="form-check form-check-inline">
            <input type="{{ $input_type }}" class="form-check-input" name="{{ $input_name }}" id="{{ $input_id }}-{{ @$row["id"] }}" value="{{ @$row["id"] }}" {{ $input_required == "true" ? "required" : "" }} {{ $input_readonly == "true" ? "readonly" : "" }} {{ $input_disabled == "true" ? "disabled" : "" }} @if(old()){{ @$row["id"] == old($input_name) ? "checked" : "" }}@else{{ @$row["id"] == $$table->$input_name || (!old() && $loop->first) ? "checked" : "" }}@endif>
            <span class="custom-control-label">{{ @$row["name"] }}</span>
        </label>
        <div id="{{ $input_name }}-valid" class="valid-feedback rounded bg-success p-2 mt-2 text-white">{{ trans("index.Looks Good") }}</div>
        <div id="{{ $input_name }}-invalid" class="invalid-feedback rounded bg-danger p-2 mt-2 text-white">@error($input_name){{ $message }}@else{{ trans("index.Please Fill In Correctly") }}@enderror</div>
    @endforeach
@endif
