<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $event_category->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $event_category->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name_id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $event_category->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($event_category->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($event_category->description_id) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.total") }} {{ trans("index.faq") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $event_category->data_event->count() }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($event_category->active) }}">
                {{ trans("index." . Str::slug(Str::active($event_category->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $event_category->created_by?->id || $event_category->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$event_category->created_by?->id}" : null }}" target="_blank">
                {{ $event_category->created_by?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $event_category->updated_by?->id || $event_category->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$event_category->updated_by?->id}" : null }}" target="_blank">
                {{ $event_category->updated_by?->name }}
            </a>
        </div>
    </div>
    @if ($event_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $event_category->deleted_by?->id || $event_category->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$event_category->deleted_by?->id}" : null }}" target="_blank">
                    {{ $event_category->deleted_by?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $event_category->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $event_category->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $event_category->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $event_category->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($event_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $event_category->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $event_category->deleted_at->diffForHumans() }})
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
                            <th>{{ trans("index.id") }}</th>
                            <th>{{ trans("index.name") }}</th>
                            <th>{{ trans("index.name_id") }}</th>
                            <th>{{ trans("index.Date") }}</th>
                            <th>{{ trans("index.Tag") }}</th>
                            <th>{{ trans("index.Tag ID") }}</th>
                            <th>{{ trans("index.active") }}</th>
                            <th>{{ trans("index.created_by") }}</th>
                            <th>{{ trans("index.updated_by") }}</th>
                            <th>{{ trans("index.created_at") }}</th>
                            <th>{{ trans("index.updated_at") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event_category->data_event as $event)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.event.index") . "?menu_type=view&row={$event->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.event.index") . "?menu_type=view&row={$event->id}" }}" target="_blank">
                                        {{ $event->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.event.index") . "?menu_type=view&row={$event->id}" }}" target="_blank">
                                        {{ $event->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.event.index") . "?menu_type=view&row={$event->id}" }}" target="_blank">
                                        {{ $event->name_id }}
                                    </a>
                                </td>
                                <td>
                                    @if ($event->date && $event->date != "0000-00-00")
                                        {{ Date::parse($event->date)->format("d F Y") }}
                                        ({{ Date::parse($event->date)->diffForHumans() }})
                                    @endif
                                </td>
                                <td>
                                    @foreach ($event->data_tag() as $tag)
                                        <a draggable="false" href="{{ route("event.index") . "?search=" . Str::slug($tag) }}">{{ $tag }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($event->data_tag_id() as $tag_id)
                                        <a draggable="false" href="{{ route("event.index") . "?search=" . Str::slug($tag_id) }}">{{ $tag_id }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    <span class="{{ "badge bg-" . Str::successdanger($event->active) }}">
                                        {{ trans("index." . Str::slug(Str::active($event->active), '_')) }}
                                    </span>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $event->created_by?->id || $event->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$event->created_by?->id}" : null }}" target="_blank">
                                        {{ $event->created_by?->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ $event->updated_by?->id || $event->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$event->updated_by?->id}" : null }}" target="_blank">
                                        {{ $event->updated_by?->name }}
                                    </a>
                                </td>
                                <td>{{ $event->created_at?->format("H:i:s - l, d F Y") }} ({{ $event->created_at?->diffForHumans() }})</td>
                                <td>{{ $event->updated_at?->format("H:i:s - l, d F Y") }} ({{ $event->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$event_category->data_event->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row my-2">
        @if ($event_category->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $event_category->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("index.restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $event_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $event_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $event_category->id }}">{{ trans("index.restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ trans("index.Are you sure you want to restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $event_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $event_category->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("index.delete_permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $event_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $event_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $event_category->id }}">{{ trans("index.delete_permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.Are you sure you want to delete permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
                                <p class="mb-0">{{ trans("index.All relation data and files will be deleted forever from server") }}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $event_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $event_category->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $event_category->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.non_active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $event_category->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $event_category->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("index.delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $event_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $event_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $event_category->id }}">{{ trans("index.delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="{{ trans("index.close") }}"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans("index.Are you sure you want to delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p class="mb-0">{{ trans("index.You can still restore from Trash") }}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    {{ trans("index.close") }}
                                </button>
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $event_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("index.yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
