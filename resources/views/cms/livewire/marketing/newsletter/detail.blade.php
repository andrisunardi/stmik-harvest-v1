<div>
    <tr id="detail-{{ $newsletter->id }}" class="collapse {{ !empty($detail[$newsletter->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($newsletter->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$newsletter->createdBy->id}" }}" target="_blank">
                                    {{ $newsletter->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($newsletter->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$newsletter->updatedBy->id}" }}" target="_blank">
                                    {{ $newsletter->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($newsletter->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$newsletter->deletedBy->id}" }}" target="_blank">
                                    {{ $newsletter->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($newsletter->created_at)
                                {{ $newsletter->created_at->format("l, H:i:s") }}
                                {{ $newsletter->created_at->isoFormat("LL") }}
                                ({{ $newsletter->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($newsletter->updated_at)
                                {{ $newsletter->updated_at->format("l, H:i:s") }}
                                {{ $newsletter->updated_at->isoFormat("LL") }}
                                ({{ $newsletter->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($newsletter->deleted_at)
                                    {{ $newsletter->deleted_at->format("l, H:i:s") }}
                                    {{ $newsletter->deleted_at->isoFormat("LL") }}
                                    ({{ $newsletter->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
