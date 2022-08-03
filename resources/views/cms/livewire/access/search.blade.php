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
                <option value="name" {{ "name" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.name") }}</option>
                <option value="active" {{ "active" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.active") }}</option>
                <option value="created_by_id" {{ "created_by_id" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.created_by_id") }}</option>
                <option value="updated_by_id" {{ "updated_by_id" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.updated_by_id") }}</option>
                @if ($menu_type == "trash")
                    <option value="deleted_by_id" {{ "deleted_by_id" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.deleted_by_id") }}</option>
                @endif
                <option value="created_at" {{ "created_at" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.created_at") }}</option>
                <option value="updated_at" {{ "updated_at" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.updated_at") }}</option>
                @if ($menu_type == "trash")
                    <option value="deleted_at" {{ "deleted_at" == $order_by ? "selected" : null }}>{{ trans("validation.attributes.deleted_at") }}</option>
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
                <option value="2">{{ trans("index.Non Active") }}</option>
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
</div>
