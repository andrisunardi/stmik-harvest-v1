<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $value->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $value->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Name ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $value->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($value->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($value->description_id) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Icon") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <i class="{{ $value->icon }}"></i> ({{ $value->icon }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($value->active) }}">
                {{ trans("index." . Str::active($value->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $value->created_by_admin?->id || $value->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$value->created_by_admin?->id}" : null }}" target="_blank">
                {{ $value->created_by_admin?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $value->updated_by_admin?->id || $value->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$value->updated_by_admin?->id}" : null }}" target="_blank">
                {{ $value->updated_by_admin?->name }}
            </a>
        </div>
    </div>
    @if ($value->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $value->deleted_by_admin?->id || $value->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$value->deleted_by_admin?->id}" : null }}" target="_blank">
                    {{ $value->deleted_by_admin?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $value->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $value->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $value->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $value->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($value->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $value->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $value->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif

    <div class="row my-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>{{ trans("index.#") }}</th>
                            <th>{{ trans("index.ID") }}</th>
                            <th>{{ trans("index.Name") }}</th>
                            <th>{{ trans("index.Name ID") }}</th>
                            <th>{{ trans("index.Active") }}</th>
                            <th>{{ trans("index.Created By") }}</th>
                            <th>{{ trans("index.Updated By") }}</th>
                            <th>{{ trans("index.Deleted By") }}</th>
                            <th>{{ trans("index.Created At") }}</th>
                            <th>{{ trans("index.Updated At") }}</th>
                            <th>{{ trans("index.Deleted At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($value->data_faq as $faq)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.faq.index") . "?menu_type=view&row={$faq->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.faq.index") . "?menu_type=view&row={$faq->id}" }}" target="_blank">
                                        {{ $faq->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.faq.index") . "?menu_type=view&row={$faq->id}" }}" target="_blank">
                                        {{ $faq->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.faq.index") . "?menu_type=view&row={$faq->id}" }}" target="_blank">
                                        {{ $faq->name_id }}
                                    </a>
                                </td>
                                <td>
                                    <span class="{{ "badge bg-" . Str::successdanger($faq->active) }}">
                                        {{ trans("index." . Str::active($faq->active), '_')) }}
                                    </span>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $faq->created_by_admin?->id || $faq->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$faq->created_by_admin?->id}" : null }}" target="_blank">
                                        {{ $faq->created_by_admin?->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $faq->updated_by_admin?->id || $faq->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$faq->updated_by_admin?->id}" : null }}" target="_blank">
                                        {{ $faq->updated_by_admin?->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $faq->deleted_by_admin?->id || $faq->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$faq->deleted_by_admin?->id}" : null }}" target="_blank">
                                        {{ $faq->deleted_by_admin?->name }}
                                    </a>
                                </td>
                                <td>{{ $faq->created_at?->format("H:i:s - l, d F Y") }} ({{ $faq->created_at?->diffForHumans() }})</td>
                                <td>{{ $faq->updated_at?->format("H:i:s - l, d F Y") }} ({{ $faq->updated_at?->diffForHumans() }})</td>
                                <td>{{ $faq->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $faq->deleted_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$value->data_faq->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("index.No Data Available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row my-2">
        @if ($value->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $value->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("index.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $value->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $value->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $value->id }}">{{ trans("index.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("message.Are you sure you want to restore") }} {{ trans("page.{$menu_name}") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $value->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $value->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("index.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $value->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $value->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $value->id }}">{{ trans("index.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("message.Are you sure you want to delete permanent") }} {{ trans("page.{$menu_name}") }}</p>
                                <p>{{ trans("message.You cant undo this action or restore this data anymore") }}</p>
                                <p class="mb-0">{{ trans("message.All relation data and files will be deleted forever from server") }}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $value->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $value->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $value->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $value->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $value->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("index.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $value->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $value->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $value->id }}">{{ trans("index.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("message.Are you sure you want to delete") }} {{ trans("page.{$menu_name}") }}</p>
                                <p class="mb-0">{{ trans("message.You can still restore from Trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $value->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
