<div class="row mb-3">
    <div class="col-6 col-sm-auto">
        <a draggable="false" class="btn btn-creative btn-danger w-100" wire:click="deleteRow()">
            <i class="bi bi-trash me-1"></i>
            {{ trans("index.Delete Row") }}
        </a>
    </div>
    <div class="col-6 col-sm-auto">
        <a draggable="false" class="btn btn-creative btn-primary w-100" wire:click="refresh()">
            <i class="fas fa-sync fa-spin me-1"></i>
            {{ trans("index.Refresh") }}
        </a>
    </div>
</div>
