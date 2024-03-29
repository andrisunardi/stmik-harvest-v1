<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
            <thead>
                <tr class="bg-{{ $pageType == "index" ? "primary" : "warning" }} text-white text-center">
                    <th width="1%"><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                    <th width="1%">{{ trans("index.#") }}</th>
                    <th width="1%">
                        @php($column = "id")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th width="1%">{{ trans("index.image") }}</th>
                    <th>
                        @php($column = "name")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "username")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>{{ trans("index.roles_and_permissions") }}</th>
                    <th width="1%">
                        @php($column = "is_active")
                        {{ trans("index.active") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th width="1%">{{ trans("index.detail") }}</th>
                    <th width="1%">{{ trans("index.action") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <input
                                class="form-check-input"
                                wire:model="checkbox_id.{{ $user->id }}"
                                type="checkbox" />
                        </td>
                        <td class="text-center">
                            {{ (($users->currentPage() - 1) * $users->perPage()) + $loop->iteration }}
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-link text-decoration-none"
                                wire:click="view({{ $user->id }})"
                                type="button">
                                {{ $user->id }}
                            </button>
                        </td>
                        <td>
                            @if ($user->checkImage())
                                <a draggable="false" href="{{ $user->assetImage() }}" target="_blank">
                                    <img
                                        draggable="false"
                                        class="w-100 img-thumbnail"
                                        src="{{ $user->assetImage() }}"
                                        alt="{{ $user->altImage() }}">
                                </a>
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <div>
                                    {{ $loop->iteration }}.
                                    <a draggable="false" href="{{ route("{$subDomain}.configuration.role.index") . "?pageType=view&row={$role->id}" }}" target="_blank">
                                        {{ $role->name }}
                                    </a>
                                </div>
                                @foreach ($role->permissions as $permission)
                                    <div>
                                        {{ $loop->iteration }}.
                                        <a draggable="false" href="{{ route("{$subDomain}.configuration.permission.index") . "?pageType=view&row={$permission->id}" }}" target="_blank">
                                            {{ $permission->name }}
                                        </a>
                                    </div>
                                @endforeach
                            @endforeach
                        </td>
                        <td>
                            @if ($pageType == "index")
                                @can("{$pageName} Edit")
                                    <div class="form-check form-switch">
                                        <input
                                            class="form-check-input"
                                            wire:click="active({{ $user->id }})"
                                            wire:loading.attr="disabled"
                                            type="checkbox"
                                            role="switch"
                                            id="active-{{ $user->id }}"
                                            value="1"
                                            {{ $user->is_active ? "checked" : null }} />
                                        <div wire:loading wire:target="active({{ $user->id }})">
                                            <i class="fas fa-refresh fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="active({{ $user->id }})">
                                            <label class="form-check-label" for="active-{{ $user->id }}">
                                                <span class="badge bg-{{ Str::successdanger($user->is_active) }}">
                                                    {{ Str::translate(Str::active($user->is_active)) }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <span class="badge bg-{{ Str::successdanger($user->is_active) }}">
                                        {{ Str::translate(Str::active($user->is_active)) }}
                                    </span>
                                @endcan
                            @endif

                            @if ($pageType == "trash")
                                <span class="badge bg-{{ Str::successdanger($user->is_active) }}">
                                    {{ Str::translate(Str::active($user->is_active)) }}
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-sm {{ empty($detail[$user->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="detail({{ $user->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detail-{{ $user->id }}">
                                <span class="me-1">{{ trans("index.detail") }}</span>
                                <i class="{{ empty($detail[$user->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="detail({{ $user->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-sm {{ empty($action[$user->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="action({{ $user->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#action-{{ $user->id }}">
                                <span class="me-1">{{ trans("index.action") }}</span>
                                <i class="{{ empty($action[$user->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="action({{ $user->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                    </tr>

                    @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.detail")

                    @include("{$subDomain}.livewire.{$pageCategorySlug}.{$pageSlug}.action")
                @empty
                    <tr>
                        <td class="text-center" colspan="100%">
                            <div wire:loading.remove>
                                {{ trans("index.no_data_available") }}
                            </div>
                            <div wire:loading>
                                {{ trans("index.now_loading") }}
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($users->first())
        {{ $users->links("{$subDomain}.layouts.pagination") }}
    @endif
</div>
