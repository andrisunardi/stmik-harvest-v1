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
                @forelse ($blogCategories as $blogCategory)
                    <tr>
                        <td>
                            <input
                                class="form-check-input"
                                wire:model="checkbox_id.{{ $blogCategory->id }}"
                                type="checkbox" />
                        </td>
                        <td class="text-center">
                            {{ (($blogCategories->currentPage() - 1) * $blogCategories->perPage()) + $loop->iteration }}
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-link text-decoration-none"
                                wire:click="view({{ $blogCategory->id }})"
                                type="button">
                                {{ $blogCategory->id }}
                            </button>
                        </td>
                        <td>
                            {{ $blogCategory->name }}
                            <a draggable="false" href="{{ route("blog.index") . "?category={$blogCategory->slug}" }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="fas fa-external-link"></i>
                            </a>
                        </td>
                        <td>
                            {{ $blogCategory->name_idn }}
                            <a draggable="false" href="{{ route("blog.index") . "?category={$blogCategory->slug}" }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="fas fa-external-link"></i>
                            </a>
                        </td>
                        <td>
                            @if ($pageType == "index")
                                @can("{$pageName} Edit")
                                    <div class="form-check form-switch">
                                        <input
                                            class="form-check-input"
                                            wire:click="active({{ $blogCategory->id }})"
                                            wire:loading.attr="disabled"
                                            type="checkbox"
                                            role="switch"
                                            id="active-{{ $blogCategory->id }}"
                                            value="1"
                                            {{ $blogCategory->is_active ? "checked" : null }} />
                                        <div wire:loading wire:target="active({{ $blogCategory->id }})">
                                            <i class="fas fa-refresh fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="active({{ $blogCategory->id }})">
                                            <label class="form-check-label" for="active-{{ $blogCategory->id }}">
                                                <span class="badge bg-{{ Str::successdanger($blogCategory->is_active) }}">
                                                    {{ Str::translate(Str::active($blogCategory->is_active)) }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <span class="badge bg-{{ Str::successdanger($blogCategory->is_active) }}">
                                        {{ Str::translate(Str::active($blogCategory->is_active)) }}
                                    </span>
                                @endcan
                            @endif

                            @if ($pageType == "trash")
                                <span class="badge bg-{{ Str::successdanger($blogCategory->is_active) }}">
                                    {{ Str::translate(Str::active($blogCategory->is_active)) }}
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button
                                class="btn btn-sm {{ empty($detail[$blogCategory->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="detail({{ $blogCategory->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detail-{{ $blogCategory->id }}">
                                <span class="me-1">{{ trans("index.detail") }}</span>
                                <i class="{{ empty($detail[$blogCategory->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="detail({{ $blogCategory->id }})"><i class="fas fa-spinner fa-spin"></i></div>
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-sm {{ empty($action[$blogCategory->id]) ? "btn-outline-primary" : "btn-primary" }} btn-dropdown"
                                wire:click="action({{ $blogCategory->id }})"
                                wire:loading.attr="disabled"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#action-{{ $blogCategory->id }}">
                                <span class="me-1">{{ trans("index.action") }}</span>
                                <i class="{{ empty($action[$blogCategory->id]) ? "fas fa-caret-down" : "fas fa-caret-up" }}"></i>
                                <div wire:loading wire:target="action({{ $blogCategory->id }})"><i class="fas fa-spinner fa-spin"></i></div>
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

    @if ($blogCategories->first())
        {{ $blogCategories->links("{$subDomain}.layouts.pagination") }}
    @endif
</div>
