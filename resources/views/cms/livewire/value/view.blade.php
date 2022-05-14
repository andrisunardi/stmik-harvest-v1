<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $faq_category->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $faq_category->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $faq_category->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($faq_category->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Description ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($faq_category->description_id) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Icon") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <i class="{{ $value->icon }}"></i> ({{ $value->icon }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($faq_category->active) }}">
                {{ trans("general." . Str::active($faq_category->active)) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $faq_category->created_by_admin?->id || $faq_category->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$faq_category->created_by_admin?->id}" : null }}" target="_blank">
                {{ $faq_category->created_by_admin?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $faq_category->updated_by_admin?->id || $faq_category->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$faq_category->updated_by_admin?->id}" : null }}" target="_blank">
                {{ $faq_category->updated_by_admin?->name }}
            </a>
        </div>
    </div>
    @if ($faq_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $faq_category->deleted_by_admin?->id || $faq_category->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$faq_category->deleted_by_admin?->id}" : null }}" target="_blank">
                    {{ $faq_category->deleted_by_admin?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $faq_category->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $faq_category->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $faq_category->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $faq_category->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($faq_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $faq_category->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $faq_category->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif

    <div class="row my-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>{{ trans("field.#") }}</th>
                            <th>{{ trans("field.ID") }}</th>
                            <th>{{ trans("field.Name") }}</th>
                            <th>{{ trans("field.Name ID") }}</th>
                            <th>{{ trans("field.Active") }}</th>
                            <th>{{ trans("field.Created By") }}</th>
                            <th>{{ trans("field.Updated By") }}</th>
                            <th>{{ trans("field.Deleted By") }}</th>
                            <th>{{ trans("field.Created At") }}</th>
                            <th>{{ trans("field.Updated At") }}</th>
                            <th>{{ trans("field.Deleted At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faq_category->data_faq as $faq)
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
                                        {{ trans("general." . Str::active($faq->active)) }}
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
                        @if (!$faq_category->data_faq->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("general.No Data Available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row my-2">
        @if ($faq_category->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $faq_category->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("button.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $faq_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $faq_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $faq_category->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $faq_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $faq_category->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("button.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $faq_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $faq_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $faq_category->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                    {{ trans("button.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $faq_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $faq_category->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("button.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $faq_category->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("button.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $faq_category->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("button.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $faq_category->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("button.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $faq_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $faq_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $faq_category->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("message.Are you sure you want to delete") }} {{ trans("page.{$menu_name}") }}</p>
                                <p class="mb-0">{{ trans("message.You can still restore from Trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("button.Close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $faq_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
