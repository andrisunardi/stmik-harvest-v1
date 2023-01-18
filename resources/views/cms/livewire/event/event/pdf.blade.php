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
                    <th class="text-center"><b>{{ trans("index.event_category") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.title") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.title_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.short_body") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.short_body_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.body") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.body_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.location") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.start") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.end") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.tag") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.tag_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.image") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.slug") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.is_active") }}</b></th>
                </tr>
                @foreach($events as $event)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $event->id }}</td>
                    <td>{{ $event->eventCategory?->name }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->title_idn }}</td>
                    <td>{{ $event->short_body }}</td>
                    <td>{{ $event->short_body_idn }}</td>
                    <td>{{ $event->body }}</td>
                    <td>{{ $event->body_idn }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        @if ($event->start)
                            {{ $event->start->format("l,") }}
                            {{ $event->start->isoFormat("LL") }}
                            <br>
                            ({{ $event->start->diffForHumans() }})
                        @endif
                    </td>
                    <td>
                        @if ($event->end)
                            {{ $event->end->format("l,") }}
                            {{ $event->end->isoFormat("LL") }}
                            <br>
                            ({{ $event->end->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $event->tag }}</td>
                    <td>{{ $event->tag_idn }}</td>
                    <td>{{ $event->image_url }}</td>
                    <td>{{ $event->slug }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($event->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
