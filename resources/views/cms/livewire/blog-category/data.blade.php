<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.id") }}</th>
                <th>{{ trans("index.name") }}</th>
                <th>{{ trans("index.name_id") }}</th>
                <th>{{ trans("index.total") }} {{ trans("index.blog") }}</th>
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
            @foreach ($data_blog_category as $blog_category)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $blog_category->id }}"></td>
                    <td class="text-center">{{ (($data_blog_category->currentPage() - 1) * $data_blog_category->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $blog_category->id }})">
                            {{ $blog_category->id }}
                        </button>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$blog_category->id}" }}">
                            {{ $blog_category->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$blog_category->id}" }}">
                            {{ $blog_category->name_id }}
                        </a>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $blog_category->id }})">
                            {{ $blog_category->data_blog->count() }}
                        </button>
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($blog_category->active) }}">
                            {{ trans("index." . Str::slug(Str::active($blog_category->active), '_')) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $blog_category->created_by?->id || $blog_category->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog_category->created_by?->id}" : null }}" target="_blank">
                            {{ $blog_category->created_by?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $blog_category->updated_by?->id || $blog_category->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog_category->updated_by?->id}" : null }}" target="_blank">
                            {{ $blog_category->updated_by?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $blog_category->deleted_by?->id || $blog_category->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog_category->deleted_by?->id}" : null }}" target="_blank">
                                {{ $blog_category->deleted_by?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $blog_category->created_at?->format("H:i:s - l, d F Y") }} ({{ $blog_category->created_at?->diffForHumans() }})</td>
                    <td>{{ $blog_category->updated_at?->format("H:i:s - l, d F Y") }} ({{ $blog_category->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $blog_category->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $blog_category->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($blog_category->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $blog_category->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("index.non_active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $blog_category->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $blog_category->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.view") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $blog_category->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $blog_category->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $blog_category->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $blog_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $blog_category->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $blog_category->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $blog_category->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $blog_category->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $blog_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $blog_category->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $blog_category->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $blog_category->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $blog_category->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.delete_permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $blog_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $blog_category->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $blog_category->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $blog_category->id }})">
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
            @if (!$data_blog_category->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_blog_category->links("{$sub_domain}.layouts.pagination") }}
