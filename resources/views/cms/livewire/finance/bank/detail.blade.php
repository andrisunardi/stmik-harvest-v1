<div>
    <tr id="detail-{{ $bank->id }}" class="collapse {{ !empty($detail[$bank->id]) ? "show" : null }}">
        <td colspan="100%">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-wrap table-responsive align-middle mb-0 pb-0">
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.administrative_cost") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.administrative-cost.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->administrativeCosts->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.bank_interest") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.bank-interest.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->bankInterests->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_advertisement") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-advertisement.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->buyAdvertisements->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_domain_hosting") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-domain-hosting.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->buyDomainHostings->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_endorse") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-endorse.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->buyEndorses->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_internet") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-internet.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->buyInternets->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_item") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-item.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->buyItems->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.buy_phone_credit") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.buy-phone-credit.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->buyPhoneCredits->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.google_adsense") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.google-adsense.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->googleAdsenses->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.loyalty") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.loyalty.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->loyalties->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.payment") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.payment.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->payments->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.salary") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.finance.salary.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->salaries->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.total") }} {{ trans("index.user") }}</td>
                        <td>
                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?bank_id={$bank->id}" }}" target="_blank">
                                {{ $bank->users->count() }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_by") }}</td>
                        <td>
                            @if ($bank->createdBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bank->createdBy->id}" }}" target="_blank">
                                    {{ $bank->createdBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_by") }}</td>
                        <td>
                            @if ($bank->updatedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bank->updatedBy->id}" }}" target="_blank">
                                    {{ $bank->updatedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.deleted_by") }}</td>
                        <td>
                            @if ($bank->deletedBy)
                                <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "?pageType=view&row={$bank->deletedBy->id}" }}" target="_blank">
                                    {{ $bank->deletedBy->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.created_at") }}</td>
                        <td>
                            @if ($bank->created_at)
                                {{ $bank->created_at->format("l, H:i:s") }}
                                {{ $bank->created_at->isoFormat("LL") }}
                                ({{ $bank->created_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" class="text-nowrap">{{ trans("index.updated_at") }}</td>
                        <td>
                            @if ($bank->updated_at)
                                {{ $bank->updated_at->format("l, H:i:s") }}
                                {{ $bank->updated_at->isoFormat("LL") }}
                                ({{ $bank->updated_at->diffForHumans() }})
                            @endif
                        </td>
                    </tr>
                    @if ($pageType == "trash")
                        <tr>
                            <td width="1%" class="text-nowrap">{{ trans("index.deleted_at") }}</td>
                            <td>
                                @if ($bank->deleted_at)
                                    {{ $bank->deleted_at->format("l, H:i:s") }}
                                    {{ $bank->deleted_at->isoFormat("LL") }}
                                    ({{ $bank->deleted_at->diffForHumans() }})
                                @endif
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </td>
    </tr>
</div>
