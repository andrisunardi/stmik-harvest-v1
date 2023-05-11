<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $role->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $role->name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.guard_name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $role->guard_name }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.total") }} {{ trans("index.permission") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="{{ route("{$subDomain}.configuration.permission.index") . "?role_id={$role->id}" }}" target="_blank">
                {{ $role->permissions->count() }}
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.total") }} {{ trans("index.user") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?role_id={$role->id}" }}" target="_blank">
                {{ $role->users->count() }}
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($role->created_at)
                {{ $role->created_at->isoFormat("LLLL") }}<br class="d-md-none">
                ({{ $role->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($role->updated_at)
                {{ $role->updated_at->isoFormat("LLLL") }}<br class="d-md-none">
                ({{ $role->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row">
        @can("{$pageName} Clone")
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $role->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-clipboard me-1"></i>
                    {{ trans("index.clone") }}
                    <div wire:loading wire:target="clone({{ $role->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        @endcan

        @can("{$pageName} Edit")
        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $role->id }})" wire:loading.attr="disabled">
                    <i class="fas fa-pencil me-1"></i>
                    {{ trans("index.edit") }}
                    <div wire:loading wire:target="edit({{ $role->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        @endcan

        @can("{$pageName} Delete")
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $role->id }}">
                    <i class="fas fa-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $role->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $role->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $role->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
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
                                <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $role->id }})">
                                    <i class="fas fa-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
</div>
