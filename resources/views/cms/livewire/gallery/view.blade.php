<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $gallery->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            @if ($gallery->checkImage())
                <a draggable="false" href="{{ $gallery->assetImage() }}" target="_blank">
                    <img
                        draggable="false"
                        class="w-100 img-thumbnail"
                        src="{{ $gallery->assetImage() }}"
                        alt="{{ $gallery->altImage() }}">
                </a>
                @can("{$pageName} Edit")
                    <div class="row my-3">
                        <div class="col-6">
                            <a draggable="false" class="btn btn-sm btn-info text-white w-100" href="{{ $gallery->assetImage() }}" download>
                                <i class="fas fa-download me-1"></i>
                                {{ trans("index.download") }}
                            </a>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-sm btn-danger w-100"
                                type="button"
                                wire:click="deleteImage({{ $gallery->id }})"
                                wire:loading.attr="disabled"
                                onclick='confirm("{{ trans("index.are_you_sure_you_want_to_delete_this_image") }} ?") || event.stopImmediatePropagation()'>
                                <i class="fas fa-trash me-1"></i>
                                {{ trans("index.delete") }}
                                <div wire:loading wire:target="deleteImage({{ $gallery->id }})">
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
            <h6>{{ trans("index.video") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($gallery->checkVideo())
                <div>
                    <video src="{{ $gallery->assetVideo() }}" class="w-100" controls></video>
                </div>
                <div class="alert alert-info mt-2">{{ trans("index.video_can_only_be_viewed_from_desktop_version") }}</div>
                @can("{$pageName} Edit")
                    <div class="row my-3">
                        <div class="col-6 col-md-auto">
                            <a draggable="false" class="btn btn-sm btn-primary w-100" href="{{ $gallery->assetVideo() }}" target="_blank">
                                <i class="fas fa-eye me-1"></i>
                                {{ trans("index.view") }}
                            </a>
                        </div>
                        <div class="col-6 col-md-auto">
                            <a draggable="false" class="btn btn-sm btn-info text-white w-100" href="{{ $gallery->assetVideo() }}" download>
                                <i class="fas fa-download me-1"></i>
                                {{ trans("index.download") }}
                            </a>
                        </div>
                        <div class="col-6 col-md-auto mt-3 mt-md-0">
                            <button
                                class="btn btn-sm btn-danger w-100"
                                type="button"
                                wire:click="deleteFile({{ $gallery->id }})"
                                wire:loading.attr="disabled"
                                onclick='confirm("{{ trans("index.are_you_sure_you_want_to_delete_this_video") }} ?") || event.stopImmediatePropagation()'>
                                <i class="fas fa-trash me-1"></i>
                                {{ trans("index.delete") }}
                                <div wire:loading wire:target="deleteFile({{ $gallery->id }})">
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
            {{ $gallery->name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.name_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $gallery->name_idn }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <div class="text-pre-wrap">{!! $gallery->description !!}</div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.description_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <div class="text-pre-wrap">{!! $gallery->description_idn !!}</div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.tag") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $gallery->tag }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.tag_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $gallery->tag_idn }}
        </div>
    </div>

    @if ($gallery->category->value == 2)
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.video") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($gallery->checkVideo())
                    <a draggable="false" class="btn btn-sm btn-primary" href="{{ $gallery->assetVideo() }}" target="_blank">
                        <i class="fas fa-eye me-1"></i>
                        {{ trans("index.view") }}
                    </a>
                    <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $gallery->assetVideo() }}" download>
                        <i class="fas fa-download me-1"></i>
                        {{ trans("index.download") }}
                    </a>
                @endif
            </div>
        </div>
    @endif

    @if ($gallery->category->value == 3)
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.youtube") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                <a draggable="false" href="{{ $gallery->youtube }}" target="_blank">
                    {{ $gallery->youtube }}
                </a>
            </div>
        </div>
    @endif

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <span class="badge bg-{{ Str::successdanger($gallery->is_active) }}">
                {{ Str::translate(Str::active($gallery->is_active)) }}
            </span>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($gallery->createdBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$gallery->createdBy->id}" }}" target="_blank">
                    {{ $gallery->createdBy->name }}
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($gallery->updatedBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$gallery->updatedBy->id}" }}" target="_blank">
                    {{ $gallery->updatedBy->name }}
                </a>
            @endif
        </div>
    </div>

    @if ($gallery->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($gallery->deletedBy)
                    <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$gallery->deletedBy->id}" }}" target="_blank">
                        {{ $gallery->deletedBy->name }}
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
            @if ($gallery->created_at)
                {{ $gallery->created_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $gallery->created_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $gallery->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($gallery->updated_at)
                {{ $gallery->updated_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $gallery->updated_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $gallery->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    @if ($gallery->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($gallery->deleted_at)
                    {{ $gallery->deleted_at->format("l, H:i:s") }}<br class="d-md-none">
                    {{ $gallery->deleted_at->isoFormat("LL") }}<br class="d-md-none">
                    ({{ $gallery->deleted_at->diffForHumans() }})
                @endif
            </div>
        </div>
    @endif

    <div class="row">
        @if ($gallery->trashed())
            @can("{$pageName} Restore")
                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $gallery->id }}">
                        <i class="fas fa-trash-restore me-1"></i>
                        {{ trans("index.restore") }}
                    </button>

                    <div class="modal fade" id="restore-{{ $gallery->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $gallery->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="restore-{{ $gallery->id }}">{{ trans("index.restore") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $gallery->id }})">
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
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $gallery->id }}">
                        <i class="fas fa-dumpster-fire me-1"></i>
                        {{ trans("index.delete_permanent") }}
                    </button>

                    <div class="modal fade" id="delete-permanent-{{ $gallery->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $gallery->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-permanent-{{ $gallery->id }}">{{ trans("index.delete_permanent") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $gallery->id }})">
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
                    <button class="btn btn-sm btn-{{ $gallery->is_active ? "danger" : "success" }} w-100" wire:click="active({{ $gallery->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-{{ $gallery->is_active ? "times" : "check" }}-circle me-1"></i>
                        {{ $gallery->is_active ? trans("index.inactive") : trans("index.active") }}
                        <div wire:loading wire:target="active({{ $gallery->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Clone")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $gallery->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-clipboard me-1"></i>
                        {{ trans("index.clone") }}
                        <div wire:loading wire:target="clone({{ $gallery->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Edit")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $gallery->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-pencil me-1"></i>
                        {{ trans("index.edit") }}
                        <div wire:loading wire:target="edit({{ $gallery->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Delete")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $gallery->id }}">
                        <i class="fas fa-trash me-1"></i>
                        {{ trans("index.delete") }}
                    </button>

                    <div class="modal fade" id="delete-{{ $gallery->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $gallery->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-{{ $gallery->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $gallery->id }})">
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
