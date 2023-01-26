<table>
    <tr><th align="center" colspan="17"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="17"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="17">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.event_category") }}</b></th>
        <th align="center"><b>{{ trans("index.title") }}</b></th>
        <th align="center"><b>{{ trans("index.title_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.short_body") }}</b></th>
        <th align="center"><b>{{ trans("index.short_body_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.body") }}</b></th>
        <th align="center"><b>{{ trans("index.body_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.location") }}</b></th>
        <th align="center"><b>{{ trans("index.start") }}</b></th>
        <th align="center"><b>{{ trans("index.end") }}</b></th>
        <th align="center"><b>{{ trans("index.tag") }}</b></th>
        <th align="center"><b>{{ trans("index.tag_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.slug") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($events as $event)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $event->id }}</td>
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
            <td align="center">{{ trans("index." . Str::slug(Str::active($event->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
