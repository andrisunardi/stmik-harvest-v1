<div>
    <tr id="action-{{ $buyDomainHosting->id }}" class="collapse {{ !empty($action[$buyDomainHosting->id]) ? "show" : null }}">
        <td colspan="100%">
            <button class="btn btn-sm btn-dark me-2" wire:click="view({{ $buyDomainHosting->id }})" wire:loading.attr="disabled">
                <i class="fas fa-eye me-1"></i>
                {{ trans("index.view") }}
                <div wire:loading wire:target="view({{ $buyDomainHosting->id }})"><i class="fas fa-spinner fa-spin"></i></div>
            </button>

            @if ($pageType == "index")
                @can("{$pageName} Clone")
                    <button class="btn btn-sm btn-info text-white me-2" wire:click="clone({{ $buyDomainHosting->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-clipboard me-1"></i>
                        {{ trans("index.clone") }}
                        <div wire:loading wire:target="clone({{ $buyDomainHosting->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                @endcan

                @can("{$pageName} Edit")
                    <button class="btn btn-sm btn-success me-2" wire:click="edit({{ $buyDomainHosting->id }})" wire:loading.attr="disabled">
                        <i class="fas fa-pencil me-1"></i>
                        {{ trans("index.edit") }}
                        <div wire:loading wire:target="edit({{ $buyDomainHosting->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                @endcan

                @can("{$pageName} Delete")
                    <button class="btn btn-sm btn-danger me-2" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $buyDomainHosting->id }}">
                        <i class="fas fa-trash me-1"></i>
                        {{ trans("index.delete") }}
                    </button>

                    <div class="modal fade" id="delete-{{ $buyDomainHosting->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ trans("index.delete") }} - {{ $pageTitle }}</h6>
                                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                </div>
                                <div class="modal-body text-wrap">
                                    <p>{{ trans("index.are_you_sure_you_want_to_delete") }} {{ $pageTitle }}</p>
                                    <p class="mb-0">{{ trans("index.you_can_still_restore_from_trash") }}</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i>
                                        {{ trans("index.close") }}
                                    </button>
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $buyDomainHosting->id }})">
                                        <i class="fas fa-check me-1"></i>
                                        {{ trans("index.yes") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            @endif

            @if ($buyDomainHosting->trashed())
                @can("{$pageName} Restore")
                    <button class="btn btn-sm btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $buyDomainHosting->id }}">
                        <i class="fas fa-recycle me-1"></i>
                        {{ trans("index.restore") }}
                    </button>

                    <div class="modal fade" id="restore-{{ $buyDomainHosting->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $buyDomainHosting->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="restore-{{ $buyDomainHosting->id }}">{{ trans("index.restore") }} - {{ $pageTitle }}</h6>
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
                                    <button class="btn btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $buyDomainHosting->id }})">
                                        <i class="fas fa-check me-1"></i>
                                        {{ trans("index.yes") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan

                @can("{$pageName} Delete Permanent")
                    <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $buyDomainHosting->id }}">
                        <i class="fas fa-dumpster me-1"></i>
                        {{ trans("index.delete_permanent") }}
                    </button>

                    <div class="modal fade" id="delete-permanent-{{ $buyDomainHosting->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $buyDomainHosting->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="delete-permanent-{{ $buyDomainHosting->id }}">{{ trans("index.delete_permanent") }} - {{ $pageTitle }}</h6>
                                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                </div>
                                <div class="modal-body text-wrap">
                                    <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent") }} {{ $pageTitle }}</p>
                                    <p>{{ trans("index.you_cant_undo_this_action_or_restore_this_data_anymore") }}</p>
                                    <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i>
                                        {{ trans("index.close") }}
                                    </button>
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $buyDomainHosting->id }})">
                                        <i class="fas fa-check me-1"></i>
                                        {{ trans("index.yes") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            @endif
        </td>
    </tr>
</div>
