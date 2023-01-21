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
        @else
            <div class="col-6 col-sm-auto mb-3">
                <button type="button" class="btn btn-light w-100" wire:click="index" wire:loading.attr="disabled">
                    <i class="fas fa-arrow-left me-1"></i>
                    {{ trans("index.back") }}
                    <div wire:loading wire:target="index"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
            @if ($pageType != "index")
                <div class="col-6 col-sm-auto mb-3">
                    <button type="button" class="btn btn-primary w-100" wire:click="refresh" wire:loading.attr="disabled">
                        <i class="fas fa-sync fa-spin me-1"></i>
                        {{ trans("index.refresh") }}
                        <div wire:loading wire:target="refresh"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endif
        @endif

        @if ($pageType == "index")
            <div class="col-6 col-sm-auto mb-3">
                <button type="button" class="btn btn-info text-white w-100" wire:click="resetFilter" wire:loading.attr="disabled">
                    <i class="fas fa-eraser me-1"></i>
                    {{ trans("index.reset_filter") }}
                    <div wire:loading wire:target="resetFilter"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>

            @can("{$pageName} Export To Excel")
                <div class="col-12 col-sm-auto mb-3">
                    <button type="button" class="btn btn-success w-100" wire:click="exportToExcel" wire:loading.attr="disabled" {{ !$roles->count() ? "disabled" : null }}>
                        <i class="fas fa-file-excel me-1"></i>
                        {{ trans("index.export_to_excel") }}
                        <div wire:loading wire:target="exportToExcel"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan

            @can("{$pageName} Export To PDF")
                <div class="col-12 col-sm-auto mb-3">
                    <button type="button" class="btn btn-danger w-100" wire:click="exportToPdf" wire:loading.attr="disabled" {{ !$roles->count() ? "disabled" : null }}>
                        <i class="fas fa-file-pdf me-1"></i>
                        {{ trans("index.export_to_pdf") }}
                        <div wire:loading wire:target="exportToPdf"><i class="fas fa-spinner fa-spin"></i></div>
                    </button>
                </div>
            @endcan
        @endif
    </div>
</div>
