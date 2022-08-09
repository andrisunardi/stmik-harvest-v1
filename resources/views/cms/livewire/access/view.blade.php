<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $access->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $access->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($access->active) }}">
                {{ trans("index." . Str::slug(Str::active($access->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $access->created_by?->id || $access->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$access->created_by?->id}" : null }}" target="_blank">
                {{ $access->created_by?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $access->updated_by?->id || $access->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$access->updated_by?->id}" : null }}" target="_blank">
                {{ $access->updated_by?->name }}
            </a>
        </div>
    </div>
    @if ($access->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $access->deleted_by?->id || $access->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$access->deleted_by?->id}" : null }}" target="_blank">
                    {{ $access->deleted_by?->name }}
                </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $access->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $access->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $access->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $access->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($access->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $access->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $access->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif
    <div class="row my-2">
        @if ($access->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $access->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("index.restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $access->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $access->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $access->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("index.are_you_sure_you_want_to_restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $access->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $access->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("index.delete_permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $access->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $access->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $access->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                                <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $access->id }})">
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
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $access->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $access->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.non_active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $access->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $access->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $access->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $access->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $access->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.are_you_sure_you_want_to_delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p class="mb-0">{{ trans("index.you_can_still_restore_from_trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $access->id }})">
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
