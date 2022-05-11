@if ($input_group == "true")
    <div class="input-group-text @if(old()){{ $errors->has($input_name) ? "border-danger" : "border-success" }}@endif">
        @if ($input_icon_text){{ $input_icon_text }}@else<span class="{{ $input_icon }} fa-fw"></span>@endif
    </div>
@endif
