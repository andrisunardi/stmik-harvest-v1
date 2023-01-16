<div>
    <tr id="detail-{{ $donation->id }}" class="collapse {{ !empty($detail[$donation->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.bank") }}</td>
                        <td>
                            @if ($donation->bank)
                                <a draggable="false" href="{{ route("{$subDomain}.finance.bank.index") . "?pageType=view&row={$donation->bank->id}" }}" target="_blank">
                                    {{ $donation->bank->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_number") }}</td>
                        <td>{{ $donation->account_number }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_name") }}</td>
                        <td>{{ $donation->account_name }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($donation->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $donation->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $donation->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $donation->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($donation->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$donation->createdBy->id}" }}" target="_blank">
                                    {{ $donation->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($donation->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$donation->updatedBy->id}" }}" target="_blank">
                                    {{ $donation->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($donation->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$donation->deletedBy->id}" }}" target="_blank">
                                    {{ $donation->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($donation->created_at)
                                {{ $donation->created_at->format("l, H:i:s") }}
                                {{ $donation->created_at->isoFormat("LL") }}
                                ({{ $donation->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($donation->updated_at)
                                {{ $donation->updated_at->format("l, H:i:s") }}
                                {{ $donation->updated_at->isoFormat("LL") }}
                                ({{ $donation->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($donation->deleted_at)
                                    {{ $donation->deleted_at->format("l, H:i:s") }}
                                    {{ $donation->deleted_at->isoFormat("LL") }}
                                    ({{ $donation->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
