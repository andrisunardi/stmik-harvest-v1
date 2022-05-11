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
                <option value="repository_subject_id">{{ trans("field.Repository Subject") }}</option>
                <option value="study_program_id">{{ trans("field.Study Program") }}</option>
                <option value="user_id">{{ trans("field.User ID") }}</option>
                <option value="status">{{ trans("field.Status") }}</option>
                <option value="title">{{ trans("field.Title") }}</option>
                <option value="journal_title">{{ trans("field.Journal Title") }}</option>
                <option value="date">{{ trans("field.Date") }}</option>
                <option value="publication_date">{{ trans("field.Publication Date") }}</option>
                <option value="first_name">{{ trans("field.First Name") }}</option>
                <option value="last_name">{{ trans("field.Last Name") }}</option>
                <option value="corporate_author">{{ trans("field.Corporate Author") }}</option>
                <option value="publisher">{{ trans("field.Publisher") }}</option>
                <option value="year">{{ trans("field.Year") }}</option>
                <option value="abstract">{{ trans("field.Abstract") }}</option>
                <option value="url">{{ trans("field.URL") }}</option>
                <option value="keyword">{{ trans("field.Keyword") }}</option>
                <option value="volume">{{ trans("field.Volume") }}</option>
                <option value="issue">{{ trans("field.Issue") }}</option>
                <option value="all_page">{{ trans("field.Page") }}</option>
                <option value="first_page">{{ trans("field.First Page") }}</option>
                <option value="last_page">{{ trans("field.Last Page") }}</option>
                <option value="scholar">{{ trans("field.Scholar") }}</option>
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
        @php $input = "repository_subject" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                @foreach ($data_repository_subject as $repository_subject)
                    <option value="{{ $repository_subject->id }}">{{ $repository_subject->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "study_program" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                @foreach ($data_study_program as $study_program)
                    <option value="{{ $study_program->id }}">{{ $study_program->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "user" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                @foreach ($data_user as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "status" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <select wire:model="{{ $input }}" class="form-select" id="{{ $input }}" name="{{ $input }}">
                <option value="">{{ trans("field.All") }}</option>
                <option value="0">{{ trans("field.Pending") }}</option>
                <option value="1">{{ trans("field.Approved") }}</option>
                <option value="2">{{ trans("field.Rejected") }}</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "title" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "journal_title" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "date" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "publication_date" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "first_name" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "last_name" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "corporate_author" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "publisher" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "abstract" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "url" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "keyword" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "volume" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "issue" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "all_page" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("field.Page") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("field.Page") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "first_page" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "last_page" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-3 col-xl-auto">
        @php $input = "scholar" @endphp
        <div class="form-group">
            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
            <input wire:model="{{ $input }}" type="search" class="form-control" id="{{ $input }}" name="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
        </div>
    </div>
</div>
