<div class="row">
    @if ($menu_type == "index")
        <div class="col-6 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-creative btn-primary w-100" wire:click="form('add', '')">
                <i class="bi bi-plus-lg me-1"></i>
                {{ trans("index.add") }}
            </a>
        </div>

        <div class="col-6 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-creative btn-warning w-100" wire:click="trash">
                <i class="bi bi-trash me-1"></i>
                {{ trans("index.trash") }}
            </a>
        </div>
    @else
        <div class="col-6 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-creative btn-light w-100" wire:click="index">
                <i class="bi bi-arrow-left me-1"></i>
                {{ trans("index.back") }}
            </a>
        </div>
        @if ($menu_type != "index" && $menu_type != "trash")
            <div class="col-6 col-sm-auto mb-3">
                <a draggable="false" class="btn btn-creative btn-primary w-100" wire:click="refresh">
                    <i class="fas fa-sync fa-spin me-1"></i>
                    {{ trans("index.refresh") }}
                </a>
            </div>
        @endif
    @endif

    @if ($menu_type == "index" || $menu_type == "trash")
        <div class="col-6 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-creative btn-info w-100" wire:click="resetFilter">
                <i class="bi bi-arrow-clockwise me-1"></i>
                {{ trans("index.reset_filter") }}
            </a>
        </div>
        <div class="col-12 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-creative btn-success w-100" wire:click="exportToExcel">
                <i class="bi bi-file-excel me-1"></i>
                {{ trans("index.export_to_excel") }}
            </a>
        </div>
        <div class="col-12 col-sm-auto mb-3">
            <a draggable="false" class="btn btn-creative btn-danger w-100" wire:click="exportToPdf">
                <i class="bi bi-file-pdf me-1"></i>
                {{ trans("index.export_to_pdf") }}
            </a>
        </div>
    @endif

    @if ($menu_type == "trash")
        <div class="col-12 col-sm-auto mb-3">
            <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-all">
                <i class="bi bi-arrow-clockwise me-1"></i>
                {{ trans("index.restore_all") }}
            </button>
        </div>

        <div class="modal fade" id="restore-all" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-all" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="restore-all">{{ trans("index.restore_all") }}</h6>
                        <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">{{ trans("index.Are you sure you want to restore all") }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                            <i class="bi bi-x me-1"></i>
                            {{ trans("index.close") }}
                        </button>
                        <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restoreAll">
                            <i class="bi bi-check me-1"></i>
                            {{ trans("index.yes") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-auto mb-3">
            <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-all">
                <i class="bi bi-trash2 me-1"></i>
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
                        <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent all") }}</p>
                        <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                        <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                            <i class="bi bi-x me-1"></i>
                            {{ trans("index.close") }}
                        </button>
                        <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanentAll">
                            <i class="bi bi-check me-1"></i>
                            {{ trans("index.yes") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
