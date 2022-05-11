<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("field.#") }}</th>
                <th>{{ trans("field.ID") }}</th>
                <th>{{ trans("field.Title") }}</th>
                <th>{{ trans("field.Name") }}</th>
                <th>{{ trans("field.Phone") }}</th>
                <th>{{ trans("field.Email") }}</th>
                <th>{{ trans("field.Title") }}</th>
                <th>{{ trans("field.Message") }}</th>
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
            @foreach ($data_news_comment as $news_comment)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $news_comment->id }}"></td>
                    <td class="text-center">{{ (($data_news_comment->currentPage() - 1) * $data_news_comment->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $news_comment->id }})">
                            {{ $news_comment->id }}
                        </button>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $news_comment->news?->id ? route("{$sub_domain}.news.index") . "?menu_type=view&row={$news_comment->news?->id}" : null }}" target="_blank">
                            {{ $news_comment->news?->translate_name }}
                        </a>
                        <a draggable="false" href="{{ route("news.view", ["news_slug" => $news_comment->news?->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$news_comment->id}" }}">
                            {{ $news_comment->name }}
                        </a>
                    </td>
                    <td><a draggable="false" href="tel:+{{ Str::phone($news_comment->phone) }}">{{ $news_comment->phone }}</a></td>
                    <td><a draggable="false" href="mailto:{{ $news_comment->email }}">{{ $news_comment->email }}</a></td>
                    <td>{{ $news_comment->title }}</td>
                    <td>{{ $news_comment->message }}</td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($news_comment->active) }}">
                            {{ trans("general." . Str::active($news_comment->active)) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $news_comment->created_by_admin?->id || $news_comment->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news_comment->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $news_comment->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $news_comment->updated_by_admin?->id || $news_comment->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news_comment->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $news_comment->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $news_comment->deleted_by_admin?->id || $news_comment->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news_comment->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $news_comment->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $news_comment->created_at?->format("H:i:s - l, d F Y") }} ({{ $news_comment->created_at?->diffForHumans() }})</td>
                    <td>{{ $news_comment->updated_at?->format("H:i:s - l, d F Y") }} ({{ $news_comment->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $news_comment->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $news_comment->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($news_comment->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $news_comment->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("button.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $news_comment->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("button.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $news_comment->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("button.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $news_comment->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("button.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $news_comment->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("button.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $news_comment->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("button.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $news_comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $news_comment->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $news_comment->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $news_comment->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $news_comment->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("button.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $news_comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $news_comment->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $news_comment->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $news_comment->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $news_comment->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("button.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $news_comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $news_comment->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $news_comment->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $news_comment->id }})">
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
            @if (!$data_news_comment->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_news_comment->links("{$sub_domain}.layouts.pagination") }}
