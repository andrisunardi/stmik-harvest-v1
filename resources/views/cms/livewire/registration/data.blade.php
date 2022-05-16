<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("field.#") }}</th>
                <th>{{ trans("field.ID") }}</th>
                <th>{{ trans("field.Name") }}</th>
                <th>{{ trans("field.Email") }}</th>
                <th>{{ trans("field.Phone") }}</th>
                <th>{{ trans("field.Gender") }}</th>
                <th>{{ trans("field.School") }}</th>
                <th>{{ trans("field.Major") }}</th>
                <th>{{ trans("field.City") }}</th>
                <th>{{ trans("field.Type") }}</th>
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
            @foreach ($data_registration as $registration)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $registration->id }}"></td>
                    <td class="text-center">{{ (($data_registration->currentPage() - 1) * $data_registration->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $registration->id }})">
                            {{ $registration->id }}
                        </button>
                    </td>
                    <td>
                        <a draggable="false" href="{{ route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$registration->id}" }}">
                            {{ $registration->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="">
                            {{ $registration->name_id }}
                        </a>
                    </td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($registration->active) }}">
                            {{ trans("general." . Str::active($registration->active)) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $registration->created_by_admin?->id || $registration->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$registration->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $registration->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $registration->updated_by_admin?->id || $registration->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$registration->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $registration->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $registration->deleted_by_admin?->id || $registration->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$registration->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $registration->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $registration->created_at?->format("H:i:s - l, d F Y") }} ({{ $registration->created_at?->diffForHumans() }})</td>
                    <td>{{ $registration->updated_at?->format("H:i:s - l, d F Y") }} ({{ $registration->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $registration->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $registration->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($registration->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $registration->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("button.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $registration->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("button.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $registration->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("button.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $registration->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("button.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $registration->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("button.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $registration->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("button.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $registration->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $registration->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $registration->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $registration->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $registration->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("button.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $registration->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $registration->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $registration->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $registration->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("button.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $registration->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("button.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $registration->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $registration->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $registration->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $registration->id }})">
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
            @if (!$data_registration->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_registration->links("{$sub_domain}.layouts.pagination") }}
