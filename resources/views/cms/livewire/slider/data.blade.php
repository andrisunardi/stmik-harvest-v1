<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.id") }}</th>
                <th>{{ trans("index.image") }}</th>
                <th>{{ trans("index.name") }}</th>
                <th>{{ trans("index.name_id") }}</th>
                <th>{{ trans("index.button_name") }}</th>
                <th>{{ trans("index.button_name_id") }}</th>
                <th>{{ trans("index.button_link") }}</th>
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
                                    alt="{{ $slider->altImage() }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.click_to_view") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $slider->id }}">{{ trans("index.image") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $slider->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $slider->assetImage() }}"
                                                    alt="{{ $slider->altImage() }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.click_to_view") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $slider->assetImage() }}" download>
                                                <i class="bi bi-download me-1"></i>
                                                {{ trans("index.download") }}
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
                            {{ trans("index." . Str::slug(Str::active($slider->active), '_')) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $slider->created_by?->id || $slider->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$slider->created_by?->id}" : null }}" target="_blank">
                            {{ $slider->created_by?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $slider->updated_by?->id || $slider->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$slider->updated_by?->id}" : null }}" target="_blank">
                            {{ $slider->updated_by?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $slider->deleted_by?->id || $slider->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$slider->deleted_by?->id}" : null }}" target="_blank">
                                {{ $slider->deleted_by?->name }}
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
                                    {{ trans("index.non_active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $slider->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $slider->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.view") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $slider->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $slider->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $slider->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $slider->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("index.are_you_sure_you_want_to_delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p class="mb-0">{{ trans("index.you_can_still_restore_from_trash") }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $slider->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $slider->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $slider->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">{{ trans("index.are_you_sure_you_want_to_restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $slider->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $slider->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.delete_permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $slider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $slider->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $slider->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p>{{ trans("index.you_cant_undo_this_action_or_restore_this_data_anymore") }}</p>
                                            <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $slider->id }})">
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
            @if (!$data_slider->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_slider->links("{$sub_domain}.layouts.pagination") }}
