<div>
    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->id }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.event_category") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->eventCategory)
                <a draggable="false" href="{{ route("{$subDomain}.event.category.index") . "?pageType=view&row={$event->eventCategory->id}" }}" target="_blank">
                    {{ $event->eventCategory->name }}
                </a>
                <a draggable="false" href="{{ route("event.index") . "?category={$event->eventCategory->slug}" }}" class="btn btn-link btn-sm" target="_blank">
                    <i class="fas fa-external-link"></i>
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.title") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->title }}
            <a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                <i class="fas fa-external-link"></i>
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.title_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->title_idn }}
            <a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                <i class="fas fa-external-link"></i>
            </a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.short_body") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->short_body }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.short_body_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->short_body_idn }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.body") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {!! $event->body !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.body_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {!! $event->body_idn !!}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.location") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->location }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.start") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->start)
                {{ $event->start->format("l,") }}
                {{ $event->start->isoFormat("LL") }}
                <br>
                ({{ $event->start->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.end") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->end)
                {{ $event->end->format("l,") }}
                {{ $event->end->isoFormat("LL") }}
                <br>
                ({{ $event->end->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.tag") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->tag }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.tag_idn") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->tag_idn }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.image") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->checkImage())
                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $event->assetImage() }}" target="_blank">
                    <i class="fas fa-eye me-1"></i>
                    {{ trans("index.view") }}
                </a>
                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $event->assetImage() }}" download>
                    <i class="fas fa-download me-1"></i>
                    {{ trans("index.download") }}
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.slug") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            {{ $event->slug }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            <span class="badge bg-{{ Str::successdanger($event->is_active) }}">
                {{ Str::translate(Str::active($event->is_active)) }}
            </span>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->createdBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$event->createdBy->id}" }}" target="_blank">
                    {{ $event->createdBy->name }}
                </a>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->updatedBy)
                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$event->updatedBy->id}" }}" target="_blank">
                    {{ $event->updatedBy->name }}
                </a>
            @endif
        </div>
    </div>

    @if ($event->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($event->deletedBy)
                    <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$event->deletedBy->id}" }}" target="_blank">
                        {{ $event->deletedBy->name }}
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
            @if ($event->created_at)
                {{ $event->created_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $event->created_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $event->created_at->diffForHumans() }})
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9">
            @if ($event->updated_at)
                {{ $event->updated_at->format("l, H:i:s") }}<br class="d-md-none">
                {{ $event->updated_at->isoFormat("LL") }}<br class="d-md-none">
                ({{ $event->updated_at->diffForHumans() }})
            @endif
        </div>
    </div>

    @if ($event->trashed())
        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9">
                @if ($event->deleted_at)
                    {{ $event->deleted_at->format("l, H:i:s") }}<br class="d-md-none">
                    {{ $event->deleted_at->isoFormat("LL") }}<br class="d-md-none">
                    ({{ $event->deleted_at->diffForHumans() }})
                @endif
            </div>
        </div>
    @endif

    <div class="row">
        @if ($event->trashed())
            @can("{$pageName} Restore")
                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $event->id }}">
                        <i class="fas fa-trash-restore me-1"></i>
                        {{ trans("index.restore") }}
                    </button>

                    <div class="modal fade" id="restore-{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="restore-{{ $event->id }}">{{ trans("index.restore") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $event->id }})">
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
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $event->id }}">
                        <i class="fas fa-dumpster-fire me-1"></i>
                        {{ trans("index.delete_permanent") }}
                    </button>

                    <div class="modal fade" id="delete-permanent-{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-permanent-{{ $event->id }}">{{ trans("index.delete_permanent") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $event->id }})">
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
                    <button class="btn btn-sm btn-{{ $event->is_active ? "danger" : "success" }} w-100" wire:click="active({{ $event->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-{{ $event->is_active ? "times" : "check" }}-circle me-1"></i>
                        {{ $event->is_active ? trans("index.inactive") : trans("index.active") }}
                        <div wire:loading wire:target="active({{ $event->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Clone")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-info text-white w-100" wire:click="clone({{ $event->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-clipboard me-1"></i>
                        {{ trans("index.clone") }}
                        <div wire:loading wire:target="clone({{ $event->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Edit")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-success w-100" wire:click="edit({{ $event->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-pencil me-1"></i>
                        {{ trans("index.edit") }}
                        <div wire:loading wire:target="edit({{ $event->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Delete")
                <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                    <button class="btn btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $event->id }}">
                        <i class="fas fa-trash me-1"></i>
                        {{ trans("index.delete") }}
                    </button>

                    <div class="modal fade" id="delete-{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-{{ $event->id }}">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $event->id }})">
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
