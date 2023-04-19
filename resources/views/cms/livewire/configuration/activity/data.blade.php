<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
            <thead>
                <tr class="bg-primary text-white text-center">
                    <th width="1%">{{ trans("index.#") }}</th>
                    <th width="1%">
                        @php($column = "id")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "log_name")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "description")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "event")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "subject")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "causer")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "properties")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "batch_uuid")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        @php($column = "created_at")
                        {{ trans("index.{$column}") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('{{ $column }}', '{{ $order_by == $column && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == $column && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td class="text-center">
                            {{ (($activities->currentPage() - 1) * $activities->perPage()) + $loop->iteration }}
                        </td>
                        <td class="text-center">{{ $activity->id }}</td>
                        <td>{{ $activity->log_name }}</td>
                        <td class="text-wrap">{{ $activity->description }}</td>
                        <td class="text-center">{{ Str::translate($activity->event) }}</td>
                        <td>
                            @if ($activity->subject_id)
                                <div>{{ Str::after($activity->subject_type, "App\Models\\") }}</div>
                                <div>{{ trans("index.id") }} : {{ $activity->subject_id }}</div>
                            @endif
                        </td>
                        <td>
                            @if ($activity->causer)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$activity->causer->id}" }}" target="_blank">
                                    {{ $activity->causer->name }}
                                </a>
                            @endif
                        </td>
                        <td class="text-wrap">
                            <div class="row">
                                <div class="col-6">
                                    @if (Arr::exists($activity->changes, ["old"]))
                                        <h6>{{ trans("index.old") }}</h6>
                                        <pre><code>{{ json_encode($activity->changes["old"], JSON_PRETTY_PRINT) }}</code></pre>
                                    @endif
                                </div>
                                <div class="col-6">
                                    @if (Arr::exists($activity->changes, ["attributes"]))
                                        <h6>{{ trans("index.attributes") }}</h6>
                                        <pre><code>{{ json_encode($activity->changes["attributes"], JSON_PRETTY_PRINT) }}</code></pre>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $activity->batch_uuid }}</td>
                        <td>
                            {{ $activity->created_at->format("l, H:i:s") }}<br>
                            {{ $activity->created_at->isoFormat("LL") }}<br>
                            ({{ $activity->created_at->diffForHumans() }})
                        </td>
                    </tr>

                @endforeach

                @if (!$activities->count())
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
                @endif
            </tbody>
        </table>
    </div>

    @if ($activities->first())
        {{ $activities->links("{$subDomain}.layouts.pagination") }}
    @endif
</div>
