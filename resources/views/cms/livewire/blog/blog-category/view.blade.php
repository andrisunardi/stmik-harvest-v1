<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $blogCategory->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $blogCategory->name }}
            <a draggable="false" href="{{ route("blog.index") . "?blog_category_id={$blogCategory->slug}" }}" class="btn btn-link btn-sm" target="_blank">
                <i class="fas fa-external-link"></i>
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.name_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $blogCategory->name_idn }}
            <a draggable="false" href="{{ route("blog.index") . "?blog_category_id={$blogCategory->slug}" }}" class="btn btn-link btn-sm" target="_blank">
                <i class="fas fa-external-link"></i>
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {!! $blogCategory->description !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.description_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {!! $blogCategory->description_idn !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.slug") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $blogCategory->slug }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <span class="badge bg-{{ Str::successdanger($blogCategory->is_active) }}">
                {{ Str::translate(Str::active($blogCategory->is_active)) }}
            </span>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.total") }} {{ trans("index.blog") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <a draggable="false" href="{{ route("{$subDomain}.blog.index") . "?blog_category_id={$blogCategory->id}" }}" target="_blank">
                {{ $blogCategory->blogs->count() }}
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($blogCategory->createdBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blogCategory->createdBy->id}" }}" target="_blank">
                    {{ $blogCategory->createdBy->name }}
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($blogCategory->updatedBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blogCategory->updatedBy->id}" }}" target="_blank">
                    {{ $blogCategory->updatedBy->name }}
                </a>
            @endif
        </div>
    </div>

    @if ($blogCategory->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($blogCategory->deletedBy)
                    <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$blogCategory->deletedBy->id}" }}" target="_blank">
                        {{ $blogCategory->deletedBy->name }}
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
            @if ($blogCategory->created_at)
                {{ $blogCategory->created_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $blogCategory->created_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $blogCategory->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($blogCategory->updated_at)
                {{ $blogCategory->updated_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $blogCategory->updated_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $blogCategory->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    @if ($blogCategory->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($blogCategory->deleted_at)
                    {{ $blogCategory->deleted_at->format("l, H:i:s") }}<br class="d-md-none">
                    {{ $blogCategory->deleted_at->isoFormat("LL") }}<br class="d-md-none">
                    ({{ $blogCategory->deleted_at->diffForHumans() }})
                @endif
            </div>
        </div>
    @endif

    <div class="row">
        @if ($blogCategory->trashed())
            @can("{$pageName} Restore")
                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $blogCategory->id }}">
                        <i class="fas fa-trash-restore me-1"></i>
                        {{ trans("index.restore") }}
                    </button>

                    <div class="modal fade" id="restore-{{ $blogCategory->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $blogCategory->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="restore-{{ $blogCategory->id }}">{{ trans("index.restore") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $blogCategory->id }})">
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
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $blogCategory->id }}">
                        <i class="fas fa-dumpster-fire me-1"></i>
                        {{ trans("index.delete_permanent") }}
                    </button>

                    <div class="modal fade" id="delete-permanent-{{ $blogCategory->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $blogCategory->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-permanent-{{ $blogCategory->id }}">{{ trans("index.delete_permanent") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $blogCategory->id }})">
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
                    <button class="btn btn-sm btn-{{ $blogCategory->is_active ? "danger" : "success" }} w-100" wire:click="active({{ $blogCategory->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-{{ $blogCategory->is_active ? "times" : "check" }}-circle me-1"></i>
                        {{ $blogCategory->is_active ? trans("index.inactive") : trans("index.active") }}
                        <div wire:loading wire:target="active({{ $blogCategory->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Clone")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $blogCategory->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-clipboard me-1"></i>
                        {{ trans("index.clone") }}
                        <div wire:loading wire:target="clone({{ $blogCategory->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Edit")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $blogCategory->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-pencil me-1"></i>
                        {{ trans("index.edit") }}
                        <div wire:loading wire:target="edit({{ $blogCategory->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Delete")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $blogCategory->id }}">
                        <i class="fas fa-trash me-1"></i>
                        {{ trans("index.delete") }}
                    </button>

                    <div class="modal fade" id="delete-{{ $blogCategory->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $blogCategory->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-{{ $blogCategory->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $blogCategory->id }})">
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
