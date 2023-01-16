<div>
    <tr id="detail-{{ $googleAdsense->id }}" class="collapse {{ !empty($detail[$googleAdsense->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.bank") }}</td>
                        <td>
                            @if ($googleAdsense->bank)
                                <a draggable="false" href="{{ route("{$subDomain}.finance.bank.index") . "?pageType=view&row={$googleAdsense->bank->id}" }}" target="_blank">
                                    {{ $googleAdsense->bank->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_number") }}</td>
                        <td>{{ $googleAdsense->account_number }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.account_name") }}</td>
                        <td>{{ $googleAdsense->account_name }}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.image") }}</td>
                        <td>
                            @if ($googleAdsense->checkImage())
                                <a draggable="false" class="btn btn-sm btn-primary" href="{{ $googleAdsense->assetImage() }}" target="_blank">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ trans("index.view") }}
                                </a>
                                <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $googleAdsense->assetImage() }}" download>
                                    <i class="fas fa-download me-1"></i>
                                    {{ trans("index.download") }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.notes") }}</td>
                        <td>{!! $googleAdsense->notes !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($googleAdsense->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$googleAdsense->createdBy->id}" }}" target="_blank">
                                    {{ $googleAdsense->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($googleAdsense->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$googleAdsense->updatedBy->id}" }}" target="_blank">
                                    {{ $googleAdsense->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($googleAdsense->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$googleAdsense->deletedBy->id}" }}" target="_blank">
                                    {{ $googleAdsense->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($googleAdsense->created_at)
                                {{ $googleAdsense->created_at->format("l, H:i:s") }}
                                {{ $googleAdsense->created_at->isoFormat("LL") }}
                                ({{ $googleAdsense->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($googleAdsense->updated_at)
                                {{ $googleAdsense->updated_at->format("l, H:i:s") }}
                                {{ $googleAdsense->updated_at->isoFormat("LL") }}
                                ({{ $googleAdsense->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($googleAdsense->deleted_at)
                                    {{ $googleAdsense->deleted_at->format("l, H:i:s") }}
                                    {{ $googleAdsense->deleted_at->isoFormat("LL") }}
                                    ({{ $googleAdsense->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
