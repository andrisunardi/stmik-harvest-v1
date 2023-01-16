<div class="row mb-3">
    @can("{$pageName} Delete")
        <div class="col-6 col-sm-auto">
            <button class="btn btn-danger w-100" wire:click="deleteRow" wire:loading.attr="disabled">
                <i class="fas fa-trash me-1"></i>
                {{ trans("index.delete_row") }}
                <div wire:loading wire:target="deleteRow"><i class="fas fa-spinner fa-spin"></i></div>
            </button>
        </div>
    @endcan

    <div class="col-6 col-sm-auto">
        <button class="btn btn-primary w-100" wire:click="refresh" wire:loading.attr="disabled">
            <i class="fas fa-sync fa-spin me-1"></i>
            {{ trans("index.refresh") }}
            <div wire:loading wire:target="refresh"><i class="fas fa-spinner fa-spin"></i></div>
        </button>
    </div>
</div>
