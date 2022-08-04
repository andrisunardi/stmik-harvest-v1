<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $admission_calendar->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $admission_calendar->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name_id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $admission_calendar->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($admission_calendar->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($admission_calendar->description_id) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Date") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            @if ($admission_calendar->date && $admission_calendar->date != "0000-00-00")
                {{ Date::parse($admission_calendar->date)->format("d F Y") }}
                ({{ Date::parse($admission_calendar->date)->diffForHumans() }})
            @endif
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($admission_calendar->active) }}">
                {{ trans("index." . Str::slug(Str::active($admission_calendar->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $admission_calendar->created_by?->id || $admission_calendar->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$admission_calendar->created_by?->id}" : null }}" target="_blank">
                {{ $admission_calendar->created_by?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $admission_calendar->updated_by?->id || $admission_calendar->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$admission_calendar->updated_by?->id}" : null }}" target="_blank">
                {{ $admission_calendar->updated_by?->name }}
            </a>
        </div>
    </div>
    @if ($admission_calendar->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $admission_calendar->deleted_by?->id || $admission_calendar->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$admission_calendar->deleted_by?->id}" : null }}" target="_blank">
                    {{ $admission_calendar->deleted_by?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $admission_calendar->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $admission_calendar->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $admission_calendar->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $admission_calendar->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($admission_calendar->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $admission_calendar->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $admission_calendar->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif

    <div class="row my-2">
        @if ($admission_calendar->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $admission_calendar->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("index.restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $admission_calendar->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $admission_calendar->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $admission_calendar->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("index.Are you sure you want to restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $admission_calendar->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $admission_calendar->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("index.delete_permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $admission_calendar->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $admission_calendar->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $admission_calendar->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.Are you sure you want to delete permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                                <p class="mb-0">{{ trans("index.All relation data and files will be deleted forever from server") }}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $admission_calendar->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $admission_calendar->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $admission_calendar->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.non_active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $admission_calendar->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $admission_calendar->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $admission_calendar->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $admission_calendar->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $admission_calendar->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.Are you sure you want to delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p class="mb-0">{{ trans("index.You can still restore from Trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $admission_calendar->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
