<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-nowarp table-responsive align-middle">
            <thead class="bg-primary text-light">
                <tr>
                    <th colspan="6">{{ trans("index.revenue") }}</th>
                </tr>
            </thead>
            <tbody>
                <tr data-bs-toggle="collapse" data-bs-target=".payment" class="pointer">
                    <th colspan="5">{{ trans("index.total") }} {{ trans("index.revenue") }}</th>
                    <th class="text-center">{{ Str::rupiah($payments->sum("amount")) }}</th>
                </tr>
                <tr class="bg-info text-light collapse payment">
                    <th class="text-center text-light" width="1%">{{ trans("index.#") }}</th>
                    <th class="text-center text-light">{{ trans("index.category") }}</th>
                    <th class="text-center text-light">{{ trans("index.portfolio") }}</th>
                    <th class="text-center text-light">{{ trans("index.date") }}</th>
                    <th class="text-center text-light">{{ trans("index.amount") }}</th>
                    <th class="text-center text-light">{{ trans("index.total") }}</th>
                </tr>
                @foreach ($payments as $payment)
                    <tr class="collapse payment">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ trans("index.payment") }}</td>
                        <td>
                            @if ($payment->portfolio)
                                <a draggable="false" href="{{ route("{$this->subDomain}.development.portfolio.index") . "pageType=view&row={$payment->portfolio->id}" }}" target="_blank">
                                    <div>{{ $payment->portfolio->name }}</div>
                                </a>
                                <div>{{ $payment->portfolio->code }}</div>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($payment->datetime)
                                <div>{{ $payment->datetime->format("l, H:i:s") }}</div>
                                <div>{{ $payment->datetime->isoFormat("LL") }}</div>
                                <div>({{ $payment->datetime->diffForHumans() }})</div>
                            @endif
                        </td>
                        <td class="text-center">{{ Str::rupiah($payment->amount) }}</td>
                        <td></td>
                    </tr>
                @endforeach
                <tr class="collapse payment">
                    <th colspan="5">{{ trans("index.total") }} {{ trans("index.revenue") }}</th>
                    <th class="text-center">{{ Str::rupiah($payments->sum("amount")) }}</th>
                </tr>
            </tbody>

            <thead class="bg-primary text-light">
                <tr>
                    <th colspan="6">{{ trans("index.expenses") }}</th>
                </tr>
            </thead>
            <tbody>
                <tr data-bs-toggle="collapse" data-bs-target=".buyDomainHosting" class="pointer">
                    <th colspan="5">{{ trans("index.total") }} {{ trans("index.expenses") }}</th>
                    <th class="text-center">{{ Str::rupiah($buyDomainHostings->sum("amount")) }}</th>
                </tr>
                <tr class="bg-info text-light collapse buyDomainHosting">
                    <th class="text-center text-light" width="1%">{{ trans("index.#") }}</th>
                    <th class="text-center text-light">{{ trans("index.category") }}</th>
                    <th class="text-center text-light">{{ trans("index.portfolio") }}</th>
                    <th class="text-center text-light">{{ trans("index.date") }}</th>
                    <th class="text-center text-light">{{ trans("index.amount") }}</th>
                    <th class="text-center text-light">{{ trans("index.total") }}</th>
                </tr>
                @foreach ($buyDomainHostings as $buyDomainHosting)
                    <tr class="collapse buyDomainHosting">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ trans("index.buy_domain_hosting") }}</td>
                        <td>
                            @if ($buyDomainHosting->portfolio)
                                <a draggable="false" href="{{ route("{$this->subDomain}.development.portfolio.index") . "pageType=view&row={$buyDomainHosting->portfolio->id}" }}" target="_blank">
                                    {{ $buyDomainHosting->portfolio->name }}
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($buyDomainHosting->datetime)
                                <div>{{ $buyDomainHosting->datetime->format("l, H:i:s") }}</div>
                                <div>{{ $buyDomainHosting->datetime->isoFormat("LL") }}</div>
                                <div>({{ $buyDomainHosting->datetime->diffForHumans() }})</div>
                            @endif
                        </td>
                        <td class="text-center">{{ Str::rupiah($buyDomainHosting->amount) }}</td>
                        <td></td>
                    </tr>
                @endforeach
                <tr class="collapse buyDomainHosting">
                    <th class="text-center" colspan="5">{{ trans("index.total") }} {{ trans("index.expenses") }}</th>
                    <td class="text-center">{{ Str::rupiah($buyDomainHostings->sum("amount")) }}</td>
                </tr>
            </tbody>
            <tfoot class="bg-primary text-light">
                <tr>
                    <th class="text-center" colspan="5">{{ trans("index.net_profit") }}</th>
                    <th class="text-center">{{ Str::rupiah($payments->sum("amount") - $buyDomainHostings->sum("amount")) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
