<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $lecturer->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            @if ($lecturer->checkImage())
                <a draggable="false" href="#image" data-bs-toggle="modal">
                    <img draggable="false" width="100"
                        src="{{ $lecturer->assetImage() }}"
                        alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                </a>
                <div class="modal fade" id="image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="image">{{ trans("general.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a draggable="false" href="{{ $lecturer->assetImage() }}" target="_blank">
                                    <img draggable="false" class="img-fluid w-100"
                                        src="{{ $lecturer->assetImage() }}"
                                        alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                </a>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("button.Close") }}
                                </button>
                                <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $lecturer->assetImage() }}" download>
                                    <i class="bi bi-download me-1"></i>
                                    {{ trans("button.Download") }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $lecturer->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($lecturer->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Job") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $lecturer->job }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Phone") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="tel+:{{ Str::phone($lecturer->phone) }}">{{ $lecturer->phone }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Email") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="mailto:{{ $lecturer->email }}">{{ $lecturer->email }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Facebook") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->facebook }}" target="_blank">{{ $lecturer->facebook }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Twitter") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->twitter }}" target="_blank">{{ $lecturer->twitter }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Instagram") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->instagram }}" target="_blank">{{ $lecturer->instagram }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Linkedin") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->linkedin }}" target="_blank">{{ $lecturer->linkedin }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Scholar") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->scholar }}" target="_blank">{{ $lecturer->scholar }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($lecturer->active) }}">
                {{ trans("general." . Str::active($lecturer->active)) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->created_by_admin?->id || $lecturer->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer->created_by_admin?->id}" : null }}" target="_blank">
                {{ $lecturer->created_by_admin?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $lecturer->updated_by_admin?->id || $lecturer->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer->updated_by_admin?->id}" : null }}" target="_blank">
                {{ $lecturer->updated_by_admin?->name }}
            </a>
        </div>
    </div>
    @if ($lecturer->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $lecturer->deleted_by_admin?->id || $lecturer->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer->deleted_by_admin?->id}" : null }}" target="_blank">
                    {{ $lecturer->deleted_by_admin?->name }}
                </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $lecturer->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $lecturer->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $lecturer->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $lecturer->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($lecturer->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $lecturer->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $lecturer->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif

    <div class="row my-2">
        <div class="col-12">
            <h6>{{ trans("field.Lecturer Education") }}</h6>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>{{ trans("field.#") }}</th>
                            <th>{{ trans("field.ID") }}</th>
                            <th>{{ trans("field.Name") }}</th>
                            <th>{{ trans("field.Name ID") }}</th>
                            <th>{{ trans("field.Active") }}</th>
                            <th>{{ trans("field.Created By") }}</th>
                            <th>{{ trans("field.Updated By") }}</th>
                            <th>{{ trans("field.Created At") }}</th>
                            <th>{{ trans("field.Updated At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecturer->data_lecturer_education as $lecturer_education)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-education.index") . "?menu_type=view&row={$lecturer_education->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-education.index") . "?menu_type=view&row={$lecturer_education->id}" }}" target="_blank">
                                        {{ $lecturer_education->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-education.index") . "?menu_type=view&row={$lecturer_education->id}" }}" target="_blank">
                                        {{ $lecturer_education->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-education.index") . "?menu_type=view&row={$lecturer_education->id}" }}" target="_blank">
                                        {{ $lecturer_education->name_id }}
                                    </a>
                                </td>
                                <td>
                                    <span class="{{ "badge bg-" . Str::successdanger($lecturer_education->active) }}">
                                        {{ trans("general." . Str::active($lecturer_education->active)) }}
                                    </span>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $lecturer_education->created_by_admin?->id || $lecturer_education->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer_education->created_by_admin?->id}" : null }}" target="_blank">
                                        {{ $lecturer_education->created_by_admin?->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $lecturer_education->updated_by_admin?->id || $lecturer_education->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer_education->updated_by_admin?->id}" : null }}" target="_blank">
                                        {{ $lecturer_education->updated_by_admin?->name }}
                                    </a>
                                </td>
                                <td>{{ $lecturer_education->created_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer_education->created_at?->diffForHumans() }})</td>
                                <td>{{ $lecturer_education->updated_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer_education->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$lecturer->data_lecturer_education->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-12">
            <h6>{{ trans("field.Lecturer Work Experience") }}</h6>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>{{ trans("field.#") }}</th>
                            <th>{{ trans("field.ID") }}</th>
                            <th>{{ trans("field.Name") }}</th>
                            <th>{{ trans("field.Name ID") }}</th>
                            <th>{{ trans("field.Active") }}</th>
                            <th>{{ trans("field.Created By") }}</th>
                            <th>{{ trans("field.Updated By") }}</th>
                            <th>{{ trans("field.Created At") }}</th>
                            <th>{{ trans("field.Updated At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecturer->data_lecturer_work_experience as $lecturer_work_experience)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-work-experience.index") . "?menu_type=view&row={$lecturer_work_experience->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-work-experience.index") . "?menu_type=view&row={$lecturer_work_experience->id}" }}" target="_blank">
                                        {{ $lecturer_work_experience->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-work-experience.index") . "?menu_type=view&row={$lecturer_work_experience->id}" }}" target="_blank">
                                        {{ $lecturer_work_experience->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.lecturer-work-experience.index") . "?menu_type=view&row={$lecturer_work_experience->id}" }}" target="_blank">
                                        {{ $lecturer_work_experience->name_id }}
                                    </a>
                                </td>
                                <td>
                                    <span class="{{ "badge bg-" . Str::successdanger($lecturer_work_experience->active) }}">
                                        {{ trans("general." . Str::active($lecturer_work_experience->active)) }}
                                    </span>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $lecturer_work_experience->created_by_admin?->id || $lecturer_work_experience->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer_work_experience->created_by_admin?->id}" : null }}" target="_blank">
                                        {{ $lecturer_work_experience->created_by_admin?->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $lecturer_work_experience->updated_by_admin?->id || $lecturer_work_experience->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer_work_experience->updated_by_admin?->id}" : null }}" target="_blank">
                                        {{ $lecturer_work_experience->updated_by_admin?->name }}
                                    </a>
                                </td>
                                <td>{{ $lecturer_work_experience->created_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer_work_experience->created_at?->diffForHumans() }})</td>
                                <td>{{ $lecturer_work_experience->updated_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer_work_experience->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$lecturer->data_lecturer_work_experience->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row my-2">
        @if ($lecturer->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $lecturer->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("button.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $lecturer->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $lecturer->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("message.Are you sure you want to restore") }} {{ trans("page.{$menu_name}") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("button.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $lecturer->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $lecturer->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("button.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $lecturer->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $lecturer->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("message.Are you sure you want to delete permanent") }} {{ trans("page.{$menu_name}") }}</p>
                                <p>{{ trans("message.You cant undo this action or restore this data anymore") }}</p>
                                <p class="mb-0">{{ trans("message.All relation data and files will be deleted forever from server") }}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("button.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $lecturer->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $lecturer->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("button.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $lecturer->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("button.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $lecturer->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("button.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $lecturer->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("button.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $lecturer->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $lecturer->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("message.Are you sure you want to delete") }} {{ trans("page.{$menu_name}") }}</p>
                                <p class="mb-0">{{ trans("message.You can still restore from Trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("button.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $lecturer->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
