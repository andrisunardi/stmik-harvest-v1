@extends($sub_domain . ".layout")

@section("name", $name)
@section("icon", $icon)

@section("meta-custom")
@endsection

@section("css-custom")
    <style type="text/css">
        body {
            background-color: #ffffff;
        }
        @page {
            size: auto;
            margin: 0mm;
        }
        @media  print {
            html, body {
                height: 99%;
            }
            .hide-from-printer{ display:none; }

            a[href]:after {
                content: " (" attr(href) ")";
            }
        }
        table tr td,
        table tr th
        {
            /* font-size: 9pt; */
        }
    </style>
@endsection

@section("script-custom")
@endsection

@section("$slug-active", "active")
@section("$slug-menu-open", "menu-open")

@section("content")
    <div class="container">
        <div class="row mt-2 text-center">
            <div class="col-12">
                <a draggable="false" class="btn btn-info hide-from-printer mt-2" href="{{ route($sub_domain . ".$slug.index") }}"><i class="fas fa-arrow-left fa-fw"></i> {{ __("index.back") }}</span></a>
            </div>
            <div class="col-12 mt-3 mb-3">
                <img draggable="false" src="{{ asset("images/logo-diw.co.id.png") }}" width="300" alt="Logo - {{ env("APP_TITLE") }}">
                <h1 class="mt-4">{{ __("index.income-statement") }}</h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <h4>{{ __("index.printed-date") }} : {{ Date::parse(date("Y-m-d"))->format("d F Y") }}</h4>
            </div>
            <div class="col-12">
                <h4>
                    {{ __("index.portfolio") }} :
                    @if ($request_portfolio[0] == "All")
                        {{ __("index.all") . " " . __("index.portfolio") }}
                    @else
                        @foreach ($request_portfolio as $list_portfolio)
                            @php $portfolio = App\Http\Models\Portfolio::find($list_portfolio) @endphp
                            {{ $portfolio->name }}{{ $loop->last ? "" : "," }}
                        @endforeach
                    @endif
                </h4>
            </div>
            <div class="col-12">
                <h4>{{ __("index.date") }} : {{ Date::parse($request_start_date)->format("d F Y") }} {{ __("index.up-to") }} {{ Date::parse($request_end_date)->format("d F Y") }}</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 text-center">
                <a draggable="false" class="btn btn-primary mt-2 mb-4 hide-from-printer" href="javascript:void(0);" onClick="window.print()"><i class="fas fa-print fa-fw"></i> {{ __("index.print-report") }}</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-sm table-striped table-hover table-bordered table-responsive text-nowrap w-100">
                    <thead>
                        <tr>
                            <th class="align-middle" colspan="5">{{ __("index.revenue") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-middle text-center" width="1%">No</th>
                            <th class="align-middle text-center">{{ __("index.payment") }}</th>
                            <th class="align-middle text-center">{{ __("index.date") }}</th>
                            <th class="align-middle text-center">{{ __("index.amount") }}</th>
                            <th class="align-middle text-center">{{ __("index.total") }}</th>
                        </tr>
                    @foreach ($data_payment as $payment)
                        <tr>
                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ __("index.payment") }} {{ $payment->portfolio->name }}</td>
                            <td class="align-middle text-center">{{ Date::parse($payment->datetime)->format("H:i:s - l, d F Y") }}</td>
                            <td class="align-middle text-center">Rp. {{ number_format($payment->amount, 0 , "," , ".") }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                        <tr>
                            <th class="align-middle" colspan="4">{{ __("index.total") }} {{ __("index.revenue") }}</th>
                            <td class="align-middle text-center">Rp. {{ number_format($data_payment->sum("amount"), 0 , "," , ".") }}</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th class="align-middle" colspan="5">{{ __("index.expenses") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-middle text-center" width="1%">No</th>
                            <th class="align-middle text-center">{{ __("index.buy-domain-hosting") }}</th>
                            <th class="align-middle text-center">{{ __("index.date") }}</th>
                            <th class="align-middle text-center">{{ __("index.amount") }}</th>
                            <th class="align-middle text-center">{{ __("index.total") }}</th>
                        </tr>
                    @foreach ($data_buy_domain_hosting as $buy_domain_hosting)
                        <tr>
                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ __("index.buy-domain-hosting") }} {{ $buy_domain_hosting->portfolio->name }}</td>
                            <td class="align-middle text-center">{{ Date::parse($buy_domain_hosting->datetime)->format("H:i:s - l, d F Y") }}</td>
                            <td class="align-middle text-center">Rp. {{ number_format($buy_domain_hosting->amount, 0 , "," , ".") }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                        <tr>
                            <th class="align-middle text-center" colspan="4">{{ __("index.total") }} {{ __("index.expenses") }}</th>
                            <td class="align-middle text-center">Rp. {{ number_format($data_buy_domain_hosting->sum("amount"), 0 , "," , ".") }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="align-middle text-center" colspan="4">{{ __("index.net-profit") }}</th>
                            <td class="align-middle text-center">Rp. {{ number_format($data_payment->sum("amount") - $data_buy_domain_hosting->sum("amount"), 0 , "," , ".") }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
