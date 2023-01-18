<div>
    <div class="row">
        @if ($pageType == "index")

            @can("{$pageName} Add")
                <div class="col-6 col-sm-auto mb-3">
                    <button type="button" class="btn btn-primary w-100" wire:click="add" wire:loading.attr="disabled">
                        <i class="fas fa-plus me-1"></i>
                        {{ trans("index.add") }}
                        <div wire:loading wire:target="add"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Trash")
                <div class="col-6 col-sm-auto mb-3">
                    <button type="button" class="btn btn-warning text-white w-100" wire:click="trash" wire:loading.attr="disabled">
                        <i class="fas fa-trash me-1"></i>
                        {{ trans("index.trash") }}
                        <div wire:loading wire:target="trash"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan
        @else
            <div class="col-6 col-sm-auto mb-3">
                <button type="button" class="btn btn-light w-100" wire:click="index" wire:loading.attr="disabled">
                    <i class="fas fa-arrow-left me-1"></i>
                    {{ trans("index.back") }}
                    <div wire:loading wire:target="index"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
            @if ($pageType != "index" && $pageType != "trash")
                <div class="col-6 col-sm-auto mb-3">
                    <button type="button" class="btn btn-primary w-100" wire:click="refresh" wire:loading.attr="disabled">
                        <i class="fas fa-sync fa-spin me-1"></i>
                        {{ trans("index.refresh") }}
                        <div wire:loading wire:target="refresh"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endif
        @endif

        @if ($pageType == "index" || $pageType == "trash")
            <div class="col-6 col-sm-auto mb-3">
                <button type="button" class="btn btn-info text-white w-100" wire:click="resetFilter" wire:loading.attr="disabled">
                    <i class="fas fa-eraser me-1"></i>
                    {{ trans("index.reset_filter") }}
                    <div wire:loading wire:target="resetFilter"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>

            @can("{$pageName} Export To Excel")
                <div class="col-12 col-sm-auto mb-3">
                    <button type="button" class="btn btn-success w-100" wire:click="exportToExcel" wire:loading.attr="disabled" {{ !$blogs->count() ? "disabled" : null }}>
                        <i class="fas fa-file-excel me-1"></i>
                        {{ trans("index.export_to_excel") }}
                        <div wire:loading wire:target="exportToExcel"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Export To PDF")
                <div class="col-12 col-sm-auto mb-3">
                    <button type="button" class="btn btn-danger w-100" wire:click="exportToPdf" wire:loading.attr="disabled" {{ !$blogs->count() ? "disabled" : null }}>
                        <i class="fas fa-file-pdf me-1"></i>
                        {{ trans("index.export_to_pdf") }}
                        <div wire:loading wire:target="exportToPdf"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan
        @endif

        @if ($pageType == "trash")
            @can("{$pageName} Restore")
                <div class="col-12 col-sm-auto mb-3">
                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#restore-all" {{ !$blogs->count() ? "disabled" : null }}>
                        <i class="fas fa-recycle me-1"></i>
                        {{ trans("index.restore_all") }}
                    </button>
                </div>

                <div class="modal fade" id="restore-all" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-all" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{ trans("index.restore_all") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("index.are_you_sure_you_want_to_restore_all") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal" wire:click="restoreAll">
                                    <i class="fas fa-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can("{$pageName} Delete Permanent")
                <div class="col-12 col-sm-auto mb-3">
                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#delete-permanent-all" {{ !$blogs->count() ? "disabled" : null }}>
                        <i class="fas fa-dumpster me-1"></i>
                        {{ trans("index.delete_permanent_all") }}
                    </a>
                </div>

                <div class="modal fade" id="delete-permanent-all" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-all" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{ trans("index.delete_permanent_all") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.are_you_sure_you_want_to_delete_permanently_all") }}</p>
                                <p>{{ trans("index.you_cant_undo_this_action_or_restore_this_data_anymore") }}</p>
                                <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="deletePermanentAll">
                                    <i class="fas fa-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        @endif
    </div>
</div>
