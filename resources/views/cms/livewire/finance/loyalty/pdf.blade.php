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
                    <th class="text-center">{{ trans("index.bank") }}</th>
                    <th class="text-center">{{ trans("index.account_number") }}</th>
                    <th class="text-center">{{ trans("index.account_name") }}</th>
                    <th class="text-center">{{ trans("index.amount") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($loyalties as $loyalty)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $loyalty->id }}</td>
                    <td class="text-center">{{ $loyalty->code }}</td>
                    <td>{{ $loyalty->portfolio?->name }}</td>
                    <td>{{ $loyalty->user?->name }}</td>
                    <td>{{ $loyalty->bank?->name }}</td>
                    <td>{{ $loyalty->account_number }}</td>
                    <td>{{ $loyalty->account_name }}</td>
                    <td>{{ Str::rupiah($loyalty->amount) }}</td>
                    <td>{{ $loyalty->image_url }}</td>
                    <td>
                        @if ($loyalty->datetime)
                            {{ $loyalty->datetime->format("l, H:i:s") }}<br>
                            {{ $loyalty->datetime->isoFormat("LL") }}<br>
                            ({{ $loyalty->datetime->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $loyalty->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($loyalty->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
