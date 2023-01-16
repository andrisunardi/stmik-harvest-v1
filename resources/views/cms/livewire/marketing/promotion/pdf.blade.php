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
                    <th class="text-center">{{ trans("index.status") }}</th>
                    <th class="text-center">{{ trans("index.name") }}</th>
                    <th class="text-center">{{ trans("index.description") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.start") }}</th>
                    <th class="text-center">{{ trans("index.end") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($promotions as $promotion)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $promotion->id }}</td>
                    <td class="text-center">{{ $promotion->code }}</td>
                    <td>{{ $promotion->status?->name }}</td>
                    <td>{{ $promotion->name }}</td>
                    <td>{{ $promotion->description }}</td>
                    <td>{{ $promotion->image_url }}</td>
                    <td>
                        @if ($promotion->start)
                            {{ $promotion->start->format("l, H:i:s") }}<br>
                            {{ $promotion->start->isoFormat("LL") }}<br>
                            ({{ $promotion->start->diffForHumans() }})
                        @endif
                    </td>
                    <td>
                        @if ($promotion->end)
                            {{ $promotion->end->format("l, H:i:s") }}<br>
                            {{ $promotion->end->isoFormat("LL") }}<br>
                            ({{ $promotion->end->diffForHumans() }})
                        @endif
                    </td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($promotion->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
