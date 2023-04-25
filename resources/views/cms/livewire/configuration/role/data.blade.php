<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
            <thead>
                <tr class="bg-primary text-white text-center">
                    <th width="1%"><input class="form-check-input" type="checkbox" wire:model="checkbox_all"></th>
                    <th width="1%">{{ trans("index.#") }}</th>
                    <th width="1%">
                        @php($column = "id")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th width="1%">
                        @php($column = "name")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th width="1%">
                        @php($column = "guard_name")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>{{ trans("index.permission") }}</th>
                    <th width="1%">{{ trans("index.detail") }}</th>
                    <th width="1%">{{ trans("index.action") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>
                            <input
                                class="form-check-input"
                                wire:model="checkbox_id.{{ $role->id }}"
                                type="checkbox" />
                        </td>
                        <td class="text-center">
                            {{ (($roles->currentPage() - 1) * $roles->perPage()) + $loop->iteration }}
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-link text-decoration-none"
                                wire:click="view({{ $role->id }})"
                                type="button">
                                {{ $role->id }}
                            </button>
                        </td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td class="text-wrap">
                            @foreach ($role->permissions as $permission)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.permission.index") . "?pageType=view&row={$permission->id}" }}" target="_blank">
                                    {{ $permission->name }}
                                </a>
                                {{ !$loop->last ? "|" : null }}
                            @endforeach
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-sm {{ empty($detail[$role->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="detail({{ $role->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detail-{{ $role->id }}">
                                <span class="me-1">{{ trans("index.detail") }}</span>
                                <i class="{{ empty($detail[$role->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="detail({{ $role->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-sm {{ empty($action[$role->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="action({{ $role->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#action-{{ $role->id }}">
                                <span class="me-1">{{ trans("index.action") }}</span>
                                <i class="{{ empty($action[$role->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="action({{ $role->id }})"><i class="fas fa-spinner fa-spin"></i></div>
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

    @if ($roles->first())
        {{ $roles->links("{$subDomain}.layouts.pagination") }}
    @endif
</div>
