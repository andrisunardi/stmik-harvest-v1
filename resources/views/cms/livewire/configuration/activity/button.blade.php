<div class="row">
    <div class="col-6 col-sm-auto mb-3">
        <button type="button" class="btn btn-primary w-100" wire:click="refresh" wire:loading.attr="disabled">
            <i class="fas fa-sync fa-spin me-1"></i>
            {{ trans("index.refresh") }}
            <div wire:loading wire:target="refresh"><i class="fas fa-spinner fa-spin"></i></div>
        </button>
    </div>

    <div class="col-6 col-sm-auto mb-3">
        <button type="button" class="btn btn-info text-white w-100" wire:click="resetFilter" wire:loading.attr="disabled">
            <i class="fas fa-eraser me-1"></i>
            {{ trans("index.reset_filter") }}
            <div wire:loading wire:target="resetFilter"><i class="fas fa-spinner fa-spin"></i></div>
        </button>
    </div>
</div>
