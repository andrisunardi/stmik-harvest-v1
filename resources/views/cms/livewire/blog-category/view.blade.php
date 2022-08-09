<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $blog_category->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $blog_category->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.name_id") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $blog_category->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($blog_category->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.Description ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($blog_category->description_id) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.total") }} {{ trans("index.faq") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $blog_category->data_blog->count() }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($blog_category->active) }}">
                {{ trans("index." . Str::slug(Str::active($blog_category->active), '_')) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $blog_category->created_by?->id || $blog_category->created_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog_category->created_by?->id}" : null }}" target="_blank">
                {{ $blog_category->created_by?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_by") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $blog_category->updated_by?->id || $blog_category->updated_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog_category->updated_by?->id}" : null }}" target="_blank">
                {{ $blog_category->updated_by?->name }}
            </a>
        </div>
    </div>
    @if ($blog_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_by") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $blog_category->deleted_by?->id || $blog_category->deleted_by?->id == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$blog_category->deleted_by?->id}" : null }}" target="_blank">
                    {{ $blog_category->deleted_by?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.created_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $blog_category->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $blog_category->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("index.updated_at") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $blog_category->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $blog_category->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($blog_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("index.deleted_at") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $blog_category->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $blog_category->deleted_at->diffForHumans() }})
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
                        @foreach ($blog_category->data_blog as $blog)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.blog.index") . "?menu_type=view&row={$blog->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.blog.index") . "?menu_type=view&row={$blog->id}" }}" target="_blank">
                                        {{ $blog->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.blog.index") . "?menu_type=view&row={$blog->id}" }}" target="_blank">
                                        {{ $blog->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.blog.index") . "?menu_type=view&row={$blog->id}" }}" target="_blank">
                                        {{ $blog->name_id }}
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
                                        <a draggable="false" href="{{ route("blog.index") . "?search=" . Str::slug($tag) }}">{{ $tag }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($blog->data_tag_id() as $tag_id)
                                        <a draggable="false" href="{{ route("blog.index") . "?search=" . Str::slug($tag_id) }}">{{ $tag_id }}</a>
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
                                <td>{{ $blog->created_at?->format("H:i:s - l, d F Y") }} ({{ $blog->created_at?->diffForHumans() }})</td>
                                <td>{{ $blog->updated_at?->format("H:i:s - l, d F Y") }} ({{ $blog->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$blog_category->data_blog->count())
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
        @if ($blog_category->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $blog_category->id }}">
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
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $blog_category->id }}">
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
                            <div class="modal-body">
                                <p>{{ trans("index.are_you_sure_you_want_to_delete_permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                <p>{{ trans("index.You cant undo this action or restore this data anymore") }}</p>
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
            </div>
        @else
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $blog_category->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("index.active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $blog_category->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("index.non_active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $blog_category->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("index.edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $blog_category->id }}">
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
                            <div class="modal-body">
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
            </div>
        @endif
    </div>
</div>
