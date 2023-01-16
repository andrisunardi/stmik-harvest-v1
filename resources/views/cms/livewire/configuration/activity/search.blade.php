<div>
    <div class="row">
        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "log_name")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($activityLogNames as $activityLogName)
                        <option value="{{ $activityLogName }}" {{ $activityLogName == $log_name ? "selected" : null }}>{{ $activityLogName }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "description")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "event")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($activityEvents as $activityEvent)
                        <option value="{{ $activityEvent }}" {{ $activityEvent == $event ? "selected" : null }}>{{ $activityEvent }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "subject_type")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($activitySubjectTypes as $activitySubjectType)
                        <option value="{{ $activitySubjectType }}" {{ $activitySubjectType == $subject_type ? "selected" : null }}>{{ $activitySubjectType }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "subject_id")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "causer_type")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                    <option value="">{{ trans("index.all") }} {{ trans("validation.attributes.{$input}") }}</option>
                    @foreach ($activityCauserTypes as $activityCauserType)
                        <option value="{{ $activityCauserType }}" {{ $activityCauserType == $causer_type ? "selected" : null }}>{{ $activityCauserType }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "causer_id")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "properties")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "batch_uuid")
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
            @php($input = "user_id")
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
