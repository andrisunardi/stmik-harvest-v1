<div>
    <tr id="detail-{{ $testimony->id }}" class="collapse {{ !empty($detail[$testimony->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td class="text-pre-wrap">{!! $testimony->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($testimony->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $testimony->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $testimony->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($testimony->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$testimony->createdBy->id}" }}" target="_blank">
                                    {{ $testimony->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($testimony->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$testimony->updatedBy->id}" }}" target="_blank">
                                    {{ $testimony->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($testimony->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$testimony->deletedBy->id}" }}" target="_blank">
                                    {{ $testimony->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($testimony->created_at)
                                {{ $testimony->created_at->format("l, H:i:s") }}
                                {{ $testimony->created_at->isoFormat("LL") }}
                                ({{ $testimony->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($testimony->updated_at)
                                {{ $testimony->updated_at->format("l, H:i:s") }}
                                {{ $testimony->updated_at->isoFormat("LL") }}
                                ({{ $testimony->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($testimony->deleted_at)
                                    {{ $testimony->deleted_at->format("l, H:i:s") }}
                                    {{ $testimony->deleted_at->isoFormat("LL") }}
                                    ({{ $testimony->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
