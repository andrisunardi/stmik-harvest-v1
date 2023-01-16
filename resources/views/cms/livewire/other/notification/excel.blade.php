<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.icon") }}</b></th>
        <th align="center"><b>{{ trans("index.link") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($notifications as $notification)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $notification->id }}</td>
            <td align="center">{{ $notification->code }}</td>
            <td>{{ $notification->name }}</td>
            <td>{{ $notification->icon }}</td>
            <td>{{ $notification->link }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($notification->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
