<div class="row">
    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "per_page" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="10" {{ 10 == $per_page ? "selected" : null }}>10</option>
                <option value="25" {{ 25 == $per_page ? "selected" : null }}>25</option>
                <option value="50" {{ 50 == $per_page ? "selected" : null }}>50</option>
                <option value="100" {{ 100 == $per_page ? "selected" : null }}>100</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "order_by" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="id" {{ "id" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.id") }}</option>
                <option value="access_id">{{ trans("index.Access") }}</option>
                <option value="name">{{ trans("index.Name") }}</option>
                <option value="email">{{ trans("index.Email") }}</option>
                <option value="username">{{ trans("index.Username") }}</option>
                <option value="active">{{ trans("index.Active") }}</option>
                <option value="created_by">{{ trans("index.Created By") }}</option>
                <option value="updated_by">{{ trans("index.Updated By") }}</option>
                @if ($menu_type == "trash")
                    <option value="deleted_by">{{ trans("index.Deleted By") }}</option>
                @endif
                <option value="created_at">{{ trans("index.Created At") }}</option>
                <option value="updated_at">{{ trans("index.Updated At") }}</option>
                @if ($menu_type == "trash")
                    <option value="deleted_at">{{ trans("index.Deleted At") }}</option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "sort_by" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="asc" {{ "asc" == $sort_by ? "selected" : null }}>{{ trans("index.ascending") }}</option>
                <option value="desc" {{ "desc" == $sort_by ? "selected" : null }}>{{ trans("index.descending") }}</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "created_by_id" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("index.All") }}</option>
                @foreach ($data_created_by as $created_by)
                    <option value="{{ $created_by->id }}" {{ $created_by->id == $created_by_id ? "selected" : null }}>{{ $created_by->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "updated_by_id" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("index.All") }}</option>
                @foreach ($data_updated_by as $updated_by)
                    <option value="{{ $updated_by->id }}" {{ $updated_by->id == $updated_by_id ? "selected" : null }}>{{ $updated_by->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($menu_type == "trash")
        @php $input = "deleted_by_id" @endphp
        <div class="col-sm-4 col-lg-3 col-xl-auto">
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                    <option value="">{{ trans("index.All") }}</option>
                    @foreach ($data_deleted_by as $deleted_by)
                        <option value="{{ $deleted_by->id }}" {{ $deleted_by->id == $deleted_by_id ? "selected" : null }}>{{ $deleted_by->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "start_created_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "end_created_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "start_updated_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "end_updated_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    @if ($menu_type == "trash")
        <div class="col-sm-4 col-lg-3 col-xl-auto">
            @php $input = "start_deleted_at" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-sm-4 col-lg-3 col-xl-auto">
            @php $input = "end_deleted_at" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>
    @endif

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "active" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("index.All") }}</option>
                <option value="1">{{ trans("index.Active") }}</option>
                <option value="0">{{ trans("index.Non Active") }}</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "access" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("index.All") }}</option>
                @foreach ($data_access as $access)
                    <option value="{{ $access->id }}">{{ $access->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "name" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "email" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "username" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>
</div>
