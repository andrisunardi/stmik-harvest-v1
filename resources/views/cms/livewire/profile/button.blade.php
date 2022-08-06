<div>
    <div class="row mb-4">
        @if ($menu_type == "index")
            <div class="col-auto">
                <a draggable="false" class="btn btn-creative btn-info w-100" wire:click="editProfile">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.edit_profile") }}
                </a>
            </div>
            <div class="col-auto">
                <a draggable="false" class="btn btn-creative btn-success w-100" wire:click="changePassword">
                    <i class="bi bi-lock me-1"></i>
                    {{ trans("index.change_password") }}
                </a>
            </div>
        @else
            <div class="col-12 col-sm-auto">
                <a draggable="false" class="btn btn-creative btn-light w-100" wire:click="index">
                    <i class="bi bi-arrow-left me-1"></i>
                    {{ trans("index.back") }}
                </a>
            </div>
        @endif
    </div>
</div>
