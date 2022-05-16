<div class="row">
    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "per_page" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="1000">1000</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "order_by" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="id">{{ trans("field.ID") }}</option>
                <option value="name">{{ trans("field.Name") }}</option>
                <option value="email">{{ trans("field.Email") }}</option>
                <option value="phone">{{ trans("field.Phone") }}</option>
                <option value="gender">{{ trans("field.Gender") }}</option>
                <option value="school">{{ trans("field.School") }}</option>
                <option value="major">{{ trans("field.Major") }}</option>
                <option value="city">{{ trans("field.City") }}</option>
                <option value="type">{{ trans("field.Type") }}</option>
                <option value="active">{{ trans("field.Active") }}</option>
                <option value="created_by">{{ trans("field.Created By") }}</option>
                <option value="updated_by">{{ trans("field.Updated By") }}</option>
                @if ($menu_type == "trash")
                    <option value="deleted_by">{{ trans("field.Deleted By") }}</option>
                @endif
                <option value="created_at">{{ trans("field.Created At") }}</option>
                <option value="updated_at">{{ trans("field.Updated At") }}</option>
                @if ($menu_type == "trash")
                    <option value="deleted_at">{{ trans("field.Deleted At") }}</option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "sort_by" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="asc">{{ trans("field.Ascending") }}</option>
                <option value="desc">{{ trans("field.Descending") }}</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "created_by" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                @foreach ($data_created_by as $created_by)
                    <option value="{{ $created_by->id }}">{{ $created_by->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "updated_by" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                @foreach ($data_updated_by as $updated_by)
                    <option value="{{ $updated_by->id }}">{{ $updated_by->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($menu_type == "trash")
        @php $input = "deleted_by" @endphp
        <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                    <option value="">{{ trans("field.All") }}</option>
                    @foreach ($data_deleted_by as $deleted_by)
                        <option value="{{ $deleted_by->id }}">{{ $deleted_by->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "start_created_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "end_created_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "start_updated_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "end_updated_at" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    @if ($menu_type == "trash")
        <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
            @php $input = "start_deleted_at" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>

        <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
            @php $input = "end_deleted_at" @endphp
            <div class="form-group">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
            </div>
        </div>
    @endif

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "active" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                <option value="1">{{ trans("field.Active") }}</option>
                <option value="0">{{ trans("field.Non Active") }}</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "name" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "email" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "phone" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "gender" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                <option value="1">{{ trans("field.Man") }}</option>
                <option value="2">{{ trans("field.Woman") }}</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "school" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "major" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "city" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "type" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                <option value="1">{{ trans("field.Morning - Afternoon Lecturer") }}</option>
                <option value="2">{{ trans("field.Study & Work (Evening Lecture)") }}</option>
            </select>
        </div>
    </div>
</div>
