<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("field.#") }}</th>
                <th>{{ trans("field.ID") }}</th>
                <th>{{ trans("field.Image") }}</th>
                <th>{{ trans("field.File") }}</th>
                <th>{{ trans("field.Repository Subject") }}</th>
                <th>{{ trans("field.Study Program") }}</th>
                <th>{{ trans("field.User") }}</th>
                <th>{{ trans("field.Status") }}</th>
                <th>{{ trans("field.Title") }}</th>
                <th>{{ trans("field.Journal Title") }}</th>
                <th>{{ trans("field.Date") }}</th>
                <th>{{ trans("field.Publication Date") }}</th>
                <th>{{ trans("field.First Name") }}</th>
                <th>{{ trans("field.Last Name") }}</th>
                <th>{{ trans("field.Corporate Author") }}</th>
                <th>{{ trans("field.Publisher") }}</th>
                <th>{{ trans("field.Year") }}</th>
                <th>{{ trans("field.Abstrack") }}</th>
                <th>{{ trans("field.URL") }}</th>
                <th>{{ trans("field.Keyword") }}</th>
                <th>{{ trans("field.Volume") }}</th>
                <th>{{ trans("field.Issue") }}</th>
                <th>{{ trans("field.Page") }}</th>
                <th>{{ trans("field.First Page") }}</th>
                <th>{{ trans("field.Last Page") }}</th>
                <th>{{ trans("field.Scholar") }}</th>
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
            @foreach ($data_repository as $repository)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $repository->id }}"></td>
                    <td class="text-center">{{ (($data_repository->currentPage() - 1) * $data_repository->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $repository->id }})">
                            {{ $repository->id }}
                        </button>
                    </td>
                    <td>
                        @if ($repository->checkImage())
                            <a draggable="false" href="#image-{{ $repository->id }}" data-bs-toggle="modal">
                                <img draggable="false" width="100"
                                    src="{{ $repository->assetImage() }}"
                                    alt="{{ trans("page.{$menu_name}") }} - {{ $repository->translate_name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $repository->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $repository->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $repository->id }}">{{ trans("general.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $repository->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $repository->assetImage() }}"
                                                    alt="{{ trans("page.{$menu_name}") }} - {{ $repository->translate_name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("button.Close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $repository->assetImage() }}" download>
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
                        @if ($repository->checkFile())
                            <a draggable="false" class="btn btn-creative btn-sm btn-danger" href="{{ $repository->assetFile() }}" target="_blank">
                                <i class="bi bi-file-pdf me-1"></i>
                                {{ trans("button.View") }}
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($repository->repository_subject?->id)
                            <a draggable="false" href="{{ route("{$sub_domain}.repository-subject.index") . "?menu_type=view&row={$repository->repository_subject?->id}" }}" target="_blank">
                                {{ $repository->repository_subject?->name }}
                            </a>
                            <a draggable="false" href="{{ route("{$menu_slug}.index") . "?subject={$repository->repository_subject?->id}" }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($repository->study_program?->id)
                            <a draggable="false" href="{{ route("{$sub_domain}.study-program.index") . "?menu_type=view&row={$repository->study_program?->id}" }}" target="_blank">
                                {{ $repository->study_program?->translate_name }}
                            </a>
                            <a draggable="false" href="{{ route("study-program.view", ["study_program_slug" => $repository->study_program?->slug]) }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($repository->user?->id)
                            <a draggable="false" href="{{ route("{$sub_domain}.user.index") . "?menu_type=view&row={$repository->user?->id}" }}" target="_blank">
                                {{ $repository->user?->name }}
                            </a>
                        @endif
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::color($repository->status) }}">
                            {{ trans("general.{$repository->status_text}") }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$repository->id}" }}">
                            {{ $repository->title }}
                        </a>
                    </td>
                    <td>{{ $repository->journal_title }}</td>
                    <td>
                        @if ($repository->date && $repository->date != "0000-00-00")
                            {{ Date::parse($repository->date)->format("d F Y") }}
                            ({{ Date::parse($repository->date)->diffForHumans() }})
                        @endif
                    </td>
                    <td>
                        @if ($repository->publication_date && $repository->publication_date != "0000-00-00")
                            {{ Date::parse($repository->publication_date)->format("d F Y") }}
                            ({{ Date::parse($repository->publication_date)->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $repository->first_name }}</td>
                    <td>{{ $repository->last_name }}</td>
                    <td>{{ $repository->corporate_author }}</td>
                    <td>{{ $repository->publisher }}</td>
                    <td>{{ $repository->year }}</td>
                    <td>{{ $repository->abstract }}</td>
                    <td><a draggable="false" href="{{ $repository->url }}" target="_blank">{{ $repository->url }}</a></td>
                    <td>{{ $repository->keyword }}</td>
                    <td>{{ $repository->volume }}</td>
                    <td>{{ $repository->issue }}</td>
                    <td>{{ $repository->page }}</td>
                    <td>{{ $repository->first_page }}</td>
                    <td>{{ $repository->last_page }}</td>
                    <td><a draggable="false" href="{{ $repository->scholar }}" target="_blank">{{ $repository->scholar }}</a></td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($repository->active) }}">
                            {{ trans("general." . Str::active($repository->active)) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $repository->created_by_admin?->id || $repository->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$repository->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $repository->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $repository->updated_by_admin?->id || $repository->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$repository->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $repository->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $repository->deleted_by_admin?->id || $repository->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$repository->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $repository->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $repository->created_at?->format("H:i:s - l, d F Y") }} ({{ $repository->created_at?->diffForHumans() }})</td>
                    <td>{{ $repository->updated_at?->format("H:i:s - l, d F Y") }} ({{ $repository->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $repository->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $repository->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($repository->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $repository->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("button.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $repository->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("button.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $repository->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("button.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $repository->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("button.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $repository->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("button.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $repository->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("button.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $repository->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $repository->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $repository->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $repository->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $repository->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("button.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $repository->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $repository->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $repository->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $repository->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $repository->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("button.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $repository->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $repository->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $repository->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $repository->id }})">
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
            @if (!$data_repository->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_repository->links("{$sub_domain}.layouts.pagination") }}
