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
                        @php($column = "name_idn")
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
                @forelse ($offers as $offer)
                    <tr>
                        <td>
                            <input
                                class="form-check-input"
                                wire:model="checkbox_id.{{ $offer->id }}"
                                type="checkbox" />
                        </td>
                        <td class="text-center">
                            {{ (($offers->currentPage() - 1) * $offers->perPage()) + $loop->iteration }}
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-link text-decoration-none"
                                wire:click="view({{ $offer->id }})"
                                type="button">
                                {{ $offer->id }}
                            </button>
                        </td>
                        <td class="text-wrap">{{ $offer->name }}</td>
                        <td class="text-wrap">{{ $offer->name_idn }}</td>
                        <td>
                            @if ($pageType == "index")
                                @can("{$pageName} Edit")
                                    <div class="form-check form-switch">
                                        <input
                                            class="form-check-input"
                                            wire:click="active({{ $offer->id }})"
                                            wire:loading.attr="disabled"
                                            type="checkbox"
                                            role="switch"
                                            id="active-{{ $offer->id }}"
                                            value="1"
                                            {{ $offer->is_active ? "checked" : null }} />
                                        <div wire:loading wire:target="active({{ $offer->id }})">
                                            <i class="fas fa-refresh fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="active({{ $offer->id }})">
                                            <label class="form-check-label" for="active-{{ $offer->id }}">
                                                <span class="badge bg-{{ Str::successdanger($offer->is_active) }}">
                                                    {{ Str::translate(Str::active($offer->is_active)) }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <span class="badge bg-{{ Str::successdanger($offer->is_active) }}">
                                        {{ Str::translate(Str::active($offer->is_active)) }}
                                    </span>
                                @endcan
                            @endif

                            @if ($pageType == "trash")
                                <span class="badge bg-{{ Str::successdanger($offer->is_active) }}">
                                    {{ Str::translate(Str::active($offer->is_active)) }}
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-sm {{ empty($detail[$offer->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="detail({{ $offer->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detail-{{ $offer->id }}">
                                <span class="me-1">{{ trans("index.detail") }}</span>
                                <i class="{{ empty($detail[$offer->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="detail({{ $offer->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-sm {{ empty($action[$offer->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="action({{ $offer->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#action-{{ $offer->id }}">
                                <span class="me-1">{{ trans("index.action") }}</span>
                                <i class="{{ empty($action[$offer->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="action({{ $offer->id }})"><i class="fas fa-spinner fa-spin"></i></div>
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

    @if ($offers->first())
        {{ $offers->links("{$subDomain}.layouts.pagination") }}
    @endif
</div>
