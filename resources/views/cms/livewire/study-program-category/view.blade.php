<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            @if ($study_program_category->checkImage())
                <a draggable="false" href="#image" data-bs-toggle="modal">
                    <img draggable="false" width="100"
                        src="{{ $study_program_category->assetImage() }}"
                        alt="{{ trans("page.{$menu_name}") }} - {{ $study_program_category->translate_name }} - {{ env("APP_TITLE") }}"
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
                                <a draggable="false" href="{{ $study_program_category->assetImage() }}" target="_blank">
                                    <img draggable="false" class="img-fluid w-100"
                                        src="{{ $study_program_category->assetImage() }}"
                                        alt="{{ trans("page.{$menu_name}") }} - {{ $study_program_category->translate_name }} - {{ env("APP_TITLE") }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                </a>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("button.Close") }}
                                </button>
                                <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $study_program_category->assetImage() }}" download>
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
            <h6>{{ trans("field.Code") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->code }}
            <a draggable="false" href="{{ route("study-program.index") . "?study_program_category={$study_program_category->id}" }}" class="btn btn-link btn-sm" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->name }}
            <a draggable="false" href="{{ route("study-program.index") . "?study_program_category={$study_program_category->id}" }}" class="btn btn-link btn-sm" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->name_id }}
            <a draggable="false" href="{{ route("study-program.index") . "?study_program_category={$study_program_category->id}" }}" class="btn btn-link btn-sm" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Total") }} {{ trans("field.Study Program") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->data_study_program->count() }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($study_program_category->active) }}">
                {{ trans("general." . Str::active($study_program_category->active)) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $study_program_category->created_by_admin?->id || $study_program_category->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$study_program_category->created_by_admin?->id}" : null }}" target="_blank">
                {{ $study_program_category->created_by_admin?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $study_program_category->updated_by_admin?->id || $study_program_category->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$study_program_category->updated_by_admin?->id}" : null }}" target="_blank">
                {{ $study_program_category->updated_by_admin?->name }}
            </a>
        </div>
    </div>
    @if ($study_program_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $study_program_category->deleted_by_admin?->id || $study_program_category->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$study_program_category->deleted_by_admin?->id}" : null }}" target="_blank">
                    {{ $study_program_category->deleted_by_admin?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $study_program_category->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $study_program_category->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $study_program_category->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($study_program_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $study_program_category->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $study_program_category->deleted_at->diffForHumans() }})
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
                            <th>{{ trans("field.Image") }}</th>
                            <th>{{ trans("field.Name") }}</th>
                            <th>{{ trans("field.Name ID") }}</th>
                            <th>{{ trans("field.Degree") }}</th>
                            <th>{{ trans("field.Duration") }}</th>
                            <th>{{ trans("field.Price") }}</th>
                            <th>{{ trans("field.Active") }}</th>
                            <th>{{ trans("field.Created By") }}</th>
                            <th>{{ trans("field.Updated By") }}</th>
                            <th>{{ trans("field.Created At") }}</th>
                            <th>{{ trans("field.Updated At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($study_program_category->data_study_program as $study_program)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.study-program.index") . "?menu_type=view&row={$study_program->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.study-program.index") . "?menu_type=view&row={$study_program->id}" }}" target="_blank">
                                        {{ $study_program->id }}
                                    </a>
                                </td>
                                <td>
                                    @if ($study_program->checkImage())
                                        <a draggable="false" href="#image-{{ $study_program->id }}" data-bs-toggle="modal">
                                            <img draggable="false" width="100"
                                                src="{{ $study_program->assetImage() }}"
                                                alt="{{ trans("page.{$menu_name}") }} - {{ $study_program->translate_name }} - {{ env("APP_TITLE") }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                        </a>
                                        <div class="modal fade" id="image-{{ $study_program->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $study_program->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="image-{{ $study_program->id }}">{{ trans("general.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                                        <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a draggable="false" href="{{ $study_program->assetImage() }}" target="_blank">
                                                            <img draggable="false" class="img-fluid w-100"
                                                                src="{{ $study_program->assetImage() }}"
                                                                alt="{{ trans("page.{$menu_name}") }} - {{ $study_program->translate_name }} - {{ env("APP_TITLE") }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                                        </a>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                            <i class="bi bi-x me-1"></i>
                                                            {{ trans("button.Close") }}
                                                        </button>
                                                        <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $study_program->assetImage() }}" download>
                                                            <i class="bi bi-download me-1"></i>
                                                            {{ trans("button.Download") }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.study-program.index") . "?menu_type=view&row={$study_program->id}" }}" target="_blank">
                                        {{ $study_program->name }}
                                    </a>
                                    <a draggable="false" href="{{ route("study-program.view", ["study_program_slug" => $study_program->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.study-program.index") . "?menu_type=view&row={$study_program->id}" }}" target="_blank">
                                        {{ $study_program->name_id }}
                                    </a>
                                    <a draggable="false" href="{{ route("study-program.view", ["study_program_slug" => $study_program->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </td>
                                <td class="text-center">{{ $study_program->degree }}</td>
                                <td class="text-center">{{ $study_program->duration }}</td>
                                <td>{{ $study_program->price }}</td>
                                <td>
                                    <span class="{{ "badge bg-" . Str::successdanger($study_program->active) }}">
                                        {{ trans("general." . Str::active($study_program->active)) }}
                                    </span>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $study_program->created_by_admin?->id || $study_program->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$study_program->created_by_admin?->id}" : null }}" target="_blank">
                                        {{ $study_program->created_by_admin?->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $study_program->updated_by_admin?->id || $study_program->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$study_program->updated_by_admin?->id}" : null }}" target="_blank">
                                        {{ $study_program->updated_by_admin?->name }}
                                    </a>
                                </td>
                                <td>{{ $study_program->created_at?->format("H:i:s - l, d F Y") }} ({{ $study_program->created_at?->diffForHumans() }})</td>
                                <td>{{ $study_program->updated_at?->format("H:i:s - l, d F Y") }} ({{ $study_program->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$study_program_category->data_study_program->count())
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
        @if ($study_program_category->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $study_program_category->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("button.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $study_program_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $study_program_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $study_program_category->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $study_program_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $study_program_category->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("button.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $study_program_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $study_program_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $study_program_category->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $study_program_category->id }})">
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
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $study_program_category->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("button.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $study_program_category->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("button.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $study_program_category->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("button.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $study_program_category->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("button.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $study_program_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $study_program_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $study_program_category->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $study_program_category->id }})">
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
