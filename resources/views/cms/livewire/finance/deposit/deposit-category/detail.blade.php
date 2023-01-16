<div>
    <tr id="detail-{{ $depositCategory->id }}" class="collapse {{ !empty($detail[$depositCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $depositCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.deposit") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.deposit.index") . "?deposit_category_id={$depositCategory->id}" }}" target="_blank">
                                {{ $depositCategory->deposits->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($depositCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$depositCategory->createdBy->id}" }}" target="_blank">
                                    {{ $depositCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($depositCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$depositCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $depositCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($depositCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$depositCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $depositCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($depositCategory->created_at)
                                {{ $depositCategory->created_at->format("l, H:i:s") }}
                                {{ $depositCategory->created_at->isoFormat("LL") }}
                                ({{ $depositCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($depositCategory->updated_at)
                                {{ $depositCategory->updated_at->format("l, H:i:s") }}
                                {{ $depositCategory->updated_at->isoFormat("LL") }}
                                ({{ $depositCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($depositCategory->deleted_at)
                                    {{ $depositCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $depositCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $depositCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
