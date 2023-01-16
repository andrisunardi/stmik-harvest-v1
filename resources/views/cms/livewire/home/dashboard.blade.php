<div class="row">

    <div class="col-sm-6 col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.income") }}</div>
            <div class="card-body">
                {{ isset($summary["totalIncome"]) ? Str::rupiah($summary["totalIncome"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.report.income-statement.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-success text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.spending") }}</div>
            <div class="card-body">
                {{ isset($summary["totalSpending"]) ? Str::rupiah($summary["totalSpending"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.report.income-statement.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-warning text-white mb-4">
            <div class="card-header">{{ trans("index.balance") }}</div>
            <div class="card-body">
                {{ isset($summary["balance"]) ? Str::rupiah($summary["balance"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.report.balance-sheet.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-danger text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.price") }} {{ trans("index.portfolio") }}</div>
            <div class="card-body">
                {{ isset($summary["sumPricePortfolio"]) ? Str::rupiah($summary["sumPricePortfolio"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.development.portfolio.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.payment") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountPayment"]) ? Str::rupiah($summary["sumAmountPayment"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.finance.payment.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-success text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.charge") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountCharge"]) ? Str::rupiah($summary["sumAmountCharge"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.finance.charge.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-warning text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.google_adsense") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountGoogleAdsense"]) ? Str::rupiah($summary["sumAmountGoogleAdsense"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.finance.google-adsense.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-danger text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.salary") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountSalary"]) ? Str::rupiah($summary["sumAmountSalary"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.finance.salary.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.loyalty") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountLoyalty"]) ? Str::rupiah($summary["sumAmountLoyalty"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.finance.loyalty.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-success text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_advertisement") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyAdvertisement"]) ? Str::rupiah($summary["sumAmountBuyAdvertisement"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-advertisement.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-warning text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_domain_hosting") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyDomainHosting"]) ? Str::rupiah($summary["sumAmountBuyDomainHosting"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-domain-hosting.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-danger text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_endorse") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyEndorse"]) ? Str::rupiah($summary["sumAmountBuyEndorse"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-endorse.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_item") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyItem"]) ? Str::rupiah($summary["sumAmountBuyItem"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-item.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-success text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_internet") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyInternet"]) ? Str::rupiah($summary["sumAmountBuyInternet"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-internet.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-warning text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_phone_credit") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyPhoneCredit"]) ? Str::rupiah($summary["sumAmountBuyPhoneCredit"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-phone-credit.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-danger text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.buy_pln_token") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountBuyPlnToken"]) ? Str::rupiah($summary["sumAmountBuyPlnToken"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.purchasing.buy-pln-token.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">{{ trans("index.total") }} {{ trans("index.administrative_cost") }}</div>
            <div class="card-body">
                {{ isset($summary["sumAmountAdministrativeCost"]) ? Str::rupiah($summary["sumAmountAdministrativeCost"]) : 0 }}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a draggable="false" class="small text-white stretched-link" href="{{ route("{$subDomain}.finance.administrative-cost.index") }}">
                    {{ trans("index.view_details") }}
                </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-6 col-lg-auto">
        <button
            class="btn btn-primary w-100"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#portfolio_one_month_expired"
            aria-expanded="false"
            aria-controls="portfolio_one_month_expired">
            {{ trans("index.portfolio_one_month_expired") }}
        </button>
    </div>

    <div class="col-sm-6 col-lg-auto mt-2 mt-sm-auto">
        <button
            class="btn btn-primary w-100"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#portfolio_expired"
            aria-expanded="false"
            aria-controls="portfolio_expired">
            {{ trans("index.portfolio_expired") }}
        </button>
    </div>

    <div class="col-sm-6 col-lg-auto mt-2 mt-lg-auto">
        <button
            class="btn btn-primary w-100"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#portfolio_on_progress"
            aria-expanded="false"
            aria-controls="portfolio_on_progress">
            {{ trans("index.portfolio_on_progress") }}
        </button>
    </div>

    <div class="col-sm-6 col-lg-auto mt-2 mt-lg-auto">
        <button
            class="btn btn-primary w-100"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#portfolio_not_yet_paid_off"
            aria-expanded="false"
            aria-controls="portfolio_not_yet_paid_off">
            {{ trans("index.portfolio_not_yet_paid_off") }}
        </button>
    </div>
</div>

<div class="collapse in show mt-4" id="portfolio_one_month_expired">
    <div class="card">
        <div class="card-header">
            {{ trans("index.portfolio_one_month_expired") }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive table-condensed table-head-fixed align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th width="1%">{{ trans("index.#") }}</th>
                            <th width="1%">{{ trans("index.id") }}</th>
                            <th>{{ trans("index.portfolio") }}</th>
                            <th>{{ trans("index.user") }}</th>
                            <th>{{ trans("index.link") }}</th>
                            <th>{{ trans("index.expired") }}</th>
                            <th>{{ trans("index.fee") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolioOneMonthExpireds as $portfolioOneMonthExpired)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $portfolioOneMonthExpired->id }}</td>
                                <td><a draggable="false" href="{{ route("{$subDomain}.development.portfolio.index") }}">{{ $portfolioOneMonthExpired->name }}</a></td>
                                <td>
                                    @if ($portfolioOneMonthExpired->user)
                                        <a draggable="false" href="{{ route("{$subDomain}.hrd.client.index") }}">{{ $portfolioOneMonthExpired->user->name }}</a>
                                    @endif
                                </td>
                                <td><a draggable="false" href="{{ $portfolioOneMonthExpired->link }}" target="_blank">{{ $portfolioOneMonthExpired->domain }}</a></td>
                                <td>{{ $portfolioOneMonthExpired->expired?->isoFormat("LL") }}</td>
                                <td>{{ Str::rupiah($portfolioOneMonthExpired->lastPayment->amount ?? 0) }}</td>
                            </tr>
                        @endforeach
                        @if (!$portfolioOneMonthExpireds->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>

<div class="collapse mt-4" id="portfolio_expired">
    <div class="card">
        <div class="card-header">
            {{ trans("index.portfolio_expired") }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive table-condensed table-head-fixed align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th width="1%">{{ trans("index.#") }}</th>
                            <th width="1%">{{ trans("index.id") }}</th>
                            <th>{{ trans("index.portfolio") }}</th>
                            <th>{{ trans("index.user") }}</th>
                            <th>{{ trans("index.link") }}</th>
                            <th>{{ trans("index.expired") }}</th>
                            <th>{{ trans("index.fee") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolioExpireds as $portfolioExpired)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $portfolioExpired->id }}</td>
                                <td><a draggable="false" href="{{ route("{$subDomain}.development.portfolio.index") }}">{{ $portfolioExpired->name }}</a></td>
                                <td>
                                    @if ($portfolioExpired->user)
                                        <a draggable="false" href="{{ route("{$subDomain}.hrd.client.index") }}">{{ $portfolioExpired->user->name }}</a>
                                    @endif
                                </td>
                                <td><a draggable="false" href="{{ $portfolioExpired->link }}" target="_blank">{{ $portfolioExpired->domain }}</a></td>
                                <td>{{ $portfolioExpired->expired?->isoFormat("LL") }}</td>
                                <td>{{ Str::rupiah($portfolioExpired->lastPayment->amount ?? 0) }}</td>
                            </tr>
                        @endforeach
                        @if (!$portfolioExpireds->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="collapse mt-4" id="portfolio_on_progress">
    <div class="card">
        <div class="card-header">
            {{ trans("index.portfolio_on_progress") }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive table-condensed table-head-fixed align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th width="1%">{{ trans("index.#") }}</th>
                            <th width="1%">{{ trans("index.id") }}</th>
                            <th>{{ trans("index.portfolio") }}</th>
                            <th>{{ trans("index.user") }}</th>
                            <th>{{ trans("index.link") }}</th>
                            <th>{{ trans("index.cpanel") }}</th>
                            <th>{{ trans("index.datetime") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolioOnProgresses as $portfolioOnProgress)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $portfolioOnProgress->id }}</td>
                                <td><a draggable="false" href="{{ route("{$subDomain}.development.portfolio.index") }}">{{ $portfolioOnProgress->name }}</a></td>
                                <td>
                                    @if ($portfolioOnProgress->user)
                                        <a draggable="false" href="{{ route("{$subDomain}.hrd.client.index") }}">{{ $portfolioOnProgress->user->name }}</a>
                                    @endif
                                </td>
                                <td><a draggable="false" href="{{ $portfolioOnProgress->link }}" target="_blank">{{ $portfolioOnProgress->domain }}</a></td>
                                <td>{{ $portfolioOnProgress->username_cpanel }} / {{ $portfolioOnProgress->password_cpanel }}</td>
                                <td>{{ $portfolioOnProgress->datetime?->isoFormat("LL") }}</td>
                            </tr>
                        @endforeach
                        @if (!$portfolioExpireds->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="collapse mt-4" id="portfolio_not_yet_paid_off">
    <div class="card">
        <div class="card-header">
            {{ trans("index.portfolio_not_yet_paid_off") }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive table-condensed table-head-fixed align-middle">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th width="1%">{{ trans("index.#") }}</th>
                            <th width="1%">{{ trans("index.id") }}</th>
                            <th>{{ trans("index.portfolio") }}</th>
                            <th>{{ trans("index.user") }}</th>
                            <th>{{ trans("index.link") }}</th>
                            <th>{{ trans("index.price") }}</th>
                            <th>{{ trans("index.total") }} {{ trans("index.payment") }}</th>
                            <th>{{ trans("index.total") }} {{ trans("index.charge") }}</th>
                            <th>{{ trans("index.remaining") }} {{ trans("index.payment") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolioNotBalanceds as $portfolioNotBalanced)
                            @if (
                                ($portfolioNotBalanced->price + $portfolioNotBalanced->charges->sum("amount")) -
                                    $portfolioNotBalanced->payments->sum("amount") != 0)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $portfolioNotBalanced->id }}</td>
                                    <td><a draggable="false" href="{{ route("{$subDomain}.development.portfolio.index") }}">{{ $portfolioNotBalanced->name }}</a></td>
                                    <td>
                                        @if ($portfolioNotBalanced->user)
                                            <a draggable="false" href="{{ route("{$subDomain}.hrd.client.index") }}">{{ $portfolioNotBalanced->user->name }}</a>
                                        @endif
                                    </td>
                                    <td><a draggable="false" href="{{ $portfolioNotBalanced->link }}" target="_blank">{{ $portfolioNotBalanced->domain }}</a></td>
                                    <td class="align-middle">{{ Str::rupiah($portfolioNotBalanced->price) }}</td>
                                    <td class="align-middle">{{ Str::rupiah($portfolioNotBalanced->payments->sum("amount")) }}</td>
                                    <td class="align-middle">{{ Str::rupiah($portfolioNotBalanced->charges->sum("amount")) }}</td>
                                    <td class="align-middle">{{ Str::rupiah(($portfolioNotBalanced->price + $portfolioNotBalanced->charges->sum("amount")) - $portfolioNotBalanced->payments->sum("amount")) }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @if (!$portfolioNotBalanceds->count())
                            <tr>
                                <td class="text-center" colspan="100%">{{ trans("index.no_data_available") }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
