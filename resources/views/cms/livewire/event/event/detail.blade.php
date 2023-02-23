<div>
    <tr id="detail-{{ $event->id }}" class="collapse {{ !empty($detail[$event->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.short_body") }}</td>
                        <td>{{ $event->short_body }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.short_body_idn") }}</td>
                        <td>{{ $event->short_body_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.body") }}</td>
                        <td class="text-pre-wrap">{!! $event->body !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.body_idn") }}</td>
                        <td class="text-pre-wrap">{!! $event->body_idn !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.location") }}</td>
                        <td>{{ $event->location }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.start") }}</td>
                        <td>
                            @if ($event->start)
                                {{ $event->start->format("l,") }}
                                {{ $event->start->isoFormat("LL") }}
                                ({{ $event->start->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.end") }}</td>
                        <td>
                            @if ($event->end)
                                {{ $event->end->format("l,") }}
                                {{ $event->end->isoFormat("LL") }}
                                ({{ $event->end->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.tag") }}</td>
                        <td>{{ $event->tag }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.tag_idn") }}</td>
                        <td>{{ $event->tag_idn }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.slug") }}</td>
                        <td>{{ $event->slug }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($event->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$event->createdBy->id}" }}" target="_blank">
                                    {{ $event->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($event->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$event->updatedBy->id}" }}" target="_blank">
                                    {{ $event->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($event->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$event->deletedBy->id}" }}" target="_blank">
                                    {{ $event->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($event->created_at)
                                {{ $event->created_at->format("l, H:i:s") }}
                                {{ $event->created_at->isoFormat("LL") }}
                                ({{ $event->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($event->updated_at)
                                {{ $event->updated_at->format("l, H:i:s") }}
                                {{ $event->updated_at->isoFormat("LL") }}
                                ({{ $event->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($event->deleted_at)
                                    {{ $event->deleted_at->format("l, H:i:s") }}
                                    {{ $event->deleted_at->isoFormat("LL") }}
                                    ({{ $event->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
