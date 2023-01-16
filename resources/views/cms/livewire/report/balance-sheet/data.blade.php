<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-nowarp table-responsive align-middle">
            <tbody>
                @php $a = 1 @endphp
                @foreach ($portfolios as $portfolio)
                    @if ($status == 1)
                        @if ($portfolio->price + $portfolio->charges->sum("amount") == ($portfolio->payments->sum("amount") + $portfolio->loyalties->sum("amount")))
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th class="text-center text-light">{{ $a++ }}</th>
                                    <th colspan="100%">
                                        <a draggable="false" class="text-light" href="{{ route("{$subDomain}.development.portfolio.index") . "?pageType=view&row={$portfolio->id}" }}">{{ $portfolio->name }}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th class="text-center">{{ trans("index.#") }}</th>
                                    <th class="text-center">{{ trans("index.activity") }}</th>
                                    <th class="text-center">{{ trans("index.client") }}</th>
                                    <th class="text-center">{{ trans("index.bank") }}</th>
                                    <th class="text-center">{{ trans("index.debit") }}</th>
                                    <th class="text-center">{{ trans("index.credit") }}</th>
                                    <th class="text-center">{{ trans("index.datetime") }}</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">{{ trans("index.portfolio") }}</td>
                                    <td class="text-center">
                                        @if ($portfolio->user)
                                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "pageType=view&row={$portfolio->user->id}" }}">
                                                {{ $portfolio->user->name }}
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($portfolio->user)
                                            {{ $portfolio->user->bank?->name }} {{ $portfolio->user->account_number }} {{ $portfolio->user->account_name }}
                                        @endif
                                    </td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">{{ Str::rupiah($portfolio->price) }}</td>
                                    <td class="text-center">
                                        @if ($portfolio->datetime)
                                            <div>{{ $portfolio->datetime->format("l, H:i:s") }}</div>
                                            <div>{{ $portfolio->datetime->isoFormat("LL") }}</div>
                                            <div>({{ $portfolio->datetime->diffForHumans() }})</div>
                                        @endif
                                    </td>
                                </tr>
                                @php $b=2 @endphp
                                @foreach ($portfolio->buyDomainHostings as $buyDomainHosting)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.buy_domain_hosting") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($buyDomainHosting->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $buyDomainHosting->user->id]) }}">{{ $buyDomainHosting->user->name }}</a>@endif</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">Rp. {{ number_format($buyDomainHosting->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">{{ Date::parse($buyDomainHosting->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($portfolio->loyalties as $loyalty)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.loyalty") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($loyalty->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $loyalty->user->id]) }}">{{ $loyalty->user->name }}</a>@endif</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">Rp. {{ number_format($loyalty->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">{{ Date::parse($loyalty->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($portfolio->charges as $charge)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.charge") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($charge->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $charge->user->id]) }}">{{ $charge->user->name }}</a>@endif</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">Rp. {{ number_format($charge->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">{{ Date::parse($charge->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($portfolio->payments as $payment)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.payment") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($payment->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $payment->user->id]) }}">{{ $payment->user->name }}</a>@endif</td>
                                        <td class="text-center">{{ $payment->bank->name }} {{ $payment->account_number }} {{ $payment->account_name }}</td>
                                        <td class="text-center">Rp. {{ number_format($payment->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">{{ Date::parse($payment->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                <tr class="bg-success">
                                    <td colspan="5"></td>
                                    <td class="text-center text-dark">Rp. {{ number_format($portfolio->payments->sum("amount") + $portfolio->loyalties->sum("amount"), 0 , "," , ".") }}</td>
                                    <td class="text-center text-dark">Rp. {{ number_format($portfolio->price + $portfolio->charges->sum("amount"), 0 , "," , ".") }}</td>
                                    <td class="text-center text-dark">(Rp. {{ number_format(($portfolio->price + $portfolio->charges->sum("amount")) - ($portfolio->payments->sum("amount") + $portfolio->loyalties->sum("amount")), 0 , "," , ".") }}) {{ trans("index.balanced") }}</td>
                                </tr>
                            </tbody>
                        @endif
                    @elseif ($status == 2)
                        @if ($portfolio->price + $portfolio->charges->sum("amount") != ($portfolio->payments->sum("amount") + $portfolio->loyalties->sum("amount")))
                            <thead class="bg-primary text-dark">
                                <tr>
                                    <th class="text-center">{{ $a++ }}</th>
                                    <th colspan="7"><a draggable="false" class="text-dark" href="{{ route("{$subDomain}.development.portfolio.index") . "?pageType=view&row={$portfolio->id}" }}">{{ $portfolio->name }}</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th class="text-center">{{ trans("index.#") }}</th>
                                    <th class="text-center">{{ trans("index.activity") }}</th>
                                    <th class="text-center">{{ trans("index.client") }}</th>
                                    <th class="text-center">{{ trans("index.bank") }}</th>
                                    <th class="text-center">{{ trans("index.debit") }}</th>
                                    <th class="text-center">{{ trans("index.credit") }}</th>
                                    <th class="text-center">{{ trans("index.datetime") }}</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">{{ trans("index.portfolio") }}</td>
                                    <td class="text-center">@if ($portfolio->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "pageType=view&row={$portfolio->user->id}" }}">{{ $portfolio->user->name }}</a>@endif</td>
                                    <td class="text-center">@if ($portfolio->user_id){{ $portfolio->user->bank->name }} {{ $portfolio->user->account_number }} {{ $portfolio->user->account_name }}@endif</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">Rp. {{ number_format($portfolio->price, 0 , "," , ".") }}</td>
                                    <td class="text-center">{{ Date::parse($portfolio->datetime)->format("H:i:s - l, d F Y") }}</td>
                                </tr>
                                @php $b=2 @endphp
                                @foreach ($portfolio->buyDomainHostings as $buyDomainHosting)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.buy_domain_hosting") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($buyDomainHosting->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $buyDomainHosting->user->id]) }}">{{ $buyDomainHosting->user->name }}</a>@endif</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">Rp. {{ number_format($buyDomainHosting->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">{{ Date::parse($buyDomainHosting->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($portfolio->loyalties as $loyalty)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.loyalty") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($loyalty->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $loyalty->user->id]) }}">{{ $loyalty->user->name }}</a>@endif</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">Rp. {{ number_format($loyalty->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">{{ Date::parse($loyalty->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($portfolio->charges as $charge)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.charge") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($charge->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $charge->user->id]) }}">{{ $charge->user->name }}</a>@endif</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">Rp. {{ number_format($charge->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">{{ Date::parse($charge->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($portfolio->payments as $payment)
                                    <tr>
                                        <td></td>
                                        <td class="text-center">{{ $b++ }}</td>
                                        <td class="text-center">{{ trans("index.payment") }} {{ $loop->iteration }}</td>
                                        <td class="text-center">@if ($payment->user_id)<a draggable="false" href="{{ route("{$subDomain}.configuration.user.index", ["id" => $payment->user->id]) }}">{{ $payment->user->name }}</a>@endif</td>
                                        <td class="text-center">{{ $payment->bank->name }} {{ $payment->account_number }} {{ $payment->account_name }}</td>
                                        <td class="text-center">Rp. {{ number_format($payment->amount, 0 , "," , ".") }}</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">{{ Date::parse($payment->datetime)->format("H:i:s - l, d F Y") }}</td>
                                    </tr>
                                @endforeach
                                <tr class="bg-danger">
                                    <td colspan="5"></td>
                                    <td class="text-center text-dark">Rp. {{ number_format($portfolio->payments->sum("amount") + $portfolio->loyalties->sum("amount"), 0 , "," , ".") }}</td>
                                    <td class="text-center text-dark">Rp. {{ number_format($portfolio->price + $portfolio->charges->sum("amount"), 0 , "," , ".") }}</td>
                                    <td class="text-center text-dark">(Rp. {{ number_format(($portfolio->price + $portfolio->charges->sum("amount")) - ($portfolio->payments->sum("amount") + $portfolio->loyalties->sum("amount")), 0 , "," , ".") }}) {{ trans("index.not_balanced") }}</td>
                                </tr>
                            </tbody>
                        @endif
                    @else
                        <thead class="bg-primary text-light">
                            <tr>
                                <th class="text-center">{{ $a++ }}</th>
                                <th colspan="100%">
                                    <a draggable="false" class="text-light" href="{{ route("{$subDomain}.development.portfolio.index") . "?pageType=view&row={$portfolio->id}" }}" target="_blank">
                                        {{ $portfolio->name }}
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <th class="text-center">{{ trans("index.#") }}</th>
                                <th class="text-center">{{ trans("index.activity") }}</th>
                                <th class="text-center">{{ trans("index.client") }} / {{ trans("index.provider") }}</th>
                                <th class="text-center">{{ trans("index.bank") }}</th>
                                <th class="text-center">{{ trans("index.debit") }}</th>
                                <th class="text-center">{{ trans("index.credit") }}</th>
                                <th class="text-center">{{ trans("index.datetime") }}</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center">1</td>
                                <td class="text-center">{{ trans("index.portfolio") }}</td>
                                <td class="text-center">
                                    @if ($portfolio->user)
                                        <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "pageType=view&row={$portfolio->user->id}" }}" target="_blank">
                                            <div>{{ $portfolio->user->name }}</div>
                                        </a>
                                        <div>{{ $portfolio->user->code }}</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($portfolio->user)
                                        <div>{{ $portfolio->user->bank?->name }}</div>
                                        <div>{{ $portfolio->user->account_number }}</div>
                                        <div>{{ $portfolio->user->account_name }}</div>
                                    @endif
                                </td>
                                <td class="text-center">-</td>
                                <td class="text-center">{{ Str::rupiah($portfolio->price) }}</td>
                                <td class="text-center">
                                    @if ($portfolio->datetime)
                                        <div>{{ $portfolio->datetime->format("l, H:i:s") }}</div>
                                        <div>{{ $portfolio->datetime->isoFormat("LL") }}</div>
                                        <div>({{ $portfolio->datetime->diffForHumans() }})</div>
                                    @endif
                                </td>
                            </tr>
                            @php $b=2 @endphp
                            @foreach ($portfolio->buyDomainHostings as $buyDomainHosting)
                                <tr>
                                    <td></td>
                                    <td class="text-center">{{ $b++ }}</td>
                                    <td class="text-center">{{ trans("index.buy_domain_hosting") }} {{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($buyDomainHosting->domainHostingProvider)
                                            <a draggable="false" href="{{ route("{$subDomain}.purchasing.domain-hosting-provider.index") . "pageType=view&row={$buyDomainHosting->domainHostingProvider->id}" }}" target="_blank">
                                                <div>{{ $buyDomainHosting->domainHostingProvider->name }}</div>
                                            </a>
                                            <div>{{ $buyDomainHosting->domainHostingProvider->code }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div>{{ $buyDomainHosting->bank?->name }}</div>
                                        <div>{{ $buyDomainHosting->account_number }}</div>
                                        <div>{{ $buyDomainHosting->account_name }}</div>
                                    </td>
                                    <td class="text-center">{{ Str::rupiah($buyDomainHosting->amount) }}</td>
                                    <td class="text-center">{{ Str::rupiah($buyDomainHosting->payment?->amount ? $buyDomainHosting->payment?->amount - $buyDomainHosting->amount : 0) }}</td>
                                    <td class="text-center">
                                        @if ($buyDomainHosting->datetime)
                                            <div>{{ $buyDomainHosting->datetime->format("l, H:i:s") }}</div>
                                            <div>{{ $buyDomainHosting->datetime->isoFormat("LL") }}</div>
                                            <div>({{ $buyDomainHosting->datetime->diffForHumans() }})</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($portfolio->loyalties as $loyalty)
                                <tr>
                                    <td></td>
                                    <td class="text-center">{{ $b++ }}</td>
                                    <td class="text-center">{{ trans("index.loyalty") }} {{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($loyalty->user)
                                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "pageType=view&row={$loyalty->user->id}" }}" target="_blank">
                                                <div>{{ $loyalty->user->name }}</div>
                                            </a>
                                            <div>{{ $loyalty->user->code }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div>{{ $loyalty->bank?->name }}</div>
                                        <div>{{ $loyalty->account_number }}</div>
                                        <div>{{ $loyalty->account_name }}</div>
                                    </td>
                                    <td class="text-center">{{ Str::rupiah($loyalty->amount) }}</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">
                                        @if ($loyalty->datetime)
                                            <div>{{ $loyalty->datetime->format("l, H:i:s") }}</div>
                                            <div>{{ $loyalty->datetime->isoFormat("LL") }}</div>
                                            <div>({{ $loyalty->datetime->diffForHumans() }})</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($portfolio->charges as $charge)
                                <tr>
                                    <td></td>
                                    <td class="text-center">{{ $b++ }}</td>
                                    <td class="text-center">{{ trans("index.charge") }} {{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($charge->user)
                                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "pageType=view&row={$charge->user->id}" }}" target="_blank">
                                                <div>{{ $charge->user->name }}</div>
                                            </a>
                                            <div>{{ $charge->user->code }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">{{ Str::rupiah($charge->amount) }}</td>
                                    <td class="text-center">
                                        @if ($charge->datetime)
                                            <div>{{ $charge->datetime->format("l, H:i:s") }}</div>
                                            <div>{{ $charge->datetime->isoFormat("LL") }}</div>
                                            <div>({{ $charge->datetime->diffForHumans() }})</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($portfolio->payments as $payment)
                                <tr>
                                    <td></td>
                                    <td class="text-center">{{ $b++ }}</td>
                                    <td class="text-center">{{ trans("index.payment") }} {{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($payment->user)
                                            <a draggable="false" href="{{ route("{$subDomain}.configuration.user.index") . "pageType=view&row={$payment->user->id}" }}" target="_blank">
                                                <div>{{ $payment->user->name }}</div>
                                            </a>
                                            <div>{{ $payment->user->code }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div>{{ $payment->bank?->name }}</div>
                                        <div>{{ $payment->account_number }}</div>
                                        <div>{{ $payment->account_name }}</div>
                                    </td>
                                    <td class="text-center">{{ Str::rupiah($payment->amount) }}</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">
                                        @if ($payment->datetime)
                                            <div>{{ $payment->datetime->format("l, H:i:s") }}</div>
                                            <div>{{ $payment->datetime->isoFormat("LL") }}</div>
                                            <div>({{ $payment->datetime->diffForHumans() }})</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="{{ ($portfolio->payments->sum("amount") - $portfolio->buyDomainHostings->sum("amount") + $portfolio->loyalties->sum("amount")) == ($portfolio->price + ($portfolio->payments->sum("amount") - $portfolio->price - $portfolio->buyDomainHostings->sum("amount")) + $portfolio->charges->sum("amount")) ? "bg-success" : "bg-danger" }}">
                                <td colspan="5"></td>
                                <td class="text-center text-light">
                                    {{ Str::rupiah($portfolio->payments->sum("amount") - $portfolio->buyDomainHostings->sum("amount") + $portfolio->loyalties->sum("amount")) }}
                                </td>
                                <td class="text-center text-light">
                                    {{ Str::rupiah($portfolio->price + ($portfolio->payments->sum("amount") - $portfolio->price - $portfolio->buyDomainHostings->sum("amount")) + $portfolio->charges->sum("amount")) }}
                                </td>
                                <td class="text-center text-light">
                                    ({{ Str::rupiah(($portfolio->payments->sum("amount") - $portfolio->buyDomainHostings->sum("amount") + $portfolio->loyalties->sum("amount")) - ($portfolio->price + ($portfolio->payments->sum("amount") - $portfolio->price - $portfolio->buyDomainHostings->sum("amount")) + $portfolio->charges->sum("amount"))) }}) {{ ($portfolio->payments->sum("amount") - $portfolio->buyDomainHostings->sum("amount") + $portfolio->loyalties->sum("amount")) == ($portfolio->price + ($portfolio->payments->sum("amount") - $portfolio->price - $portfolio->buyDomainHostings->sum("amount")) + $portfolio->charges->sum("amount")) ? trans("index.balanced") : trans("index.not_balanced") }}
                                </td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach

                @if (!$portfolios->count())
                    <tr>
                        <td class="text-center" colspan="100%">
                            <div wire:loading.remove>
                                {{ trans("index.no_data_available") }}
                            </div>
                            <div wire:loading>
                                {{ trans("index.now_loading") }}
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
