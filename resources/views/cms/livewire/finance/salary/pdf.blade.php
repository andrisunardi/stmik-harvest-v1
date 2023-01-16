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
                    <th class="text-center">{{ trans("index.user") }}</th>
                    <th class="text-center">{{ trans("index.bank") }}</th>
                    <th class="text-center">{{ trans("index.account_number") }}</th>
                    <th class="text-center">{{ trans("index.account_name") }}</th>
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($salaries as $salary)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $salary->id }}</td>
                    <td class="text-center">{{ $salary->code }}</td>
                    <td>{{ $salary->user?->name }}</td>
                    <td>{{ $salary->bank?->name }}</td>
                    <td>{{ $salary->account_number }}</td>
                    <td>{{ $salary->account_name }}</td>
                    <td>{{ Str::rupiah($salary->amount) }}</td>
                    <td>{{ $salary->image_url }}</td>
                    <td>
                        @if ($salary->datetime)
                            {{ $salary->datetime->format("l, H:i:s") }}<br>
                            {{ $salary->datetime->isoFormat("LL") }}<br>
                            ({{ $salary->datetime->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $salary->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($salary->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
