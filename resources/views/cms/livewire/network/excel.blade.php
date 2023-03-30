<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.link") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($networks as $network)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $network->id }}</td>
            <td>{{ $network->networkCategory?->name }}</td>
            <td>{{ $network->name }}</td>
            <td>{{ $network->description }}</td>
            <td>{{ $network->link }}</td>
            <td>{{ $network->image_url }}</td>
            <td align="center">{{ Str::translate(Str::active($network->is_active)) }}</td>
        </tr>
    @endforeach
</table>
