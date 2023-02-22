<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $user->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            @if ($user->checkImage())
                <a draggable="false" href="{{ $user->assetImage() }}" target="_blank">
                    <img
                        draggable="false"
                        class="w-100 img-thumbnail"
                        src="{{ $user->assetImage() }}"
                        alt="{{ $user->altImage() }}">
                </a>
                @can("{$pageName} Edit")
                    <div class="row my-3">
                        <div class="col-6">
                            <a draggable="false" class="btn btn-sm btn-info text-white w-100" href="{{ $user->assetImage() }}" download>
                                <i class="fas fa-download me-1"></i>
                                {{ trans("index.download") }}
                            </a>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-sm btn-danger w-100"
                                type="button"
                                wire:click="deleteImage({{ $user->id }})"
                                wire:loading.attr="disabled"
                                onclick='confirm("{{ trans("index.are_you_sure_you_want_to_delete_this_image") }} ?") || event.stopImmediatePropagation()'>
                                <i class="fas fa-trash me-1"></i>
                                {{ trans("index.delete") }}
                                <div wire:loading wire:target="deleteImage({{ $user->id }})">
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
            {{ $user->name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.username") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $user->username }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.email") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.phone") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="tel:+{{ Str::phone($user->phone) }}">{{ $user->phone }}</a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <span class="badge bg-{{ Str::successdanger($user->is_active) }}">
                {{ Str::translate(Str::active($user->is_active)) }}
            </span>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.roles_and_permissions") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @foreach ($user->roles as $role)
                <div>{{ $loop->iteration }}. {{ $role->name }}</div>
                @foreach ($role->permissions as $permission)
                    <div>{{ $loop->iteration }}. {{ $permission->name }}</div>
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($user->createdBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$user->createdBy->id}" }}" target="_blank">
                    {{ $user->createdBy->name }}
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($user->updatedBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$user->updatedBy->id}" }}" target="_blank">
                    {{ $user->updatedBy->name }}
                </a>
            @endif
        </div>
    </div>

    @if ($user->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($user->deletedBy)
                    <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$user->deletedBy->id}" }}" target="_blank">
                        {{ $user->deletedBy->name }}
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
            @if ($user->created_at)
                {{ $user->created_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $user->created_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $user->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($user->updated_at)
                {{ $user->updated_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $user->updated_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $user->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    @if ($user->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($user->deleted_at)
                    {{ $user->deleted_at->format("l, H:i:s") }}<br class="d-md-none">
                    {{ $user->deleted_at->isoFormat("LL") }}<br class="d-md-none">
                    ({{ $user->deleted_at->diffForHumans() }})
                @endif
            </div>
        </div>
    @endif

    <div class="row">
        @if ($user->trashed())
            @can("{$pageName} Restore")
                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $user->id }}">
                        <i class="fas fa-trash-restore me-1"></i>
                        {{ trans("index.restore") }}
                    </button>

                    <div class="modal fade" id="restore-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="restore-{{ $user->id }}">{{ trans("index.restore") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $user->id }})">
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
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $user->id }}">
                        <i class="fas fa-dumpster-fire me-1"></i>
                        {{ trans("index.delete_permanent") }}
                    </button>

                    <div class="modal fade" id="delete-permanent-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-permanent-{{ $user->id }}">{{ trans("index.delete_permanent") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $user->id }})">
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
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-{{ $user->is_active ? "danger" : "success" }} w-100" wire:click="active({{ $user->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-{{ $user->is_active ? "times" : "check" }}-circle me-1"></i>
                    {{ $user->is_active ? trans("index.inactive") : trans("index.active") }}
                    <div wire:loading wire:target="active({{ $user->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $user->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-clipboard me-1"></i>
                    {{ trans("index.clone") }}
                    <div wire:loading wire:target="clone({{ $user->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $user->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-pencil me-1"></i>
                    {{ trans("index.edit") }}
                    <div wire:loading wire:target="edit({{ $user->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $user->id }}">
                    <i class="fas fa-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $user->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
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
                                <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $user->id }})">
                                    <i class="fas fa-check me-1"></i>
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
