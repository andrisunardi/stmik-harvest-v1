<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("field.#") }}</th>
                <th>{{ trans("field.ID") }}</th>
                <th>{{ trans("field.File") }}</th>
                <th>{{ trans("field.Repository") }}</th>
                <th>{{ trans("field.Name") }}</th>
                <th>{{ trans("field.Public") }}</th>
                <th>{{ trans("field.Active") }}</th>
                <th>{{ trans("field.Created By") }}</th>
                <th>{{ trans("field.Updated By") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("field.Deleted By") }}</th>
                @endif
                <th>{{ trans("field.Created At") }}</th>
                <th>{{ trans("field.Updated At") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("field.Deleted At") }}</th>
                @endif
                <th>{{ trans("field.Action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_repository_file as $repository_file)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $repository_file->id }}"></td>
                    <td class="text-center">{{ (($data_repository_file->currentPage() - 1) * $data_repository_file->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $repository_file->id }})">
                            {{ $repository_file->id }}
                        </button>
                    </td>
                    <td>
                        @if ($repository_file->checkFile())
                            <a draggable="false" class="btn btn-creative btn-sm btn-danger" href="{{ $repository_file->assetFile() }}" target="_blank">
                                <i class="bi bi-file-pdf me-1"></i>
                                {{ trans("button.View") }}
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($repository_file->repository?->id)
                            <a draggable="false" href="{{ route("{$sub_domain}.repository.index") . "?menu_type=view&row={$repository_file->repository?->id}" }}" target="_blank">
                                {{ $repository_file->repository?->title }}
                            </a>
                            <a draggable="false" href="{{ route("repository.view", ["repository_slug" => $repository_file->repository?->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @endif
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$repository_file->id}" }}">
                            {{ $repository_file->name }}
                        </a>
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($repository_file->public) }}">
                            {{ trans("general." . Str::yesno($repository_file->public)) }}
                        </span>
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($repository_file->active) }}">
                            {{ trans("general." . Str::active($repository_file->active)) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $repository_file->created_by_admin?->id || $repository_file->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$repository_file->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $repository_file->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $repository_file->updated_by_admin?->id || $repository_file->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$repository_file->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $repository_file->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $repository_file->deleted_by_admin?->id || $repository_file->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$repository_file->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $repository_file->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $repository_file->created_at?->format("H:i:s - l, d F Y") }} ({{ $repository_file->created_at?->diffForHumans() }})</td>
                    <td>{{ $repository_file->updated_at?->format("H:i:s - l, d F Y") }} ({{ $repository_file->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $repository_file->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $repository_file->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($repository_file->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $repository_file->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("button.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $repository_file->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("button.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $repository_file->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("button.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $repository_file->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("button.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $repository_file->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("button.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $repository_file->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("button.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $repository_file->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $repository_file->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $repository_file->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("message.Are you sure you want to delete") }} {{ trans("page.{$menu_name}") }}</p>
                                            <p class="mb-0">{{ trans("message.You can still restore from Trash") }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("button.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $repository_file->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $repository_file->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("button.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $repository_file->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $repository_file->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $repository_file->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">{{ trans("message.Are you sure you want to restore") }} {{ trans("page.{$menu_name}") }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("button.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $repository_file->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $repository_file->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("button.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $repository_file->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $repository_file->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $repository_file->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("message.Are you sure you want to delete permanent") }} {{ trans("page.{$menu_name}") }}</p>
                                            <p>{{ trans("message.You cant undo this action or restore this data anymore") }}</p>
                                            <p class="mb-0">{{ trans("message.All relation data and files will be deleted forever from server") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("button.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $repository_file->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            @if (!$data_repository_file->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_repository_file->links("{$sub_domain}.layouts.pagination") }}
