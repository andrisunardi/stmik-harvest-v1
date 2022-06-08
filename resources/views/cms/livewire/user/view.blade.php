<div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.ID") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $user->id }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Name") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $user->name }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Email") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Active") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <span class="{{ "badge bg-" . Str::successdanger($user->active) }}">
                {{ trans("general." . Str::active($user->active)) }}
            </span>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Total") }} {{ trans("field.Repository") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $user->data_repository->count() }}
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $user->created_by_admin->id || $user->created_by == 0 ? route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->created_by_admin?->id}" : null }}" target="_blank">
                {{ $user->created_by_admin?->name }}
            </a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated By") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            <a draggable="false" href="{{ $user->updated_by_admin->id || $user->updated_by == 0 ? route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->updated_by_admin?->id}" : null }}" target="_blank">
                {{ $user->updated_by_admin?->name }}
            </a>
        </div>
    </div>
    @if ($user->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted By") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <a draggable="false" href="{{ $user->deleted_by_admin?->id || $user->created_by == 0 ? route("{$sub_domain}.{$menu_slug}.index") . "?menu_type=view&row={$user->deleted_by_admin?->id}" : null }}" target="_blank">
                    {{ $user->deleted_by_admin?->name }}
                </a>
            </div>
        </div>
    @endif
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Created At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $user->created_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $user->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <h6>{{ trans("field.Updated At") }}</h6>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
            {{ $user->updated_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $user->updated_at->diffForHumans() }})
        </div>
    </div>
    @if ($user->trashed())
        <div class="row my-2">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <h6>{{ trans("field.Deleted At") }}</h6>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                {{ $user->deleted_at->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $user->deleted_at->diffForHumans() }})
            </div>
        </div>
    @endif

    <div class="row my-2">
        <div class="col-12">
            <h6>{{ trans("field.Repository") }}</h6>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>{{ trans("field.#") }}</th>
                            <th>{{ trans("field.ID") }}</th>
                            <th>{{ trans("field.Image") }}</th>
                            <th>{{ trans("field.File") }}</th>
                            <th>{{ trans("field.Repository Subject") }}</th>
                            <th>{{ trans("field.Study Program") }}</th>
                            <th>{{ trans("field.Status") }}</th>
                            <th>{{ trans("field.Title") }}</th>
                            <th>{{ trans("field.Journal Title") }}</th>
                            <th>{{ trans("field.Date") }}</th>
                            <th>{{ trans("field.Publication Date") }}</th>
                            <th>{{ trans("field.Corporate Author") }}</th>
                            <th>{{ trans("field.Publisher") }}</th>
                            <th>{{ trans("field.Year") }}</th>
                            {{-- <th>{{ trans("field.Abstract") }}</th> --}}
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
                            <th>{{ trans("field.Created At") }}</th>
                            <th>{{ trans("field.Updated At") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->data_repository as $repository)
                            <tr>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.repository.index") . "?menu_type=view&row={$repository->id}" }}" target="_blank">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route("{$sub_domain}.repository.index") . "?menu_type=view&row={$repository->id}" }}" target="_blank">
                                        {{ $repository->id }}
                                    </a>
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
                                <td>FILE</td>
                                <td>
                                    @if ($repository->repository_subject?->id)
                                        <a draggable="false" href="{{ route("{$sub_domain}.repository-subject.index") . "?menu_type=view&row={$repository->repository_subject?->id}" }}" target="_blank">
                                            {{ $repository->repository_subject?->name }}
                                        </a>
                                        <a draggable="false" href="{{ route("repository.index") . "?subject={$repository->repository_subject->id}" }}" class="btn btn-link btn-sm" target="_blank">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="{{ "badge bg-" . Str::color($repository->status) }}">
                                        {{ trans("general.{$repository->status_text}") }}
                                    </span>
                                </td>
                                <td>{{ $repository->title }}</td>
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
                                <td>{{ $repository->corporate_author }}</td>
                                <td>{{ $repository->publisher }}</td>
                                <td class="text-center">{{ $repository->year }}</td>
                                {{-- <td>{{ $repository->abstract }}</td> --}}
                                <td><a draggable="false" href="{{ $repository->url }}" target="_blank">{{ $repository->url }}</a></td>
                                <td>{{ $repository->keyword }}</td>
                                <td>{{ $repository->volume }}</td>
                                <td>{{ $repository->issue }}</td>
                                <td class="text-center">{{ $repository->page }}</td>
                                <td class="text-center">{{ $repository->first_page }}</td>
                                <td class="text-center">{{ $repository->last_page }}</td>
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
                                <td>{{ $repository->created_at?->format("H:i:s - l, d F Y") }} ({{ $repository->created_at?->diffForHumans() }})</td>
                                <td>{{ $repository->updated_at?->format("H:i:s - l, d F Y") }} ({{ $repository->updated_at?->diffForHumans() }})</td>
                            </tr>
                        @endforeach
                        @if (!$user->data_repository->count())
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
        @if ($user->trashed())
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $user->id }}">
                    <i class="bi bi-arrow-clockwise me-1"></i>
                    {{ trans("button.Restore") }}
                </button>

                <div class="modal fade" id="restore-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="restore-{{ $user->id }}">{{ trans("general.Restore") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $user->id }})">
                                    <i class="bi bi-check me-1"></i>
                                    {{ trans("button.Yes") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $user->id }}">
                    <i class="bi bi-trash2 me-1"></i>
                    {{ trans("button.Delete Permanent") }}
                </button>

                <div class="modal fade" id="delete-permanent-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-permanent-{{ $user->id }}">{{ trans("general.Delete Permanent") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $user->id }})">
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
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="active({{ $user->id }})">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    {{ trans("button.Active") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-creative btn-sm btn-danger w-100" wire:click="nonActive({{ $user->id }})">
                    <i class="bi bi-x-circle-fill me-1"></i>
                    {{ trans("button.Non Active") }}
                </button>
            </div>

            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-success w-100" wire:click="form('edit', {{ $user->id }})">
                    <i class="bi bi-pencil me-1"></i>
                    {{ trans("button.Edit") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                <button class="btn btn-creative btn-sm btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $user->id }}">
                    <i class="bi bi-trash me-1"></i>
                    {{ trans("button.Delete") }}
                </button>

                <div class="modal fade" id="delete-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="delete-{{ $user->id }}">{{ trans("general.Delete") }} - {{ trans("page.{$menu_name}") }}</h6>
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
                                <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $user->id }})">
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
