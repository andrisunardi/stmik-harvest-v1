<div>
    <tr id="detail-{{ $loyalty->id }}" class="collapse {{ !empty($detail[$loyalty->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.bank") }}</td>
                        <td>
                            @if ($loyalty->bank)
                                <a draggable="false" href="{{ route("{$subDomain}.finance.bank.index") . "?pageType=view&row={$loyalty->bank->id}" }}" target="_blank">
                                    {{ $loyalty->bank->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_number") }}</td>
                        <td>{{ $loyalty->account_number }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_name") }}</td>
                        <td>{{ $loyalty->account_name }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($loyalty->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $loyalty->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $loyalty->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $loyalty->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($loyalty->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$loyalty->createdBy->id}" }}" target="_blank">
                                    {{ $loyalty->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($loyalty->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$loyalty->updatedBy->id}" }}" target="_blank">
                                    {{ $loyalty->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($loyalty->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$loyalty->deletedBy->id}" }}" target="_blank">
                                    {{ $loyalty->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($loyalty->created_at)
                                {{ $loyalty->created_at->format("l, H:i:s") }}
                                {{ $loyalty->created_at->isoFormat("LL") }}
                                ({{ $loyalty->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($loyalty->updated_at)
                                {{ $loyalty->updated_at->format("l, H:i:s") }}
                                {{ $loyalty->updated_at->isoFormat("LL") }}
                                ({{ $loyalty->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($loyalty->deleted_at)
                                    {{ $loyalty->deleted_at->format("l, H:i:s") }}
                                    {{ $loyalty->deleted_at->isoFormat("LL") }}
                                    ({{ $loyalty->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
