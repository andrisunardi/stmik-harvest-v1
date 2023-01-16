<div class="form-group row mb-3 {{ $input_last == "true" ? "mb-3" : "mb-3" }}" id="row-{{ $input_name }}">

    @include("vendors.input.label")

    <div class="form-group {{ $input_div_class }}">

        @if ($input_group == "true")<div class="input-group">@endif

            @include("vendors.input.group")

            @include("vendors.input.select")

            @include("vendors.input.switch")

            @include("vendors.input.radio")

            @include("vendors.input.checkbox")

            @include("vendors.input.textarea")

            @if ($input_type == "text" || $input_type == "email" || $input_type == "password" || $input_type == "url" || $input_type == "number" || $input_type == "file" || $input_type == "date")

                @include("vendors.input.text")

            @endif

            @include("vendors.input.password")

            @include("vendors.input.group-last")

            @include("vendors.input.valid-invalid")

        @if ($input_group == "true")</div>@endif

        @if ($input_form_text)<p class="form-text mt-2">{{ $input_form_text }}</p>@endif
    </div>
</div>
