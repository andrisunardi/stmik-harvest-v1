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
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.date") }}</th>
                    <th class="text-center">{{ trans("index.notes") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($administrativeCosts as $administrativeCost)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $administrativeCost->id }}</td>
                    <td class="text-center">{{ $administrativeCost->code }}</td>
                    <td>{{ $administrativeCost->bank?->name }}</td>
                    <td>{{ $administrativeCost->administrativeCost?->name }}</td>
                    <td>{{ Str::rupiah($administrativeCost->amount) }}</td>
                    <td>{{ Str::rupiah($administrativeCost->tax) }}</td>
                    <td>{{ Str::rupiah($administrativeCost->after_tax) }}</td>
                    <td>
                        @if ($administrativeCost->date)
                            {{ $administrativeCost->date->format("l,") }}
                            {{ $administrativeCost->date->isoFormat("LL") }}
                        @endif
                    </td>
                    <td>{{ $administrativeCost->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($administrativeCost->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
