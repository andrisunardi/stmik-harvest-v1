<table>
    <tr><th align="center" colspan="10"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="10"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="10">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.status") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.start") }}</b></th>
        <th align="center"><b>{{ trans("index.end") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($promotions as $promotion)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $promotion->id }}</td>
            <td align="center">{{ $promotion->code }}</td>
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
            <td align="center">{{ trans("index." . Str::slug(Str::active($promotion->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
