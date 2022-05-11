<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $news_category->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $news_category->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $news_category->name_id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Description") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($news_category->description) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Description ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {!! html_entity_decode($news_category->description_id) !!}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Total") }} {{ trans("field.Faq") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $news_category->data_news->count() }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($news_category->active) }}">
                {{ trans("general." . Str::active($news_category->active)) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $news_category->created_by_admin?->id || $news_category->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news_category->created_by_admin?->id}" : null }}" target="_blank">
                {{ $news_category->created_by_admin?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $news_category->updated_by_admin?->id || $news_category->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news_category->updated_by_admin?->id}" : null }}" target="_blank">
                {{ $news_category->updated_by_admin?->name }}
            </a>
        </div>
    </div>
    @if ($news_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $news_category->deleted_by_admin?->id || $news_category->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$news_category->deleted_by_admin?->id}" : null }}" target="_blank">
                    {{ $news_category->deleted_by_admin?->name }}
                    </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $news_category->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $news_category->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $news_category->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $news_category->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($news_category->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $news_category->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $news_category->deleted_at->diffForHumans() }})
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
                            <th>{{ trans("field.Date") }}</th>
                            <th>{{ trans("field.Tag") }}</th>
                            <th>{{ trans("field.Tag ID") }}</th>
                            <th>{{ trans("field.Active") }}</th>
                            <th>{{ trans("field.Created By") }}</th>
                            <th>{{ trans("field.Updated By") }}</th>
                            <th>{{ trans("field.Created At") }}</th>
                            <th>{{ trans("field.Updated At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news_category->data_news as $news)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.news.index") . "?menu_type=view&row={$news->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.news.index") . "?menu_type=view&row={$news->id}" }}" target="_blank">
                                        {{ $news->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.news.index") . "?menu_type=view&row={$news->id}" }}" target="_blank">
                                        {{ $news->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route("{$sub_domain}.news.index") . "?menu_type=view&row={$news->id}" }}" target="_blank">
                                        {{ $news->name_id }}
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
                                        <a draggable="false" href="{{ route("news.index") . "?search=" . Str::slug($tag) }}">{{ $tag }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($news->data_tag_id() as $tag_id)
                                        <a draggable="false" href="{{ route("news.index") . "?search=" . Str::slug($tag_id) }}">{{ $tag_id }}</a>
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
                                <td>{{ $news->created_at?->format("H:i:s - l, d F Y") }} ({{ $news->created_at?->diffForHumans() }})</td>
                                <td>{{ $news->updated_at?->format("H:i:s - l, d F Y") }} ({{ $news->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$news_category->data_news->count())
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
        @if ($news_category->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $news_category->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("button.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $news_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $news_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $news_category->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $news_category->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $news_category->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("button.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $news_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $news_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $news_category->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $news_category->id }})">
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
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $news_category->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("button.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $news_category->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("button.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $news_category->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("button.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $news_category->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("button.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $news_category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $news_category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $news_category->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $news_category->id }})">
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
