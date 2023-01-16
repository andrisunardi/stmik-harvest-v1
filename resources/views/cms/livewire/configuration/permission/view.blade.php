<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $permission->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $permission->name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.guard_name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $permission->guard_name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.total") }} {{ trans("index.permission") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="{{ route("{$subDomain}.configuration.permission.index") . "?permission_id={$permission->id}" }}" target="_blank">
                {{ $permission->permissions->count() }}
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.total") }} {{ trans("index.user") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?permission_id={$permission->id}" }}" target="_blank">
                {{ $permission->users->count() }}
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($permission->created_at)
                {{ $permission->created_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $permission->created_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $permission->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($permission->updated_at)
                {{ $permission->updated_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $permission->updated_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $permission->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row">
        @can("{$pageName} Clone")
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $permission->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-clipboard me-1"></i>
                    {{ trans("index.clone") }}
                    <div wire:loading wire:target="clone({{ $permission->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        @endcan

        @can("{$pageName} Edit")
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $permission->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-pencil me-1"></i>
                    {{ trans("index.edit") }}
                    <div wire:loading wire:target="edit({{ $permission->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        @endcan

        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
            @can("{$pageName} Delete")
                <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $permission->id }}">
                    <i class="fas fa-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $permission->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $permission->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $permission->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
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
                                <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $permission->id }})">
                                    <i class="fas fa-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>
