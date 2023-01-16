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
                    <th class="text-center">{{ trans("index.tax") }}</th>
                    <th class="text-center">{{ trans("index.after_tax") }}</th>
                    <th class="text-center">{{ trans("index.date") }}</th>
                    <th class="text-center">{{ trans("index.notes") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($bankInterests as $bankInterest)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $bankInterest->id }}</td>
                    <td class="text-center">{{ $bankInterest->code }}</td>
                    <td>{{ $bankInterest->bank?->name }}</td>
                    <td>{{ Str::rupiah($bankInterest->amount) }}</td>
                    <td>{{ Str::rupiah($bankInterest->tax) }}</td>
                    <td>{{ Str::rupiah($bankInterest->after_tax) }}</td>
                    <td>
                        @if ($bankInterest->date)
                            {{ $bankInterest->date->format("l,") }}
                            {{ $bankInterest->date->isoFormat("LL") }}
                        @endif
                    </td>
                    <td>{{ $bankInterest->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($bankInterest->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
