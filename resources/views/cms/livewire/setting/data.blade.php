<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
        <thead>
            <tr class="bg-primary text-white text-center">
                <th><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                <th>{{ trans("index.#") }}</th>
                <th>{{ trans("index.ID") }}</th>
                <th>{{ trans("index.SMS") }}</th>
                <th>{{ trans("index.Call") }}</th>
                <th>{{ trans("index.Fax") }}</th>
                <th>{{ trans("index.Email") }}</th>
                <th>{{ trans("index.Address") }}</th>
                <th>{{ trans("index.Google Maps") }}</th>
                <th>{{ trans("index.Google Maps Iframe") }}</th>
                <th>{{ trans("index.About Us") }}</th>
                <th>{{ trans("index.About Us ID") }}</th>
                <th>{{ trans("index.Vision") }}</th>
                <th>{{ trans("index.Vision ID") }}</th>
                <th>{{ trans("index.Mission") }}</th>
                <th>{{ trans("index.Mission ID") }}</th>
                <th>{{ trans("index.History") }}</th>
                <th>{{ trans("index.History ID") }}</th>
                <th>{{ trans("index.Active") }}</th>
                <th>{{ trans("index.Created By") }}</th>
                <th>{{ trans("index.Updated By") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("index.Deleted By") }}</th>
                @endif
                <th>{{ trans("index.Created At") }}</th>
                <th>{{ trans("index.Updated At") }}</th>
                @if ($menu_type == "trash")
                    <th>{{ trans("index.Deleted At") }}</th>
                @endif
                <th>{{ trans("index.Action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_setting as $setting)
                <tr>
                    <td><input class="form-check-input" type="checkbox" wire:model="checkbox_id.{{ $setting->id }}"></td>
                    <td class="text-center">{{ (($data_setting->currentPage() - 1) * $data_setting->perPage()) + $loop->iteration }}</td>
                    <td>
                        <button type="button" class="btn btn-link text-decoration-none" wire:click="view({{ $setting->id }})">
                            {{ $setting->id }}
                        </button>
                    </td>
                    <td><a draggable="false" href="sms:+62{{ Str::substr(Str::slug($setting->sms, ""), 1) }}">{{ $setting->sms }}</a></td>
                    <td><a draggable="false" href="tel:+62{{ Str::substr(Str::slug($setting->call, ""), 1) }}">{{ $setting->call }}</a></td>
                    <td><a draggable="false" href="fax:+62{{ Str::substr(Str::slug($setting->sms, ""), 1) }}">{{ $setting->sms }}</a></td>
                    <td><a draggable="false" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></td>
                    <td>{{ $setting->address }}</td>
                    <td><a draggable="false" href="{{ $setting->google_maps }}" target="_blank">{{ $setting->google_maps }}</a></td>
                    <td><iframe src="{{ $setting->google_maps_iframe }}" width="200" height="100" frameborder="0" scrolling="no"></iframe></td>
                    <td>{!! html_entity_decode($setting->about_us) !!}</td>
                    <td>{!! html_entity_decode($setting->about_us_id) !!}</td>
                    <td>{!! html_entity_decode($setting->vision) !!}</td>
                    <td>{!! html_entity_decode($setting->vision_id) !!}</td>
                    <td>{!! html_entity_decode($setting->mission) !!}</td>
                    <td>{!! html_entity_decode($setting->mission_id) !!}</td>
                    <td>{!! html_entity_decode($setting->history) !!}</td>
                    <td>{!! html_entity_decode($setting->history_id) !!}</td>
                    <td>
                        <span class="{{ "badge bg-" . Str::successdanger($setting->active) }}">
                            {{ trans("index." . Str::active($setting->active), '_')) }}
                        </span>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $setting->created_by_admin?->id || $setting->created_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$setting->created_by_admin?->id}" : null }}" target="_blank">
                            {{ $setting->created_by_admin?->name }}
                        </a>
                    </td>
                    <td>
                        <a draggable="false" href="{{ $setting->updated_by_admin?->id || $setting->updated_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$setting->updated_by_admin?->id}" : null }}" target="_blank">
                            {{ $setting->updated_by_admin?->name }}
                        </a>
                    </td>
                    @if ($menu_type == "trash")
                        <td>
                            <a draggable="false" href="{{ $setting->deleted_by_admin?->id || $setting->deleted_by == 0 ? route("{$sub_domain}.admin.index") . "?menu_type=view&row={$setting->deleted_by_admin?->id}" : null }}" target="_blank">
                                {{ $setting->deleted_by_admin?->name }}
                            </a>
                        </td>
                    @endif
                    <td>{{ $setting->created_at?->format("H:i:s - l, d F Y") }} ({{ $setting->created_at?->diffForHumans() }})</td>
                    <td>{{ $setting->updated_at?->format("H:i:s - l, d F Y") }} ({{ $setting->updated_at?->diffForHumans() }})</td>
                    @if ($menu_type == "trash")
                        <td>{{ $setting->deleted_at?->format("H:i:s - l, d F Y") }} ({{ $setting->deleted_at?->diffForHumans() }})</td>
                    @endif
                    <td>
                        @if ($menu_type == "index")
                            @if ($setting->active)
                                <button class="btn btn-creative btn-sm btn-danger" wire:click="nonActive({{ $setting->id }})">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    {{ trans("index.Non Active") }}
                                </button>
                            @else
                                <button class="btn btn-creative btn-sm btn-success" wire:click="active({{ $setting->id }})">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ trans("index.Active") }}
                                </button>
                            @endif

                            <button class="btn btn-creative btn-sm btn-dark" wire:click="view({{ $setting->id }})">
                                <i class="bi bi-eye me-1"></i>
                                {{ trans("index.View") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-info" wire:click="form('clone', {{ $setting->id }})">
                                <i class="bi bi-clipboard me-1"></i>
                                {{ trans("index.Clone") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-success" wire:click="form('edit', {{ $setting->id }})">
                                <i class="bi bi-pencil me-1"></i>
                                {{ trans("index.Edit") }}
                            </button>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $setting->id }}">
                                <i class="bi bi-trash me-1"></i>
                                {{ trans("index.Delete") }}
                            </button>

                            <div class="modal fade" id="delete-{{ $setting->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-{{ $setting->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-{{ $setting->id }}">{{ trans("index.Delete") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("message.Are you sure you want to delete") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p class="mb-0">{{ trans("message.You can still restore from Trash") }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="delete({{ $setting->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($menu_type == "trash")
                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#restore-{{ $setting->id }}">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                {{ trans("index.Restore") }}
                            </button>

                            <div class="modal fade" id="restore-{{ $setting->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restore-{{ $setting->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="restore-{{ $setting->id }}">{{ trans("index.Restore") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">{{ trans("message.Are you sure you want to restore") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-success" type="button" data-bs-dismiss="modal" wire:click="restore({{ $setting->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-permanent-{{ $setting->id }}">
                                <i class="bi bi-trash2 me-1"></i>
                                {{ trans("index.Delete Permanent") }}
                            </button>

                            <div class="modal fade" id="delete-permanent-{{ $setting->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete-permanent-{{ $setting->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="delete-permanent-{{ $setting->id }}">{{ trans("index.Delete Permanent") }} - {{ trans("index." . Str::slug($menu_name, "_")) }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <p>{{ trans("message.Are you sure you want to delete permanent") }} {{ trans("index." . Str::slug($menu_name, "_")) }}</p>
                                            <p>{{ trans("message.You cant undo this action or restore this data anymore") }}</p>
                                            <p class="mb-0">{{ trans("message.All relation data and files will be deleted forever from server") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <button class="btn btn-creative btn-sm btn-danger" type="button" data-bs-dismiss="modal" wire:click="deletePermanent({{ $setting->id }})">
                                                <i class="bi bi-check me-1"></i>
                                                {{ trans("index.Yes") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            @if (!$data_setting->count())
                <tr>
                    <td class="text-center" colspan="100%">{{ trans("index.No Data Available") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{ $data_setting->links("{$sub_domain}.layouts.pagination") }}
