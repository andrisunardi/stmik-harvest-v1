<table>
    <tr><th align="center" colspan="6"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="6"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="6">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.number") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($services as $service)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $service->id }}</td>
            <td align="center">{{ $service->code }}</td>
            <td align="center">{{ $service->number }}</td>
            <td>{{ $service->name }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($service->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
