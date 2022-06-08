@if ($input_type == "select")
    <select class="form-control {{ $input_class }} @if(old()){{ $errors->has($input_name) ? "is-invalid" : "is-valid" }}@endif" id="{{ $input_id }}" name="@if ($input_multiple == "true"){{ $input_name }}[]@else{{ $input_name }}@endif" min="{{ $input_min }}" max="{{ $input_max }}" minlength="{{ $input_minlength }}" maxlength="{{ $input_maxlength }}" value="{{ $input_value }}" placeholder="{{ $input_placeholder }}" aria-label="{{ $input_aria_label }}" aria-describedby="{{ $input_aria_describedby }}" autocomplete="{{ $input_autocomplete }}" autocapitalize="{{ $input_autocapitalize }}" {{ $input_multiple == "true" ? "multiple" : "" }} {{ $input_autofocus == "true" ? "autofocus" : "" }} {{ $input_required == "true" ? "required" : "" }} {{ $input_readonly == "true" ? "readonly" : "" }} {{ $input_disabled == "true" ? "disabled" : "" }} accept="{{ $input_accept }}" data-allowed-file-extensions="{{ $input_data_allowed_file_extensions }}" data-max-file-size="{{ $input_data_max_file_size }}" data-default-file="{{ $input_data_default_file }}" @if ($input_pattern) pattern="{{ $input_pattern }}" @endif  @if ($input_step) step="{{ $input_step }}" @endif @if ($input_multiple == "true") data-placeholder="{{ trans("index.Select") }} {{ $input_placeholder }}" @endif data-toggle="{{ $input_class }}">
        @if ($input_multiple == "false")
            <option value="">{{ trans("index.Select") }} {{ $input_placeholder }}</option>
        @else
            @foreach ($$input_data as $row)
                <option value="{{ $row->id }}"
                @if(old())
                    @foreach(old($input_name) as $row_selected)
                        @if($row->id == $row_selected) selected @endif
                    @endforeach
                @else
                    @foreach($$table->$input_data_has_many as $row_has_many)
                        @if($row->id == $row_has_many->$input_row) selected @endif
                    @endforeach
                @endif
                >{{ $row->name }}</option>
            @endforeach
        @endif
        @foreach ($$input_data as $row)
            <option value="{{ @$row["id"] }}" @if(old()){{ @$row["id"] == old($input_name) ? "selected" : "" }}@else{{ @$row["id"] == $$table->$input_row ? "selected" : "" }}@endif>{{ @$row["code"] ? @$row["code"] . " - " : "" }}{{ @$row["name"] }}</option>
        @endforeach
    </select>
@endif
