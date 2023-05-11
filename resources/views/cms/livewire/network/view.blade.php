<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $network->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            @if ($network->checkImage())
                <a draggable="false" href="{{ $network->assetImage() }}" target="_blank">
                    <img
                        draggable="false"
                        class="w-100 img-thumbnail"
                        src="{{ $network->assetImage() }}"
                        alt="{{ $network->altImage() }}">
                </a>
                @can("{$pageName} Edit")
                    <div class="row my-3">
                        <div class="col-6">
                            <a draggable="false" class="btn btn-sm btn-info text-white w-100" href="{{ $network->assetImage() }}" download>
                                <i class="fas fa-download me-1"></i>
                                {{ trans("index.download") }}
                            </a>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-sm btn-danger w-100"
                                type="button"
                                wire:click="deleteImage({{ $network->id }})"
                                wire:loading.attr="disabled"
                                onclick='confirm("{{ trans("index.are_you_sure_you_want_to_delete_this_image") }} ?") || event.stopImmediatePropagation()'>
                                <i class="fas fa-trash me-1"></i>
                                {{ trans("index.delete") }}
                                <div wire:loading wire:target="deleteImage({{ $network->id }})">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                @endcan
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $network->name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <div class="text-pre-wrap">{!! $network->description !!}</div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.link") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="{{ $network->link }}" target="_blank">
                {{ $network->link }}
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <span class="badge bg-{{ Str::successdanger($network->is_active) }}">
                {{ Str::translate(Str::active($network->is_active)) }}
            </span>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($network->createdBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$network->createdBy->id}" }}" target="_blank">
                    {{ $network->createdBy->name }}
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($network->updatedBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$network->updatedBy->id}" }}" target="_blank">
                    {{ $network->updatedBy->name }}
                </a>
            @endif
        </div>
    </div>

    @if ($network->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($network->deletedBy)
                    <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$network->deletedBy->id}" }}" target="_blank">
                        {{ $network->deletedBy->name }}
                    </a>
                @endif
            </div>
        </div>
    @endif

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($network->created_at)
                {{ $network->created_at->isoFormat("LLLL") }}<br class="d-md-none">
                ({{ $network->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($network->updated_at)
                {{ $network->updated_at->isoFormat("LLLL") }}<br class="d-md-none">
                ({{ $network->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    @if ($network->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($network->deleted_at)
                    {{ $network->deleted_at->isoFormat("LLLL") }}<br class="d-md-none">
                    ({{ $network->deleted_at->diffForHumans() }})
                @endif
            </div>
        </div>
    @endif

    <div class="row">
        @if ($network->trashed())
            @can("{$pageName} Restore")
                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $network->id }}">
                        <i class="fas fa-trash-restore me-1"></i>
                        {{ trans("index.restore") }}
                    </button>

                    <div class="modal fade" id="restore-{{ $network->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $network->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="restore-{{ $network->id }}">{{ trans("index.restore") }} - {{ $pageTitle }}</h6>
                                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-0">{{ trans("index.are_you_sure_you_want_to_restore") }} {{ $pageTitle }}</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i>
                                        {{ trans("index.close") }}
                                    </button>
                                    <button class="btn btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $network->id }})">
                                        <i class="fas fa-check me-1"></i>
                                        {{ trans("index.yes") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can("{$pageName} Delete Permanent")
                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $network->id }}">
                        <i class="fas fa-dumpster-fire me-1"></i>
                        {{ trans("index.delete_permanent") }}
                    </button>

                    <div class="modal fade" id="delete-permanent-{{ $network->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $network->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-permanent-{{ $network->id }}">{{ trans("index.delete_permanent") }} - {{ $pageTitle }}</h6>
                                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent") }} {{ $pageTitle }}</p>
                                    <p>{{ trans("index.you_cant_undo_this_action_or_restore_this_data_anymore") }}</p>
                                    <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i>
                                        {{ trans("index.close") }}
                                    </button>
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $network->id }})">
                                        <i class="fas fa-check me-1"></i>
                                        {{ trans("index.yes") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        @else

            @can("{$pageName} Edit")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-{{ $network->is_active ? "danger" : "success" }} w-100" wire:click="active({{ $network->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-{{ $network->is_active ? "times" : "check" }}-circle me-1"></i>
                        {{ $network->is_active ? trans("index.inactive") : trans("index.active") }}
                        <div wire:loading wire:target="active({{ $network->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Clone")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $network->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-clipboard me-1"></i>
                        {{ trans("index.clone") }}
                        <div wire:loading wire:target="clone({{ $network->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Edit")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $network->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-pencil me-1"></i>
                        {{ trans("index.edit") }}
                        <div wire:loading wire:target="edit({{ $network->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Delete")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $network->id }}">
                        <i class="fas fa-trash me-1"></i>
                        {{ trans("index.delete") }}
                    </button>

                    <div class="modal fade" id="delete-{{ $network->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $network->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-{{ $network->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
                                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ trans("index.are_you_sure_you_want_to_delete") }} {{ $pageTitle }}</p>
                                    <p class="mb-0">{{ trans("index.you_can_still_restore_from_trash") }}</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i>
                                        {{ trans("index.close") }}
                                    </button>
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $network->id }})">
                                        <i class="fas fa-check me-1"></i>
                                        {{ trans("index.yes") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        @endif
    </div>
</div>
