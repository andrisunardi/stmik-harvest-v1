<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.ID") }}</th>
                <th>{{ trans("index.Image") }}</th>
                <th>{{ trans("index.Name") }}</th>
                <th>{{ trans("index.Name ID") }}</th>
                <th>{{ trans("index.Button Name") }}</th>
                <th>{{ trans("index.Button Name ID") }}</th>
                <th>{{ trans("index.Button Link") }}</th>
                <th>{{ trans("index.Active") }}</th>
                <th>{{ trans("index.Created By") }}</th>
                <th>{{ trans("index.Updated By") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("index.Deleted By") }}</th>
                @endif
                <th>{{ trans("index.Created At") }}</th>
                <th>{{ trans("index.Updated At") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("index.Deleted At") }}</th>
                @endif
                <th>{{ trans("index.Action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_slider as $slider)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $slider->id }}"></td>
                    <td class="text-center">{{ (($data_slider->currentPage() - 1) * $data_slider->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $slider->id }})">
                            {{ $slider->id }}
                        </button>
                    </td>
                    <td>
                        @if ($slider->checkImage())
                            <a draggable="false" href="#image-{{ $slider->id }}" data-bs-toggle="modal">
                                <img draggable="false" width="100"
                                    src="{{ $slider->assetImage() }}"
                                    alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $slider->translate_name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $slider->id }}">{{ trans("index.Image") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $slider->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $slider->assetImage() }}"
                                                    alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $slider->translate_name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $slider->assetImage() }}" download>
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
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$slider->id}" }}">
                            {{ $slider->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$slider->id}" }}">
                            {{ $slider->name_id }}
                        </a>
                    </td>
                    <td>{{ $slider->button_name }}</td>
                    <td>{{ $slider->button_name_id }}</td>
                    <td><a draggable="false" href="{{ $slider->button_link }}" target="_blank">{{ $slider->button_link }}</a></td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($slider->active) }}">
                            {{ trans("index." . Str::active($slider->active), '_')) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $slider->created_by_admin?->id || $slider->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$slider->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $slider->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $slider->updated_by_admin?->id || $slider->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$slider->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $slider->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $slider->deleted_by_admin?->id || $slider->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$slider->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $slider->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $slider->created_at?->format("H:i:s - l, d F Y") }} ({{ $slider->created_at?->diffForHumans() }})</td>
                    <td>{{ $slider->updated_at?->format("H:i:s - l, d F Y") }} ({{ $slider->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $slider->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $slider->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($slider->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $slider->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("index.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $slider->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $slider->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $slider->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $slider->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $slider->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $slider->id }}">{{ trans("index.Delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("message.Are you sure you want to delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p class="mb-0">{{ trans("message.You can still restore from Trash") }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $slider->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $slider->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $slider->id }}">{{ trans("index.Restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">{{ trans("message.Are you sure you want to restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $slider->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $slider->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $slider->id }}">{{ trans("index.Delete Permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("message.Are you sure you want to delete permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p>{{ trans("message.You cant undo this action or restore this data anymore") }}</p>
                                            <p class="mb-0">{{ trans("message.All relation data and files will be deleted forever from server") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $slider->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            @if (!$data_slider->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_slider->links("{$sub_domain}.layouts.pagination") }}
