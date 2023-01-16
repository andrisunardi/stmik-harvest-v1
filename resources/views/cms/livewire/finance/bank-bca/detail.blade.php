<div>
    <tr id="detail-{{ $bankBca->id }}" class="collapse {{ !empty($detail[$bankBca->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.file") }}</td>
                        <td>
                            @if ($bankBca->checkFile())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $bankBca->assetFile() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $bankBca->assetFile() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $bankBca->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($bankBca->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bankBca->createdBy->id}" }}" target="_blank">
                                    {{ $bankBca->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($bankBca->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bankBca->updatedBy->id}" }}" target="_blank">
                                    {{ $bankBca->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($bankBca->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bankBca->deletedBy->id}" }}" target="_blank">
                                    {{ $bankBca->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($bankBca->created_at)
                                {{ $bankBca->created_at->format("l, H:i:s") }}
                                {{ $bankBca->created_at->isoFormat("LL") }}
                                ({{ $bankBca->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($bankBca->updated_at)
                                {{ $bankBca->updated_at->format("l, H:i:s") }}
                                {{ $bankBca->updated_at->isoFormat("LL") }}
                                ({{ $bankBca->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($bankBca->deleted_at)
                                    {{ $bankBca->deleted_at->format("l, H:i:s") }}
                                    {{ $bankBca->deleted_at->isoFormat("LL") }}
                                    ({{ $bankBca->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
