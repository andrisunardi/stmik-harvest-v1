<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("field.#") }}</th>
                <th>{{ trans("field.ID") }}</th>
                <th>{{ trans("field.Image") }}</th>
                <th>{{ trans("field.Code") }}</th>
                <th>{{ trans("field.Name") }}</th>
                <th>{{ trans("field.Job") }}</th>
                <th>{{ trans("field.Phone") }}</th>
                <th>{{ trans("field.Email") }}</th>
                <th>{{ trans("field.Facebook") }}</th>
                <th>{{ trans("field.Twitter") }}</th>
                <th>{{ trans("field.Instagram") }}</th>
                <th>{{ trans("field.Linkedin") }}</th>
                <th>{{ trans("field.Scholar") }}</th>
                <th>{{ trans("field.Active") }}</th>
                <th>{{ trans("field.Total") }} {{ trans("field.Lecturer Education") }}</th>
                <th>{{ trans("field.Total") }} {{ trans("field.Lecturer Work Experience") }}</th>
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
            @foreach ($data_lecturer as $lecturer)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $lecturer->id }}"></td>
                    <td class="text-center">{{ (($data_lecturer->currentPage() - 1) * $data_lecturer->perPage()) + $loop->iteration }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $lecturer->id }})">
                            {{ $lecturer->id }}
                        </button>
                    </td>
                    <td>
                        @if ($lecturer->checkImage())
                            <a draggable="false" href="#image-{{ $lecturer->id }}" data-bs-toggle="modal">
                                <img draggable="false" width="100"
                                    src="{{ $lecturer->assetImage() }}"
                                    alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image-{{ $lecturer->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image-{{ $lecturer->id }}">{{ trans("general.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $lecturer->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $lecturer->assetImage() }}"
                                                    alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("general.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("button.Close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $lecturer->assetImage() }}" download>
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
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$lecturer->id}" }}">
                            {{ $lecturer->code }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$lecturer->id}" }}">
                            {{ $lecturer->name }}
                        </a>
                    </td>
                    <td>{{ $lecturer->job }}</td>
                    <td><a draggable="false" href="tel+:{{ Str::phone($lecturer->phone) }}">{{ $lecturer->phone }}</a></td>
                    <td><a draggable="false" href="mailto:{{ $lecturer->email }}">{{ $lecturer->email }}</a></td>
                    <td><a draggable="false" href="{{ $lecturer->facebook }}" target="_blank">{{ $lecturer->facebook }}</a></td>
                    <td><a draggable="false" href="{{ $lecturer->twitter }}" target="_blank">{{ $lecturer->twitter }}</a></td>
                    <td><a draggable="false" href="{{ $lecturer->instagram }}" target="_blank">{{ $lecturer->instagram }}</a></td>
                    <td><a draggable="false" href="{{ $lecturer->linkedin }}" target="_blank">{{ $lecturer->linkedin }}</a></td>
                    <td><a draggable="false" href="{{ $lecturer->scholar }}" target="_blank">{{ $lecturer->scholar }}</a></td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($lecturer->active) }}">
                            {{ trans("general." . Str::active($lecturer->active)) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $lecturer->id }})">
                            {{ $lecturer->data_lecturer_education->count() }}
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $lecturer->id }})">
                            {{ $lecturer->data_lecturer_work_experience->count() }}
                        </button>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $lecturer->created_by_admin?->id || $lecturer->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $lecturer->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $lecturer->updated_by_admin?->id || $lecturer->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $lecturer->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $lecturer->deleted_by_admin?->id || $lecturer->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$lecturer->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $lecturer->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $lecturer->created_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer->created_at?->diffForHumans() }})</td>
                    <td>{{ $lecturer->updated_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $lecturer->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $lecturer->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($lecturer->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $lecturer->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("button.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $lecturer->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("button.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $lecturer->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("button.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $lecturer->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("button.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $lecturer->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("button.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $lecturer->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("button.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $lecturer->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $lecturer->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $lecturer->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $lecturer->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("button.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $lecturer->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $lecturer->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $lecturer->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $lecturer->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("button.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $lecturer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $lecturer->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $lecturer->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $lecturer->id }})">
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
            @if (!$data_lecturer->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_lecturer->links("{$sub_domain}.layouts.pagination") }}
