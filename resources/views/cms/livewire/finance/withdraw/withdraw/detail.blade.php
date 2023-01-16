<div>
    <tr id="detail-{{ $withdraw->id }}" class="collapse {{ !empty($detail[$withdraw->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.bank") }}</td>
                        <td>
                            @if ($withdraw->bank)
                                <a draggable="false" href="{{ route("{$subDomain}.finance.bank.index") . "?pageType=view&row={$withdraw->bank->id}" }}" target="_blank">
                                    {{ $withdraw->bank->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_number") }}</td>
                        <td>{{ $withdraw->account_number }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_name") }}</td>
                        <td>{{ $withdraw->account_name }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($withdraw->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $withdraw->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $withdraw->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $withdraw->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($withdraw->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$withdraw->createdBy->id}" }}" target="_blank">
                                    {{ $withdraw->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($withdraw->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$withdraw->updatedBy->id}" }}" target="_blank">
                                    {{ $withdraw->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($withdraw->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$withdraw->deletedBy->id}" }}" target="_blank">
                                    {{ $withdraw->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($withdraw->created_at)
                                {{ $withdraw->created_at->format("l, H:i:s") }}
                                {{ $withdraw->created_at->isoFormat("LL") }}
                                ({{ $withdraw->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($withdraw->updated_at)
                                {{ $withdraw->updated_at->format("l, H:i:s") }}
                                {{ $withdraw->updated_at->isoFormat("LL") }}
                                ({{ $withdraw->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($withdraw->deleted_at)
                                    {{ $withdraw->deleted_at->format("l, H:i:s") }}
                                    {{ $withdraw->deleted_at->isoFormat("LL") }}
                                    ({{ $withdraw->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
