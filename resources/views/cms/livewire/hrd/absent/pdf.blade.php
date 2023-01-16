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
                    <th class="text-center">{{ trans("index.employee") }}</th>
                    <th class="text-center">{{ trans("index.name") }}</th>
                    <th class="text-center">{{ trans("index.date") }}</th>
                    <th class="text-center">{{ trans("index.clock") }}</th>
                    <th class="text-center">{{ trans("index.duration") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($absents as $absent)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $absent->id }}</td>
                    <td class="text-center">{{ $absent->code }}</td>
                    <td>{{ $absent->user?->name }}</td>
                    <td>{{ $absent->name }}</td>
                    <td>{{ $absent->datetime?->format("l") }}, {{ $absent->datetime?->isoFormat("LL") }}</td>
                    <td>{{ $absent->datetime?->format("H:i") }} - {{ $absent->datetime?->addHour($absent->duration)->format("H:i") }}</td>
                    <td>{{ $absent->duration }} {{ trans("index.hour") }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($absent->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
