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
                    <th>
                        @php($column = "name")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "email")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "phone")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "gender")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "school")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "major")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "city")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "type")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
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
                @forelse ($registrations as $registration)
                    <tr>
                        <td>
                            <input
                                class="form-check-input"
                                wire:model="checkbox_id.{{ $registration->id }}"
                                type="checkbox" />
                        </td>
                        <td class="text-center">
                            {{ (($registrations->currentPage() - 1) * $registrations->perPage()) + $loop->iteration }}
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-link text-decoration-none"
                                wire:click="view({{ $registration->id }})"
                                type="button">
                                {{ $registration->id }}
                            </button>
                        </td>
                        <td>{{ $registration->name }}</td>
                        <td>
                            <a draggable="false" href="mailto:{{ $registration->email }}">{{ $registration->email }}</a>
                        </td>
                        <td>
                            <a draggable="false" href="https://api.whatsapp.com/send?phone={{ Str::phone($registration->phone) }}">{{ $registration->phone }}</a>
                        </td>
                        <td class="text-center">{{ Str::translate($registration->gender?->name) }}</td>
                        <td>{{ $registration->school }}</td>
                        <td>{{ $registration->major }}</td>
                        <td>{{ $registration->city }}</td>
                        <td class="text-center">{{ Str::translate($registration->type?->name) }}</td>
                        <td>
                            @if ($pageType == "index")
                                @can("{$pageName} Edit")
                                    <div class="form-check form-switch">
                                        <input
                                            class="form-check-input"
                                            wire:click="active({{ $registration->id }})"
                                            wire:loading.attr="disabled"
                                            type="checkbox"
                                            role="switch"
                                            id="active-{{ $registration->id }}"
                                            value="1"
                                            {{ $registration->is_active ? "checked" : null }} />
                                        <div wire:loading wire:target="active({{ $registration->id }})">
                                            <i class="fas fa-refresh fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="active({{ $registration->id }})">
                                            <label class="form-check-label" for="active-{{ $registration->id }}">
                                                <span class="badge bg-{{ Str::successdanger($registration->is_active) }}">
                                                    {{ Str::translate(Str::active($registration->is_active)) }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <span class="badge bg-{{ Str::successdanger($registration->is_active) }}">
                                        {{ Str::translate(Str::active($registration->is_active)) }}
                                    </span>
                                @endcan
                            @endif

                            @if ($pageType == "trash")
                                <span class="badge bg-{{ Str::successdanger($registration->is_active) }}">
                                    {{ Str::translate(Str::active($registration->is_active)) }}
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-sm {{ empty($detail[$registration->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="detail({{ $registration->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detail-{{ $registration->id }}">
                                <span class="me-1">{{ trans("index.detail") }}</span>
                                <i class="{{ empty($detail[$registration->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="detail({{ $registration->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-sm {{ empty($action[$registration->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="action({{ $registration->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#action-{{ $registration->id }}">
                                <span class="me-1">{{ trans("index.action") }}</span>
                                <i class="{{ empty($action[$registration->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="action({{ $registration->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                    </tr>

                    @include("{$subDomain}.livewire.{$pageSlug}.detail")

                    @include("{$subDomain}.livewire.{$pageSlug}.action")
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

    @if ($registrations->first())
        {{ $registrations->links("{$subDomain}.layouts.pagination") }}
    @endif
</div>
