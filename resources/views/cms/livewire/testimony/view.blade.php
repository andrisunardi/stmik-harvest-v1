<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $testimony->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            @if ($testimony->checkImage())
                <a draggable="false" href="#image" data-bs-toggle="modal">
                    <img draggable="false" width="100"
                        src="{{ $testimony->assetImage() }}"
                        alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $testimony->translate_name }} - {{ env("APP_TITLE") }}"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                </a>
                <div class="modal fade" id="image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="image">{{ trans("index.Image") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a draggable="false" href="{{ $testimony->assetImage() }}" target="_blank">
                                    <img draggable="false" class="img-fluid w-100"
                                        src="{{ $testimony->assetImage() }}"
                                        alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $testimony->translate_name }} - {{ env("APP_TITLE") }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                                </a>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $testimony->assetImage() }}" download>
                                    <i class="bi bi-download me-1"></i>
                                    {{ trans("index.Download") }}
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
            <h6>{{ trans("index.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $testimony->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($testimony->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Graduate") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $testimony->graduate }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($testimony->active) }}">
                {{ trans("index." . Str::slug(Str::active($testimony->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $testimony->created_by?->id || $testimony->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$testimony->created_by?->id}" : null }}" target="_blank">
                {{ $testimony->created_by?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $testimony->updated_by?->id || $testimony->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$testimony->updated_by?->id}" : null }}" target="_blank">
                {{ $testimony->updated_by?->name }}
            </a>
        </div>
    </div>
    @if ($testimony->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $testimony->deleted_by?->id || $testimony->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$testimony->deleted_by?->id}" : null }}" target="_blank">
                    {{ $testimony->deleted_by?->name }}
                </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $testimony->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $testimony->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $testimony->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $testimony->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($testimony->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $testimony->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $testimony->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif
    <div class="row my-2">
        @if ($testimony->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $testimony->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("index.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $testimony->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $testimony->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $testimony->id }}">{{ trans("index.Restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("index.Are you sure you want to restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $testimony->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $testimony->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("index.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $testimony->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $testimony->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $testimony->id }}">{{ trans("index.Delete Permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.Are you sure you want to delete permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                                <p class="mb-0">{{ trans("index.All relation data and files will be deleted forever from server") }}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $testimony->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $testimony->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $testimony->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $testimony->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $testimony->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("index.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $testimony->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $testimony->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $testimony->id }}">{{ trans("index.Delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.Are you sure you want to delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p class="mb-0">{{ trans("index.You can still restore from Trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $testimony->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
