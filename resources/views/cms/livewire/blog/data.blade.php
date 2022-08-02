<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.ID") }}</th>
                <th>{{ trans("index.Image") }}</th>
                <th>{{ trans("index.News Category") }}</th>
                <th>{{ trans("index.Name") }}</th>
                <th>{{ trans("index.Name ID") }}</th>
                <th>{{ trans("index.Date") }}</th>
                <th>{{ trans("index.Tag") }}</th>
                <th>{{ trans("index.Tag ID") }}</th>
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
            @foreach ($data_blog as $blog)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $blog->id }}"></td>
                    <td class="text-center">{{ (($data_blog->currentPage() - 1) * $data_blog->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $blog->id }})">
                            {{ $blog->id }}
                        </button>
                    </td>
                    <td>
                        @if ($blog->checkImage())
                            <a draggable="false" href="#image-{{ $blog->id }}" data-bs-toggle="modal">
                                <img draggable="false" width="100"
                                    src="{{ $blog->assetImage() }}"
                                    alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $blog->translate_name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $blog->id }}">{{ trans("index.Image") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $blog->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $blog->assetImage() }}"
                                                    alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $blog->translate_name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $blog->assetImage() }}" download>
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
                        @if ($blog->blog_category)
                            <a draggable="false" href="{{ route("{$sub_domain}.blog-category.index") . "?menu_type=view&row={$blog->blog_category->id}" }}" target="_blank">
                                {{ $blog->blog_category->translate_name }}
                            </a>
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$blog->blog_category->id}" }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @endif
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$blog->id}" }}">
                            {{ $blog->name }}
                        </a>
                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$blog->id}" }}">
                            {{ $blog->name_id }}
                        </a>
                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        @if ($blog->date && $blog->date != "0000-00-00")
                            {{ Date::parse($blog->date)->format("d F Y") }}
                            ({{ Date::parse($blog->date)->diffForHumans() }})
                        @endif
                    </td>
                    <td>
                        @foreach ($blog->data_tag() as $tag)
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($tag) }}">{{ $tag }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($blog->data_tag_id() as $tag_id)
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($tag_id) }}">{{ $tag_id }}</a>
                        @endforeach
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($blog->active) }}">
                            {{ trans("index." . Str::slug(Str::active($blog->active), '_')) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $blog->created_by?->id || $blog->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog->created_by?->id}" : null }}" target="_blank">
                            {{ $blog->created_by?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $blog->updated_by?->id || $blog->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog->updated_by?->id}" : null }}" target="_blank">
                            {{ $blog->updated_by?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $blog->deleted_by?->id || $blog->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog->deleted_by?->id}" : null }}" target="_blank">
                                {{ $blog->deleted_by?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $blog->created_at?->format("H:i:s - l, d F Y") }} ({{ $blog->created_at?->diffForHumans() }})</td>
                    <td>{{ $blog->updated_at?->format("H:i:s - l, d F Y") }} ({{ $blog->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $blog->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $blog->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($blog->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $blog->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("index.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $blog->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $blog->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $blog->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $blog->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $blog->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $blog->id }}">{{ trans("index.Delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $blog->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $blog->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $blog->id }}">{{ trans("index.Restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $blog->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $blog->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $blog->id }}">{{ trans("index.Delete Permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $blog->id }})">
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
            @if (!$data_blog->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_blog->links("{$sub_domain}.layouts.pagination") }}
