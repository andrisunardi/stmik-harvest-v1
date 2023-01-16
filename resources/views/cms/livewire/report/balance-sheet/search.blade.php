<div>
    <div class="row">
        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "portfolios_id" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select
                    class="form-select select2 @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                    wire:model="{{ $input }}"
                    id="{{ $input }}"
                    data-placeholder="{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}"
                    multiple>
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($portfolios as $portfolio)
                        <option value="{{ $portfolio->id }}" {{ in_array($portfolio->id, $portfolios_id) ? "selected" : null }}>{{ $portfolio->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "status" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    <option value="1" {{ "1" == $status ? "selected" : null }}>{{ trans("index.balanced") }}</option>
                    <option value="2" {{ "2" == $status ? "selected" : null }}>{{ trans("index.not_balanced") }}</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "start_date" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "end_date" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>
    </div>
</div>
