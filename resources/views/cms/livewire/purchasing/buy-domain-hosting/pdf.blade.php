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
                    <th class="text-center">{{ trans("index.portfolio") }}</th>
                    <th class="text-center">{{ trans("index.advertisement_provider") }}</th>
                    <th class="text-center">{{ trans("index.payment") }}</th>
                    <th class="text-center">{{ trans("index.bank") }}</th>
                    <th class="text-center">{{ trans("index.account_number") }}</th>
                    <th class="text-center">{{ trans("index.account_name") }}</th>
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.notes") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($buyDomainHostings as $buyDomainHosting)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $buyDomainHosting->id }}</td>
                    <td class="text-center">{{ $buyDomainHosting->code }}</td>
                    <td>{{ $buyDomainHosting->portfolio?->name }}</td>
                    <td>{{ $buyDomainHosting->advertisementProvider?->name }}</td>
                    <td>{{ $buyDomainHosting->payment?->code }}</td>
                    <td>{{ $buyDomainHosting->bank?->name }}</td>
                    <td>{{ $buyDomainHosting->account_number }}</td>
                    <td>{{ $buyDomainHosting->account_name }}</td>
                    <td>{{ Str::rupiah($buyDomainHosting->amount) }}</td>
                    <td>{{ $buyDomainHosting->image_url }}</td>
                    <td>
                        @if ($buyDomainHosting->datetime)
                            {{ $buyDomainHosting->datetime->format("l, H:i:s") }}<br>
                            {{ $buyDomainHosting->datetime->isoFormat("LL") }}
                        @endif
                    </td>
                    <td>{{ $buyDomainHosting->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($buyDomainHosting->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
