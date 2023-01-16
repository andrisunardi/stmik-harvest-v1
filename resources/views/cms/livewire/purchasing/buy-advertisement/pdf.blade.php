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
                    <th class="text-center">{{ trans("index.advertisement_provider") }}</th>
                    <th class="text-center">{{ trans("index.bank") }}</th>
                    <th class="text-center">{{ trans("index.account_number") }}</th>
                    <th class="text-center">{{ trans("index.account_name") }}</th>
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.notes") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($buyAdvertisements as $buyAdvertisement)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $buyAdvertisement->id }}</td>
                    <td class="text-center">{{ $buyAdvertisement->code }}</td>
                    <td>{{ $buyAdvertisement->advertisementProvider?->name }}</td>
                    <td>{{ $buyAdvertisement->bank?->name }}</td>
                    <td>{{ $buyAdvertisement->account_number }}</td>
                    <td>{{ $buyAdvertisement->account_name }}</td>
                    <td>{{ Str::rupiah($buyAdvertisement->amount) }}</td>
                    <td>{{ $buyAdvertisement->image_url }}</td>
                    <td>
                        @if ($buyAdvertisement->datetime)
                            {{ $buyAdvertisement->datetime->format("l, H:i:s") }}<br>
                            {{ $buyAdvertisement->datetime->isoFormat("LL") }}
                        @endif
                    </td>
                    <td>{{ $buyAdvertisement->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($buyAdvertisement->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
