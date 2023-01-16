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
                    <th class="text-center">{{ trans("index.bank") }}</th>
                    <th class="text-center">{{ trans("index.account_number") }}</th>
                    <th class="text-center">{{ trans("index.account_name") }}</th>
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($googleAdsenses as $googleAdsense)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $googleAdsense->id }}</td>
                    <td class="text-center">{{ $googleAdsense->code }}</td>
                    <td>{{ $googleAdsense->bank?->name }}</td>
                    <td>{{ $googleAdsense->account_number }}</td>
                    <td>{{ $googleAdsense->account_name }}</td>
                    <td>{{ Str::rupiah($googleAdsense->amount) }}</td>
                    <td>{{ $googleAdsense->image_url }}</td>
                    <td>
                        @if ($googleAdsense->datetime)
                            {{ $googleAdsense->datetime->format("l, H:i:s") }}<br>
                            {{ $googleAdsense->datetime->isoFormat("LL") }}<br>
                            ({{ $googleAdsense->datetime->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $googleAdsense->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($googleAdsense->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
