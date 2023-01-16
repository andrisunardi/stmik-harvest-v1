<div>
    <div class="row">
        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "code" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "portfolio_id" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($portfolios as $portfolio)
                        <option value="{{ $portfolio->id }}" {{ $portfolio->id == $portfolio_id ? "selected" : null }}>{{ $portfolio->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "user_id" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $user_id ? "selected" : null }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "bank_id" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}" {{ $bank->id == $bank_id ? "selected" : null }}>{{ $bank->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "account_number" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "account_name" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "amount" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "date" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "time" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="time" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php $input = "notes" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            <div class="form-group">
                <label class="form-label">{{ trans("index.advanced_search") }}</label>
                <button
                    wire:click="advancedSearch"
                    wire:loading.attr="disabled"
                    type="button"
                    class="btn {{ $advanced_search ? "btn-primary" : "btn-outline-primary" }} btn-dropdown w-100"
                    data-bs-toggle="collapse"
                    data-bs-target="#advanced-search">
                    <span class="me-1">{{ $advanced_search ? trans("index.close") : trans("index.open") }}</span>
                    <i class="{{ $advanced_search ? "fas fa-caret-up" : "fas fa-caret-down" }}"></i>
                    <div wire:loading wire:target="advancedSearch"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        </div>
    </div>
</div>
