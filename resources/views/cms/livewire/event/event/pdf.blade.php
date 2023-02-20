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
                    <th class="text-center">{{ trans("index.event_category") }}</th>
                    <th class="text-center">{{ trans("index.title") }}</th>
                    <th class="text-center">{{ trans("index.title_idn") }}</th>
                    <th class="text-center">{{ trans("index.short_body") }}</th>
                    <th class="text-center">{{ trans("index.short_body_idn") }}</th>
                    <th class="text-center">{{ trans("index.body") }}</th>
                    <th class="text-center">{{ trans("index.body_idn") }}</th>
                    <th class="text-center">{{ trans("index.location") }}</th>
                    <th class="text-center">{{ trans("index.start") }}</th>
                    <th class="text-center">{{ trans("index.end") }}</th>
                    <th class="text-center">{{ trans("index.tag") }}</th>
                    <th class="text-center">{{ trans("index.tag_idn") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.slug") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
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
                    <td class="text-center">{{ Str::translate(Str::active($event->is_active)) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
