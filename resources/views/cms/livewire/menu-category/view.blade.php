<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $menu_category->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $menu_category->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name_id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $menu_category->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Icon") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <i class="{{ $menu_category->icon }}"></i> ({{ $menu_category->icon }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Sort") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $menu_category->sort }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($menu_category->active) }}">
                {{ trans("index." . Str::slug(Str::active($menu_category->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $menu_category->created_by?->id || $menu_category->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$menu_category->created_by?->id}" : null }}" target="_blank">
                {{ $menu_category->created_by?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $menu_category->updated_by?->id || $menu_category->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$menu_category->updated_by?->id}" : null }}" target="_blank">
                {{ $menu_category->updated_by?->name }}
            </a>
        </div>
    </div>
    @if ($menu_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $menu_category->deleted_by?->id || $menu_category->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$menu_category->deleted_by?->id}" : null }}" target="_blank">
                    {{ $menu_category->deleted_by?->name }}
                </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $menu_category->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $menu_category->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $menu_category->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $menu_category->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($menu_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $menu_category->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $menu_category->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif
    <div class="row my-2">
        @if ($menu_category->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $menu_category->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("index.restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $menu_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $menu_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $menu_category->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $menu_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $menu_category->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("index.delete_permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $menu_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $menu_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $menu_category->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $menu_category->id }})">
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
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $menu_category->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $menu_category->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.non_active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $menu_category->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $menu_category->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $menu_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $menu_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $menu_category->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $menu_category->id }})">
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
