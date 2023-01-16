<div>
    <tr id="detail-{{ $withdrawCategory->id }}" class="collapse {{ !empty($detail[$withdrawCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $withdrawCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.withdraw") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.withdraw.index") . "?withdraw_category_id={$withdrawCategory->id}" }}" target="_blank">
                                {{ $withdrawCategory->withdraws->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($withdrawCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$withdrawCategory->createdBy->id}" }}" target="_blank">
                                    {{ $withdrawCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($withdrawCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$withdrawCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $withdrawCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($withdrawCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$withdrawCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $withdrawCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($withdrawCategory->created_at)
                                {{ $withdrawCategory->created_at->format("l, H:i:s") }}
                                {{ $withdrawCategory->created_at->isoFormat("LL") }}
                                ({{ $withdrawCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($withdrawCategory->updated_at)
                                {{ $withdrawCategory->updated_at->format("l, H:i:s") }}
                                {{ $withdrawCategory->updated_at->isoFormat("LL") }}
                                ({{ $withdrawCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($withdrawCategory->deleted_at)
                                    {{ $withdrawCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $withdrawCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $withdrawCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
