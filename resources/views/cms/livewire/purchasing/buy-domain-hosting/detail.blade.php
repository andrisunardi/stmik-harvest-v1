<div>
    <tr id="detail-{{ $buyDomainHosting->id }}" class="collapse {{ !empty($detail[$buyDomainHosting->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($buyDomainHosting->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $buyDomainHosting->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $buyDomainHosting->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $buyDomainHosting->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($buyDomainHosting->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$buyDomainHosting->createdBy->id}" }}" target="_blank">
                                    {{ $buyDomainHosting->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($buyDomainHosting->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$buyDomainHosting->updatedBy->id}" }}" target="_blank">
                                    {{ $buyDomainHosting->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($buyDomainHosting->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$buyDomainHosting->deletedBy->id}" }}" target="_blank">
                                    {{ $buyDomainHosting->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($buyDomainHosting->created_at)
                                {{ $buyDomainHosting->created_at->format("l, H:i:s") }}
                                {{ $buyDomainHosting->created_at->isoFormat("LL") }}
                                ({{ $buyDomainHosting->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($buyDomainHosting->updated_at)
                                {{ $buyDomainHosting->updated_at->format("l, H:i:s") }}
                                {{ $buyDomainHosting->updated_at->isoFormat("LL") }}
                                ({{ $buyDomainHosting->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($buyDomainHosting->deleted_at)
                                    {{ $buyDomainHosting->deleted_at->format("l, H:i:s") }}
                                    {{ $buyDomainHosting->deleted_at->isoFormat("LL") }}
                                    ({{ $buyDomainHosting->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
