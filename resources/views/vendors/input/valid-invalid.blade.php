<div class="valid-feedback rounded bg-success p-2 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
<div class="invalid-feedback rounded bg-danger p-2 mt-2 text-white">@error($input_name){{ $message }}@enderror</div>
