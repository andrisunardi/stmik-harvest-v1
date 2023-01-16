<div>
    <tr id="detail-{{ $paymentCategory->id }}" class="collapse {{ !empty($detail[$paymentCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $paymentCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.payment") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.payment.index") . "?payment_category_id={$paymentCategory->id}" }}" target="_blank">
                                {{ $paymentCategory->payments->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($paymentCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$paymentCategory->createdBy->id}" }}" target="_blank">
                                    {{ $paymentCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($paymentCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$paymentCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $paymentCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($paymentCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$paymentCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $paymentCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($paymentCategory->created_at)
                                {{ $paymentCategory->created_at->format("l, H:i:s") }}
                                {{ $paymentCategory->created_at->isoFormat("LL") }}
                                ({{ $paymentCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($paymentCategory->updated_at)
                                {{ $paymentCategory->updated_at->format("l, H:i:s") }}
                                {{ $paymentCategory->updated_at->isoFormat("LL") }}
                                ({{ $paymentCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($paymentCategory->deleted_at)
                                    {{ $paymentCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $paymentCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $paymentCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
