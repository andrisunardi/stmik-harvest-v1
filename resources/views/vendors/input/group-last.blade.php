@if ($input_group_last == "true")
    <div class="input-group-text @if(old()){{ $errors->has($input_name) ? "border-danger" : "border-success" }}@endif">
        @if ($input_icon_text_last){{ $input_icon_text_last }}@else<span class="{{ $input_icon_last }} fa-fw"></span>@endif
    </div>
@endif
