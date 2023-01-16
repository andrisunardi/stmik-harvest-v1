<div>
    <tr id="detail-{{ $buyAdvertisement->id }}" class="collapse {{ !empty($detail[$buyAdvertisement->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($buyAdvertisement->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $buyAdvertisement->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $buyAdvertisement->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $buyAdvertisement->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($buyAdvertisement->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$buyAdvertisement->createdBy->id}" }}" target="_blank">
                                    {{ $buyAdvertisement->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($buyAdvertisement->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$buyAdvertisement->updatedBy->id}" }}" target="_blank">
                                    {{ $buyAdvertisement->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($buyAdvertisement->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$buyAdvertisement->deletedBy->id}" }}" target="_blank">
                                    {{ $buyAdvertisement->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($buyAdvertisement->created_at)
                                {{ $buyAdvertisement->created_at->format("l, H:i:s") }}
                                {{ $buyAdvertisement->created_at->isoFormat("LL") }}
                                ({{ $buyAdvertisement->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($buyAdvertisement->updated_at)
                                {{ $buyAdvertisement->updated_at->format("l, H:i:s") }}
                                {{ $buyAdvertisement->updated_at->isoFormat("LL") }}
                                ({{ $buyAdvertisement->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($buyAdvertisement->deleted_at)
                                    {{ $buyAdvertisement->deleted_at->format("l, H:i:s") }}
                                    {{ $buyAdvertisement->deleted_at->isoFormat("LL") }}
                                    ({{ $buyAdvertisement->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
