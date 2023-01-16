<div>
    <tr id="detail-{{ $administrativeCost->id }}" class="collapse {{ !empty($detail[$administrativeCost->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $administrativeCost->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($administrativeCost->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$administrativeCost->createdBy->id}" }}" target="_blank">
                                    {{ $administrativeCost->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($administrativeCost->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$administrativeCost->updatedBy->id}" }}" target="_blank">
                                    {{ $administrativeCost->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($administrativeCost->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$administrativeCost->deletedBy->id}" }}" target="_blank">
                                    {{ $administrativeCost->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($administrativeCost->created_at)
                                {{ $administrativeCost->created_at->format("l, H:i:s") }}
                                {{ $administrativeCost->created_at->isoFormat("LL") }}
                                ({{ $administrativeCost->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($administrativeCost->updated_at)
                                {{ $administrativeCost->updated_at->format("l, H:i:s") }}
                                {{ $administrativeCost->updated_at->isoFormat("LL") }}
                                ({{ $administrativeCost->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($administrativeCost->deleted_at)
                                    {{ $administrativeCost->deleted_at->format("l, H:i:s") }}
                                    {{ $administrativeCost->deleted_at->isoFormat("LL") }}
                                    ({{ $administrativeCost->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
