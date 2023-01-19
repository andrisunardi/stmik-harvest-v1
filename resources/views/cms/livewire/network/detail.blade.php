<div>
    <tr id="detail-{{ $network->id }}" class="collapse {{ !empty($detail[$network->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $network->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($network->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $network->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $network->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($network->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$network->createdBy->id}" }}" target="_blank">
                                    {{ $network->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($network->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$network->updatedBy->id}" }}" target="_blank">
                                    {{ $network->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($network->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$network->deletedBy->id}" }}" target="_blank">
                                    {{ $network->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($network->created_at)
                                {{ $network->created_at->format("l, H:i:s") }}
                                {{ $network->created_at->isoFormat("LL") }}
                                ({{ $network->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($network->updated_at)
                                {{ $network->updated_at->format("l, H:i:s") }}
                                {{ $network->updated_at->isoFormat("LL") }}
                                ({{ $network->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($network->deleted_at)
                                    {{ $network->deleted_at->format("l, H:i:s") }}
                                    {{ $network->deleted_at->isoFormat("LL") }}
                                    ({{ $network->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
