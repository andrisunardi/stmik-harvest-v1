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
                    <th class="text-center">{{ trans("index.user") }}</th>
                    <th class="text-center">{{ trans("index.payment") }}</th>
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($charges as $charge)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $charge->id }}</td>
                    <td class="text-center">{{ $charge->code }}</td>
                    <td>{{ $charge->portfolio?->name }}</td>
                    <td>{{ $charge->user?->name }}</td>
                    <td>{{ $charge->payment?->name }}</td>
                    <td>{{ Str::rupiah($charge->amount) }}</td>
                    <td>{{ $charge->image_url }}</td>
                    <td>
                        @if ($charge->datetime)
                            {{ $charge->datetime->format("l, H:i:s") }}<br>
                            {{ $charge->datetime->isoFormat("LL") }}<br>
                            ({{ $charge->datetime->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $charge->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($charge->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
