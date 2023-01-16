<div>
    <tr id="detail-{{ $advertisementProvider->id }}" class="collapse {{ !empty($detail[$advertisementProvider->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_advertisement") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-advertisement.index") . "?advertisement_provider_id={$advertisementProvider->id}" }}" target="_blank">
                                {{ $advertisementProvider->buyAdvertisements->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($advertisementProvider->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$advertisementProvider->createdBy->id}" }}" target="_blank">
                                    {{ $advertisementProvider->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($advertisementProvider->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$advertisementProvider->updatedBy->id}" }}" target="_blank">
                                    {{ $advertisementProvider->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($advertisementProvider->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$advertisementProvider->deletedBy->id}" }}" target="_blank">
                                    {{ $advertisementProvider->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($advertisementProvider->created_at)
                                {{ $advertisementProvider->created_at->format("l, H:i:s") }}
                                {{ $advertisementProvider->created_at->isoFormat("LL") }}
                                ({{ $advertisementProvider->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($advertisementProvider->updated_at)
                                {{ $advertisementProvider->updated_at->format("l, H:i:s") }}
                                {{ $advertisementProvider->updated_at->isoFormat("LL") }}
                                ({{ $advertisementProvider->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($advertisementProvider->deleted_at)
                                    {{ $advertisementProvider->deleted_at->format("l, H:i:s") }}
                                    {{ $advertisementProvider->deleted_at->isoFormat("LL") }}
                                    ({{ $advertisementProvider->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
