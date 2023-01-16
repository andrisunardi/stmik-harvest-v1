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
                    <th class="text-center">{{ trans("index.type") }}</th>
                    <th class="text-center">{{ trans("index.name") }}</th>
                    <th class="text-center">{{ trans("index.line") }}</th>
                    <th class="text-center">{{ trans("index.whatsapp") }}</th>
                    <th class="text-center">{{ trans("index.email") }}</th>
                    <th class="text-center">{{ trans("index.social_media") }}</th>
                    <th class="text-center">{{ trans("index.other") }}</th>
                    <th class="text-center">{{ trans("index.address") }}</th>
                    <th class="text-center">{{ trans("index.reference") }}</th>
                    <th class="text-center">{{ trans("index.domain") }}</th>
                    <th class="text-center">{{ trans("index.price") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.video") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.notes") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $order->id }}</td>
                    <td class="text-center">{{ $order->code }}</td>
                    <td class="text-center">{{ $newsletter->status?->name }}</td>
                    <td class="text-center">{{ $newsletter->type?->name }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->line }}</td>
                    <td>{{ $order->whatsapp }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->social_media }}</td>
                    <td>{{ $order->other }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->reference }}</td>
                    <td>{{ $order->domain }}</td>
                    <td>{{ Str::rupiah($order->price) }}</td>
                    <td>{{ $order->image_url }}</td>
                    <td>
                        @if ($order->datetime)
                            {{ $order->datetime->format("l, H:i:s") }}<br>
                            {{ $order->datetime->isoFormat("LL") }}<br>
                            ({{ $order->datetime->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $order->notes }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($order->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
