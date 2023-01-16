<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
            <thead>
                <tr class="bg-primary text-white text-center">
                    <th width="1%">{{ trans("index.#") }}</th>
                    <th width="1%">
                        {{ trans("index.id") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('id', '{{ $order_by == "id" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "id" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th width="1%">
                        {{ trans("index.log_name") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('log_name', '{{ $order_by == "log_name" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "log_name" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        {{ trans("index.description") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('description', '{{ $order_by == "description" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "description" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        {{ trans("index.event") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('event', '{{ $order_by == "event" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "event" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        {{ trans("index.subject") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('subject', '{{ $order_by == "subject" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "subject" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        {{ trans("index.causer") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('causer', '{{ $order_by == "causer" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "causer" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        {{ trans("index.properties") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('properties', '{{ $order_by == "properties" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "properties" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
                        </a>
                    </th>
                    <th>
                        {{ trans("index.batch_uuid") }}
                        <a draggable="false" href="javascript:;" wire:click="sort('batch_uuid', '{{ $order_by == "batch_uuid" && $sort_by == "desc" ? "asc" : "desc" }}')">
                            <i class="fas fa-sort-amount-{{ $order_by == "batch_uuid" && $sort_by == "desc" ? "down" : "up" }} text-white"></i>
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
                        <td class="text-center">
                            <button
                                class="btn btn-link text-decoration-none"
                                wire:click="view({{ $activity->id }})"
                                type="button">
                                {{ $activity->id }}
                            </button>
                        </td>
                        <td>{{ $activity->log_name }}</td>
                        <td class="text-wrap">{{ $activity->description }}</td>
                        <td>{{ trans("index.{$activity->event}") }}</td>
                        <td>
                            <div>{{ trans("index.type") }} : {{ $activity->subject_type }}</div>
                            <div>{{ trans("index.id") }} : {{ $activity->subject_id }}</div>
                            {{ $activity->subject?->name }}
                        </td>
                        <td>
                            <div>{{ trans("index.type") }} : {{ $activity->causer_type }}</div>
                            <div>{{ trans("index.id") }} : {{ $activity->causer_id }}</div>
                            {{ $activity->causer?->name }}
                        </td>
                        <td>{{ $activity->properties }}</td>
                        <td>{{ $activity->batch_uuid }}</td>
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
