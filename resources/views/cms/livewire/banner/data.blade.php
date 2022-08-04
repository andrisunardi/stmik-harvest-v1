<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.id") }}</th>
                <th>{{ trans("index.Image") }}</th>
                <th>{{ trans("index.name") }}</th>
                <th>{{ trans("index.name_id") }}</th>
                <th>{{ trans("index.active") }}</th>
                <th>{{ trans("index.created_by") }}</th>
                <th>{{ trans("index.updated_by") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("index.deleted_by") }}</th>
                @endif
                <th>{{ trans("index.created_at") }}</th>
                <th>{{ trans("index.updated_at") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("index.deleted_at") }}</th>
                @endif
                <th>{{ trans("index.action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_banner as $banner)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $banner->id }}"></td>
                    <td class="text-center">{{ (($data_banner->currentPage() - 1) * $data_banner->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $banner->id }})">
                            {{ $banner->id }}
                        </button>
                    </td>
                    <td>
                        @if ($banner->checkImage())
                            <a draggable="false" href="#image-{{ $banner->id }}" data-bs-toggle="modal">
                                <img draggable="false" width="100"
                                    src="{{ $banner->assetImage() }}"
                                    alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $banner->translate_name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $banner->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $banner->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $banner->id }}">{{ trans("index.Image") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $banner->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $banner->assetImage() }}"
                                                    alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $banner->translate_name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $banner->assetImage() }}" download>
                                                <i class="bi bi-download me-1"></i>
                                                {{ trans("index.Download") }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$banner->id}" }}">
                            {{ $banner->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$banner->id}" }}">
                            {{ $banner->name_id }}
                        </a>
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($banner->active) }}">
                            {{ trans("index." . Str::slug(Str::active($banner->active), '_')) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $banner->created_by?->id || $banner->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$banner->created_by?->id}" : null }}" target="_blank">
                            {{ $banner->created_by?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $banner->updated_by?->id || $banner->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$banner->updated_by?->id}" : null }}" target="_blank">
                            {{ $banner->updated_by?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $banner->deleted_by?->id || $banner->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$banner->deleted_by?->id}" : null }}" target="_blank">
                                {{ $banner->deleted_by?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $banner->created_at?->format("H:i:s - l, d F Y") }} ({{ $banner->created_at?->diffForHumans() }})</td>
                    <td>{{ $banner->updated_at?->format("H:i:s - l, d F Y") }} ({{ $banner->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $banner->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $banner->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($banner->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $banner->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("index.non_active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $banner->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $banner->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.view") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $banner->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $banner->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $banner->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $banner->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $banner->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $banner->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("index.Are you sure you want to delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p class="mb-0">{{ trans("index.You can still restore from Trash") }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $banner->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $banner->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $banner->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $banner->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $banner->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">{{ trans("index.Are you sure you want to restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $banner->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $banner->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.delete_permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $banner->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $banner->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $banner->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("index.Are you sure you want to delete permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                                            <p class="mb-0">{{ trans("index.All relation data and files will be deleted forever from server") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $banner->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            @if (!$data_banner->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_banner->links("{$sub_domain}.layouts.pagination") }}
