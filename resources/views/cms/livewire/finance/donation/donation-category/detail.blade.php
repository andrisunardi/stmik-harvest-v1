<div>
    <tr id="detail-{{ $donationCategory->id }}" class="collapse {{ !empty($detail[$donationCategory->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.description") }}</td>
                        <td>{!! $donationCategory->description !!}</td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.donation") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.donation.index") . "?donation_category_id={$donationCategory->id}" }}" target="_blank">
                                {{ $donationCategory->donations->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($donationCategory->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$donationCategory->createdBy->id}" }}" target="_blank">
                                    {{ $donationCategory->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($donationCategory->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$donationCategory->updatedBy->id}" }}" target="_blank">
                                    {{ $donationCategory->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($donationCategory->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$donationCategory->deletedBy->id}" }}" target="_blank">
                                    {{ $donationCategory->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($donationCategory->created_at)
                                {{ $donationCategory->created_at->format("l, H:i:s") }}
                                {{ $donationCategory->created_at->isoFormat("LL") }}
                                ({{ $donationCategory->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($donationCategory->updated_at)
                                {{ $donationCategory->updated_at->format("l, H:i:s") }}
                                {{ $donationCategory->updated_at->isoFormat("LL") }}
                                ({{ $donationCategory->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($donationCategory->deleted_at)
                                    {{ $donationCategory->deleted_at->format("l, H:i:s") }}
                                    {{ $donationCategory->deleted_at->isoFormat("LL") }}
                                    ({{ $donationCategory->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
