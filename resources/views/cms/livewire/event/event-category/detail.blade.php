<div>
    <tr id="detail-{{ $eventCategory->id }}" class="collapse {{ !empty($detail[$eventCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td class="text-pre-wrap">{!! $eventCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description_idn") }}</td>
                        <td class="text-pre-wrap">{!! $eventCategory->description_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.slug") }}</td>
                        <td>{{ $eventCategory->slug }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.event") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.event.index") . "?event_category_id={$eventCategory->id}" }}" target="_blank">
                                {{ $eventCategory->events->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($eventCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$eventCategory->createdBy->id}" }}" target="_blank">
                                    {{ $eventCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($eventCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$eventCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $eventCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($eventCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$eventCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $eventCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($eventCategory->created_at)
                                {{ $eventCategory->created_at->format("l, H:i:s") }}
                                {{ $eventCategory->created_at->isoFormat("LL") }}
                                ({{ $eventCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($eventCategory->updated_at)
                                {{ $eventCategory->updated_at->format("l, H:i:s") }}
                                {{ $eventCategory->updated_at->isoFormat("LL") }}
                                ({{ $eventCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($eventCategory->deleted_at)
                                    {{ $eventCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $eventCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $eventCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
