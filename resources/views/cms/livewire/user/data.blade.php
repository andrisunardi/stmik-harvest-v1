<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.id") }}</th>
                <th>{{ trans("index.name") }}</th>
                <th>{{ trans("index.email") }}</th>
                <th>{{ trans("index.active") }}</th>
                <th>{{ trans("index.total") }} {{ trans("index.Repository") }}</th>
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
            @foreach ($data_user as $user)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $user->id }}"></td>
                    <td class="text-center">{{ (($data_user->currentPage() - 1) * $data_user->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $user->id }})">
                            {{ $user->id }}
                        </button>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->id}" }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td><a draggable="false" href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($user->active) }}">
                            {{ trans("index." . Str::slug(Str::active($user->active), '_')) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $user->id }})">
                            {{ $user->data_repository->count() }}
                        </button>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $user->created_by_admin->id || $user->created_by?->id == 0 ? route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->created_by?->id}" : null }}" target="_blank">
                            {{ $user->created_by?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $user->updated_by?->id || $user->updated_by?->id == 0 ? route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->updated_by?->id}" : null }}" target="_blank">
                            {{ $user->updated_by?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $user->deleted_by?->id || $user->deleted_by?->id == 0 ? route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->deleted_by?->id}" : null }}" target="_blank">
                                {{ $user->deleted_by?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $user->created_at?->format("H:i:s - l, d F Y") }} ({{ $user->created_at?->diffForHumans() }})</td>
                    <td>{{ $user->updated_at?->format("H:i:s - l, d F Y") }} ({{ $user->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $user->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $user->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($user->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $user->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("index.non_active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $user->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $user->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.view") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $user->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $user->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $user->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $user->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $user->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $user->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $user->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $user->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $user->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.delete_permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $user->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                                            <p class="mb-0">{{ trans("index.all_relation_data_and_files_will_be_deleted_forever_from_server") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $user->id }})">
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
            @if (!$data_user->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_user->links("{$sub_domain}.layouts.pagination") }}
