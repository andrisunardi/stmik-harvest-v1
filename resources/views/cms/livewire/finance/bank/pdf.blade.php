<html>
    <head>
        <title>{{ $title }} | {{ env("APP_NAME") }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="text-center">
            <h1>{{ env("APP_NAME") }}</h1>
            <p>{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</p>
        </div>

        <main class="text-center">
            <h5 class="text-uppercase">{{ $title }}</h5>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center" width="1%">{{ trans("index.#") }}</th>
                    <th class="text-center" width="1%">{{ trans("index.id") }}</th>
                    <th class="text-center">{{ trans("index.code") }}</th>
                    <th class="text-center">{{ trans("index.name") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.administrative_cost") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.bank_interest") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_advertisement") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_domain_hosting") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_endorse") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_internet") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_item") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_phone_credit") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.google_adsense") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.loyalty") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.payment") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.salary") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.user") }}</th>
                </tr>
                @foreach($banks as $bank)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $bank->id }}</td>
                    <td class="text-center">{{ $bank->code }}</td>
                    <td>{{ $bank->name }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($bank->is_active), "_")) }}</td>
                    <td class="text-center">{{ $bank->administrativeCosts->count() }}</td>
                    <td class="text-center">{{ $bank->administrativeCosts->count() }}</td>
                    <td class="text-center">{{ $bank->bankInterests->count() }}</td>
                    <td class="text-center">{{ $bank->buyAdvertisements->count() }}</td>
                    <td class="text-center">{{ $bank->buyDomainHostings->count() }}</td>
                    <td class="text-center">{{ $bank->buyEndorses->count() }}</td>
                    <td class="text-center">{{ $bank->buyInternets->count() }}</td>
                    <td class="text-center">{{ $bank->buyItems->count() }}</td>
                    <td class="text-center">{{ $bank->buyPhoneCredits->count() }}</td>
                    <td class="text-center">{{ $bank->googleAdsenses->count() }}</td>
                    <td class="text-center">{{ $bank->loyalties->count() }}</td>
                    <td class="text-center">{{ $bank->payments->count() }}</td>
                    <td class="text-center">{{ $bank->salaries->count() }}</td>
                    <td class="text-center">{{ $bank->users->count() }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
