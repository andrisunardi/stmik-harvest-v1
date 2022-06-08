<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("field.#") }}</th>
                <th>{{ trans("field.ID") }}</th>
                <th>{{ trans("field.Image") }}</th>
                <th>{{ trans("field.News Category") }}</th>
                <th>{{ trans("field.Name") }}</th>
                <th>{{ trans("field.Name ID") }}</th>
                <th>{{ trans("field.Date") }}</th>
                <th>{{ trans("field.Tag") }}</th>
                <th>{{ trans("field.Tag ID") }}</th>
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
            @foreach ($data_news as $news)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $news->id }}"></td>
                    <td class="text-center">{{ (($data_news->currentPage() - 1) * $data_news->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $news->id }})">
                            {{ $news->id }}
                        </button>
                    </td>
                    <td>
                        @if ($news->checkImage())
                            <a draggable="false" href="#image-{{ $news->id }}" data-bs-toggle="modal">
                                <img draggable="false" width="100"
                                    src="{{ $news->assetImage() }}"
                                    alt="{{ trans("page.{$menu_name}") }} - {{ $news->translate_name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $news->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $news->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $news->id }}">{{ trans("general.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $news->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $news->assetImage() }}"
                                                    alt="{{ trans("page.{$menu_name}") }} - {{ $news->translate_name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("button.Close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $news->assetImage() }}" download>
                                                <i class="bi bi-download me-1"></i>
                                                {{ trans("button.Download") }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        <a draggable="false" href="{{ $news->news_category?->id ? route("{$sub_domain}.news-category.index") . "?menu_type=view&row={$news->news_category?->id}" : null }}" target="_blank">
                            {{ $news->news_category?->translate_name }}
                        </a>
                        <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$news->news_category?->id}" }}" class="btn btn-link btn-sm" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$news->id}" }}">
                            {{ $news->name }}
                        </a>
                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["news_slug" => $news->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$news->id}" }}">
                            {{ $news->name_id }}
                        </a>
                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["news_slug" => $news->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        @if ($news->date && $news->date != "0000-00-00")
                            {{ Date::parse($news->date)->format("d F Y") }}
                            ({{ Date::parse($news->date)->diffForHumans() }})
                        @endif
                    </td>
                    <td>
                        @foreach ($news->data_tag() as $tag)
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($tag) }}">{{ $tag }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($news->data_tag_id() as $tag_id)
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?search=" . Str::slug($tag_id) }}">{{ $tag_id }}</a>
                        @endforeach
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($news->active) }}">
                            {{ trans("general." . Str::active($news->active)) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $news->created_by_admin?->id || $news->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $news->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $news->updated_by_admin?->id || $news->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $news->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $news->deleted_by_admin?->id || $news->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $news->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $news->created_at?->format("H:i:s - l, d F Y") }} ({{ $news->created_at?->diffForHumans() }})</td>
                    <td>{{ $news->updated_at?->format("H:i:s - l, d F Y") }} ({{ $news->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $news->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $news->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($news->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $news->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("button.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $news->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("button.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $news->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("button.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $news->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("button.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $news->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("button.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $news->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("button.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $news->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $news->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $news->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $news->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $news->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("button.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $news->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $news->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $news->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $news->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $news->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("button.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $news->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $news->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $news->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $news->id }})">
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
            @if (!$data_news->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_news->links("{$sub_domain}.layouts.pagination") }}
