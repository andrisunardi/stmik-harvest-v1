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
                    <th class="text-center">{{ trans("index.link") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.buy_advertisement") }}</th>
                </tr>
                @foreach($advertisementProviders as $advertisementProvider)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $advertisementProvider->id }}</td>
                    <td class="text-center">{{ $advertisementProvider->code }}</td>
                    <td>{{ $advertisementProvider->name }}</td>
                    <td>
                        <a draggable="false" href="{{ $advertisementProvider->link }}" target="_blank">
                            {{ $advertisementProvider->link }}
                        </a>
                    </td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($advertisementProvider->is_active), "_")) }}</td>
                    <td class="text-center">{{ $advertisementProvider->buyAdvertisements->count() }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
